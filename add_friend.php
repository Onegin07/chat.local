<?php
include "configs/db.php";
include "configs/nastroyki.php";
/*
1. Создать таблицу для друзей - готово
2. Сделать ссылку на добавление в друзья - готово
3. Сделать страницу обработчик где добавляем в базу данных выбранного пользователя
4. Перенаправляем пользователя на главную страницу
*/

if(isset($_GET["user_id"])) {
	$sql = "INSERT INTO friends (user_1, user_2) VALUES ( '" . $polzovatel_id . "' ,'" . $_GET["user_id"] . "')";
    if(mysqli_query($connect, $sql)) {
    include "modules/friend_list.php";
    } else {
    	echo "<h2>Ошибка</h2>";
    }

}


?>