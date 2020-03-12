<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form  method="POST">

		<label for="firstNum-field">Первое число: </label>
		<input type="text" name="number[]" id="firstNum-field" value="" required="1"><br>

		 <label for="secondNum-field">Второе число: </label>
		 <input type="text" name="number[]" id="secondNum-field" value="" required="1"><br>

		 <input type="submit" name="doGO" value="Нажмите кнопку, чтобы запустить сценарий">


	</form>
	
	
<?php 
echo "<pre>";
print_r($_POST);
echo "</pre>";

$options = [
	"options" => [
		"min_range" => 1,
		"max_range" => PHP_INT_MAX
	]
];
			
if (!empty($_POST["doGO"])) {
	
	foreach ($_POST["number"] as  $value) {
			switch ($value) {
				case filter_var($value, FILTER_VALIDATE_INT, $options):
					if (is_string($result)) {
						$result .= $value; 
					} else {
					$result += $value;
				}
					break;
	
				case filter_var($value, FILTER_VALIDATE_INT) :
					exit("Введите положительное число");

				case filter_var($value, FILTER_VALIDATE_FLOAT):
					if (is_string($sum)) {
						$sum .= $value; 
					} else {
					$result += $value;

				}
					break;

			default: 
				$result .= $value; 
			
		}

	}	
	echo "Результат выполнения : " . $result;

}
?>
</body>
</html>