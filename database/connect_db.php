<?php
// $link = mysqli_connect('localhost', 'sereegak_teacher', 'LNV9IKTk', 'sereegak_teacher');
// $link = mysqli_connect('localhost', 'root', 'root', 'sereegak_teacher');
//$link = mysqli_connect('localhost', 'root', 'root', 'site_kurses');
    
    //локалка дом
    try {
      $dbo = new PDO('mysql:host=localhost;dbname=sereegak_teacher', 'sereegak_teacher', 'LNV9IKTk');
    } catch (PDOException $e) {
      print "Error!: " . $e->getMessage();
      die();
    }

    //сервер
    // try {
    //   $dbo = new PDO('mysql:host=localhost;dbname=sereegak_teacher', 'sereegak_teacher', 'LNV9IKTk');
    // } catch (PDOException $e) {
    //   print "Error!: " . $e->getMessage();
    //   die();
    // }
?>