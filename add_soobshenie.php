<?php
include 'configs/db.php';

/*
===============================
Отправка сообщения выбраному пользователю
*/
if(isset($_POST["otpravka_sms"])) {
   $sql = "INSERT INTO `messages`(`text`, `komu_polzovatel_id`, `ot_polzovatel_id`) VALUES ('" . $_POST["text"] . "',
    '" . $_POST["komu_polzovatel_id"] . "', '" . $_POST["ot_polzovatel_id"] . "')";
   mysqli_query($connect, $sql);
}

$otpravleno_polzovatel_id = $_POST["komu_polzovatel_id"];
$polzovatel_id = $_POST["ot_polzovatel_id"];

include 'modules/messages.php';