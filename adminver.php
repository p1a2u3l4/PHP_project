<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>    
      <div class="top-menu">
       <? echo "Вы вошли, как администратор"; ?>
      <form action="" method="post">
        <button name="quit">выйти</button>
      </form>
        
        <!-- <button class="auth-but" method="post" onclick="window.location.href='auth.php'" name="login">Авторизация</button> -->

        <form action="index.php">
        <select>
            <option selected></option>
            <option>по имени</option>
            <option>по e-mail</option>
            <option>по имени</option>
            <option>по статусу</option>
        </select>
        <button>сортировка</button>
        </form>
      </div>

      <div class="container-tasks">
        <div class="tasks-block">
            <?php 
            //$task = R::dispense( 'task' );








            $prihod = $_SERVER['HTTP_REFERER'];

            
            
            if ($prihod == "http://pr1:8080/addtask.php") { echo "Запись успешно добавлена!";}
                //else (echo "")
            echo $prihod;
            
            $tasks = R::getAll('SELECT * FROM tasks'); //получение значений из БД
                
                foreach ($tasks as $task) {   ?>     
                <div class="task">     
                <form action="change_task.php" method="post">
                    <ul>                   
                        <li ><?echo($task['id']);?></li>
                        <li> <?echo($task['user_name']);?> </li>
                        <li><?echo($task['mail']);?></li>
                        <li><?echo($task['task_text']);?></li>
                        
                    </ul>
                    <input  value="<?php echo $task['id']; ?>" name="transfer"></input>

                    <? if ($task['_completed'] == 0) {?>
                    <input type="checkbox"  disabled>выполнено</input>
                    <? } else {?>
                        <input type="checkbox" disabled checked>выполнено</input>
                    <? }?>

                    
                    <? if ($task['changed'] == 0) {?>
                    <p></p>
                    <? } else {?>
                        <p>Изменено администратором</p>
                    <? }?>



                      <button >Изменить</button>
                    </form>
                </div>
            <? } ?>
                      
            <button onclick="window.location.href='addtask.php'">Добавить задачу</button>
        </div>
      </div>

  </body>
        
</html>