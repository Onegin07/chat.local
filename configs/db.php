<?php
// Данные для подключения к базе данных
$server = "localhost";
$username = "root";
$password = "";
$dbname = "chat";

// подключение к базе данных chat
$connect = mysqli_connect($server, $username, $password, $dbname);
// кодировка БД
mysqli_set_charset($connect, "utf8");

?>