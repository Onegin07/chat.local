  <?php
  // Возвращает HTML с пользователями
   $sql = "SELECT * FROM polzovateli WHERE id!=" . $polzovatel_id;
   $result = mysqli_query($connect, $sql);

   $col_polzovateley = mysqli_num_rows($result);

                $i = 0;
                  while($i < $col_polzovateley) {
                    $polzovatel = mysqli_fetch_assoc($result);
                    ?>
                      <li>
                        <div class="user">
                          <img src="images/user.png">
                        </div>
                        <h2><?php echo $polzovatel["name"]; ?></h2>
                        <?php
                            $sql = "SELECT * FROM friends WHERE 
                                       user_1=" . $polzovatel["id"] . " AND user_2=" . $polzovatel_id . "
                                       OR user_1=" . $polzovatel_id . " AND user_2=" . $polzovatel["id"];

                            $friendsResult = mysqli_query($connect, $sql);
                            $col_friends = mysqli_num_rows($friendsResult);
                            if($col_friends > 0) {
                              ?>
                              <div data-ssylka="http://chat.local/delete_friend.php?user_id=<?php echo $polzovatel["id"]; ?>" onclick="del(this)">Удалить из друзей -</div>
                              <?php
                          } else {
                            ?>
                              <div data-ssylka="http://chat.local/add_friend.php?user_id=<?php echo $polzovatel["id"]; ?>" onclick="add(this)">Добавить в друзья +</div>
                            <?php
                          } 
                        ?>
                        
                      </li>
                   <?php
              $i = $i + 1;
              }
              ?>  