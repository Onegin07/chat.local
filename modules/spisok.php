<?php 
//Вывести список всех пользователей из базы кроме авторизованного пользователя
$sql = "SELECT * FROM polzovateli WHERE id!=" . $polzovatel_id;
// Выполнить sql запрос в базе данных
$result = mysqli_query($connect, $sql);
// mysqli_num_rows - получить колличество результатов
$col_polzovateley = mysqli_num_rows($result);
?>
<div id="spisok">         
  <ul>
    <?php
    //Поиск контактов по базе данных
    if(isset($_GET["poisk_contacts"])) {
    $sql = "SELECT * FROM polzovateli WHERE name LIKE '%" . $_GET["poisk-text"] . "%'";
    $polzovateliResult = mysqli_query($connect, $sql);
    $col_polzovateley = mysqli_num_rows($polzovateliResult); 
     $i = 0;
     while($i < $col_polzovateley) {
    $polzovatel = mysqli_fetch_assoc($polzovateliResult);
    ?>
    <li>
    <a href='/index.php?user=<?php echo $polzovatel["id"]; ?>'>
    <div class="user">
    <img src='<?php echo $polzovatel["photo"]; ?>'>
    </div>
    <h2><?php echo $polzovatel["name"]; ?></h2>
    <p>HI</p>
    <div class="time">09:15</div>
    </a>     
    </li>
    <?php   
    $i = $i + 1;
    } 
} else {

     $i = 0;
      // пока в переменной i хранится значение меньше чем колличество пользователей
      while($i < $col_polzovateley) {
        // mysqli_fetch_assoc - преобразовать полученные данные пользователя в массив
        $polzovatel = mysqli_fetch_assoc($result);
        ?>
        <li>
          <a href='/index.php?user=<?php echo $polzovatel["id"]; ?>'>
           <div class="user">
             <img src='<?php echo $polzovatel["photo"]; ?>'>
           </div>
            <h2><?php echo $polzovatel["name"]; ?></h2>
            <p>HI</p>
            <div class="time">09:15</div>
          </a>     
        </li>
      <?php   
     $i = $i + 1;
       } 
       }
     ?> 
    </ul>
  </div>