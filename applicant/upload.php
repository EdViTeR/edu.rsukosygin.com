<?php 
session_start();
include ("../database/databaseInfo.php");
require_once '../database/connect_db.php';
// Если в $_FILES существует "image" и она не NULL
if (isset($_FILES['image'])) {
  $image = $_FILES['image'];
  // Получаем нужные элементы массива "image"
  $fileTmpName = $_FILES['image']['tmp_name'];
  $fileName = $_FILES['image']['name'];
  $errorCode = $_FILES['image']['error'];
  // Проверим на ошибки
  if ($errorCode !== UPLOAD_ERR_OK || !is_uploaded_file($fileTmpName)) {
    // Массив с названиями ошибок
    $errorMessages = [
      UPLOAD_ERR_INI_SIZE   => 'Размер файла превысил значение upload_max_filesize в конфигурации PHP.',
      UPLOAD_ERR_FORM_SIZE  => 'Размер загружаемого файла превысил значение MAX_FILE_SIZE в HTML-форме.',
      UPLOAD_ERR_PARTIAL    => 'Загружаемый файл был получен только частично.',
      UPLOAD_ERR_NO_FILE    => 'Файл не был загружен.',
      UPLOAD_ERR_NO_TMP_DIR => 'Отсутствует временная папка.',
      UPLOAD_ERR_CANT_WRITE => 'Не удалось записать файл на диск.',
      UPLOAD_ERR_EXTENSION  => 'PHP-расширение остановило загрузку файла.',
    ];
    // Зададим неизвестную ошибку
    $unknownMessage = 'При загрузке файла произошла неизвестная ошибка.';
    // Если в массиве нет кода ошибки, скажем, что ошибка неизвестна
    $outputMessage = isset($errorMessages[$errorCode]) ? $errorMessages[$errorCode] : $unknownMessage;
    // Выведем название ошибки
    die($outputMessage);
  } else {
      $folder="/OpenServer/domains/edu.rsukosygin.ru/files/images/user_images/";
      $way = "/files/images/user_images/" . $fileName;
      move_uploaded_file($fileTmpName, $folder.$fileName);
      save_user_images($dbo, $way, $_SESSION['user']['id']);
      header('Location: add_user_info.php');
  }
};