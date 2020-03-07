<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registration</title>
</head>
<body>
	<form action="formRegistration.php" method="POST" enctype="multipart/form-data">
		<h1>Зарегистрируйтесь!</h1>
		<p>
			<label for="login-field">ФИО: </label>
			<input type="text" name="name" value="<?= $_POST["name"]?>" id="login-field"><br>
		</p>

		<p>
			<label for="password-field">Пароль: </label>
			<input type="text" name="password" value="<?= $_POST["password"]?>" id="password-field"><br>
		</p>

		<p>
			<label for="tel-field">Телефон: </label>
			<input type="text" name="tel" id="tel-field" value="<?=$_POST["tel"]?>"><br>
		</p>
		
		<p>
			<label for="email-field">Email: </label>
			<input type="text" name="email" id="email-field" value="<?= $_POST["email"]?>">
		</p>

		<p>
			<label for="file-field">Файл резюме: </label>
			<input type="file" name="regFile" id="file-field">
		</p>

		<p>
			<input type="submit" name="doReg" value="Регистрация">
		</p>
		
		

		<p>
			<a href="formLogin.php">Уже зарегистрированы?</a>
		</p>
	</form>


<?php

function clean($value) {
	$value = trim($value);
	$value = stripslashes($value);
	$value = strip_tags($value);
	$value = htmlspecialchars($value);

	return $value;
}



if (!empty($_POST["doReg"])) {



foreach ($_POST as $key => $value) {
	$newArr["$key"] = clean($value);
	if (empty($newArr["$key"])) exit("Поле {$key} не заполнено");
}



extract($newArr);

if (!empty($email)) {
	
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		exit('Поле "E-mail" должно соответствовать формату');
	} 
}

if (empty($_FILES)) exit("Выбирите файл для загрузки");

define('DS', DIRECTORY_SEPARATOR);
$cDir = __DIR__;
$loadDir = $cDir . DS . "upload";

if (!file_exists($loadDir)) {
	if (!mkdir($loadDir)) {
		die("Не удалось создать директорию!");
	}
}

if (isset($_FILES["regFile"])) {
	$file = $_FILES["regFile"];

	print("Загружен файл с именем "  . $file["name"] .  " и размером " . $file["size"] . " байт ");

	

	$currentPath = $_FILES["regFile"]["tmp_name"];
	$filename = $_FILES["regFile"]["name"];
	echo dirname(__FILE__);
	$newPath = $loadDir . DS . $filename; 

	move_uploaded_file($currentPath, $newPath); 
	
}

/** Проверка имени на уникальность
*/
$filename = "text.txt";

$arrNames = file($filename);

foreach ($arrNames as $line) {
	$data = explode("::", $line);

	$temp[] = $data[0];
}

if(in_array($name, $temp)) {
	exit("Данное имя уже зарегистрировано, пожалуйста, выберите другое");
}


/** Регистрация пользователя
*/

$fd = fopen($filename, "a");

if(!$fd) {
	exit("Ошибка при открытии файла данных");
}	
$str = $name."::".
       $password."::".
       $tel."::".
       $email.PHP_EOL;

fwrite($fd,$str);
fclose($fd);


echo "<HTML><HEAD>
         <META HTTP-EQUIV='Refresh' CONTENT='0; URL=$_SERVER[PHP_SELF]'>
        </HEAD></HTML>";
echo '<script type="text/javascript">
window.location = "formLogin.php"
</script>';
}
?>
</body>
</html>
