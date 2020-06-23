<ul>
   <?php
     //
     if(isset($_GET["user"]) || isset($otpravleno_polzovatel_id)) {
      $user_id = null;

      if(isset($_GET["user"])) {
        $user_id = $_GET["user"];
      } else {
        $user_id = $otpravleno_polzovatel_id;
      }

      // Получить все сообщения которые были отправлены пользователю
      $sql = "SELECT * FROM messages " . // Выбираем все сообщения
      " WHERE (komu_polzovatel_id=" . $user_id . // ГДЕ id отправленому пользователю = $_GET["user"]
        " AND ot_polzovatel_id=" . $polzovatel_id . ") " . // И отправлено от пользователя с id = 2
        " OR (komu_polzovatel_id=" . $polzovatel_id . " AND ot_polzovatel_id=" . $user_id . ")"; // ИЛИ отправлено пользователю с id 2 И  от пользователя id = $_GET["user"]
      // выполняем sql запрос
      $resultat = mysqli_query($connect, $sql);
       // получить колличество строк
       $col_messages = mysqli_num_rows($resultat); 
       // $i - счетчик для подсчета количества сообщений
       $i = 0;
       // цикл где мы перебираем и выводим наши сообщения
       while($i < $col_messages) {
        // mysqli_fetch_assoc - преобразовать полученные данные пользователя в массив
        $message = mysqli_fetch_assoc($resultat);
         ?>
          <li>
            <div class="user">
              <img src="images/user.png">
            </div>
            <?php
                // Вывести имя конкретного пользователя
                $sql = "SELECT name FROM polzovateli WHERE id=" . $message["ot_polzovatel_id"];
                // Выполняем запрос
                $polzovatel = mysqli_query($connect, $sql);
                // записываем в переменную массив с данными пользователя
                $polzovatel = mysqli_fetch_assoc($polzovatel);
            ?>
            <h2><?php echo $polzovatel["name"]; ?></h2>
            <p><?php echo $message["text"]; ?></p>
            <div class="time"><?php echo $message["time"]; ?></div>
           </li> 
          
         <?php  
     // увеличиваем счетчик
     $i = $i + 1;
                  }
             }  else {
                 echo "<h2>Пользователь не выбран!</h2>";
             }    
  ?>

 </ul>

