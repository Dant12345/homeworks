<?php
// Имя файла данных
$filename = "text.txt"; 
// Определяем константу FIRST для
// того, чтобы точно определить 
// был ли выполнен файл 1.php
define("FIRST",1);
// Проверяем не пусто ли содержимое
// массива $_POST - если это так, 
// выводим форму для авторизации
if(empty($_POST)) {
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>
	<form action="" method="POST">
		<h1>Входите</h1>
		<p>
			<label for="login-field">ФИО: </label>
			<input type="text" name="name" value="" id="login-field"><br>
		</p>

		<p>
			<label for="password-field">Пароль: </label>
			<input type="text" name="password" value="" id="password-field"><br>
		</p>

			
		<p>
			<input type="submit" value="Вход">
		</p>

		<p>
			<a href="formRegistration.php">Регистрация</a>
		</p>
	</form>
<?php } else {
	 // Проверяем корректность введённого имени
    // и пароля
    $arrNames = file($filename);
    $i = 0;
    $temp = [];
    foreach($arrNames as $line)
    {
      // Разбиваем строку по разделителю ::
      $data = explode("::",$line);
      // В массив $temp помещаем имена и пароли
      // зарегистрированных посетителей
      $temp['name'][$i]     = $data[0];
      $temp['password'][$i] = $data[1];
      $temp['tel'][$i]    = $data[2];
      $temp['email'][$i]      = $data[3];
      // Увеличиваем счётчик
      $i++;
    }
    // Если в массиве $temp['name'] нет введённого
    // логина - останавливаем работу скрипта
    if(!in_array($_POST['name'],$temp['name']))
    {
     exit("Пользователь с таким именем не зарегистрирован");

    }
    // Если пользователь с именем $_POST['name'] обнаружен
    // проверяем правильность введённого пароля
    $index = array_search($_POST['name'],$temp['name']);
    if($_POST['password'] != $temp['password'][$index])
    {
     exit("Пароль с таким имене не существует");
    }
   

    

echo '<script type="text/javascript">
window.location = "tasksForm.php"
</script>'; 
  }  ?>



</body>
</html>