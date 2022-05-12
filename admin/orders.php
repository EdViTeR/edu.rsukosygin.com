<?php
$data = file('../files/data.csv');
$i = 0;
foreach ($data as $key => $value) {
	$arr[] = $value;
	$i++;
}


?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Заявки</title>
</head>
<body>
	<h1>Зарегистрировалось <?php echo $i;?> человек</h1>
	<a href="check_teacher.php">Назад</a>
	<a href="order_mail.php">Почты</a> <br><br>
</body>
</html>

<?
$i = 0;
foreach ($arr as $key => $value) {
	$i++;
	$need = explode(',', $value);
	$name = $need[2] . ' ' . $need[1] . ' ' . $need[3];
	$kurs = $need[8];
echo $i . '. ' . $name . ' --- ' . $kurs . '<p>';
}