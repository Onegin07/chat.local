<?php
/*
Файл для настроек сайта
*/

// название сайта
$nameSite = "Еще один сайт";

$polzovatel_id = null;

if(isset($_COOKIE["polzovatel_id"])) {
	$polzovatel_id = $_COOKIE["polzovatel_id"];
}

?>