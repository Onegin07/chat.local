<?php
include "configs/db.php";
include "configs/nastroyki.php";

if($polzovatel_id == null) {
    header("Location: /login.php");
}


?>
<!DOCTYPE html>
<html>
<head>
     <title><?php echo $nameSite; ?></title>
     <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php
    include "chasty-site/shapka.php";
    ?>
    <div id="content">
      
        <div id="users">
               
                <form method="GET" action="http://chat.local/modules/spisok.php" id="poisk">
                <input type="text" name="poisk-text">
                <button type="submit" name="poisk_contacts"><img src="images/ikon-search.png"></button>
                </form> 
            
         <?php 
         /* =============
          Список пользователей
         =============*/
         // include подключить файл
        include "modules/spisok.php";

         ?>
        </div>

          <div id="soobsheniya">
            <div id="spisok-soobsheniy">
            <?php 
            include "modules/messages.php";
            ?>
            </div>
            <?php
             if(isset($_GET["user"])) {
              ?>
              <form id="form" action="http://chat.local/add_soobshenie.php" method="POST">
                  <input type="hidden" name="komu_polzovatel_id" value="<?php echo $_GET["user"]; ?>">
                  <input type="hidden" name="ot_polzovatel_id" value="<?php echo $polzovatel_id ?>">
                  <textarea name="text"></textarea>
                  <button type="submit" name="otpravka_sms"><img src="images/send.png"></button>
              </form>
              <?php
             }

            ?>
            
        </div>
    </div>

  <?php
       include "modules/contacts.php";
  ?>

  

     <script src="script.js"></script>
</body>
</html>