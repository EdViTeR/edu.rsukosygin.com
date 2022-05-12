<?php
$data = file('../files/data.csv');
foreach ($data as $key => $value) {
	$arr[] = $value;
}

foreach ($arr as $key => $value) {
	$need = explode(',', $value);
	$email = $need[4];
	// echo $email . ', ';
}

$mail = file('../files/mail.csv');
foreach ($mail as $key => $value) {
	$arr_mail[] = $value;
}

foreach ($arr_mail as $key => $value) {
	$need_mail = explode(';', $value);
	$info_email[] = $need_mail[5];
}


$need_mails = file('../files/need_mails.csv');
foreach ($need_mails as $key => $value) {
	$exp = explode(',', $value);
	$email = 
	var_dump($need_mails); die;
	// $exp_email[] = $need_mail[5];
}