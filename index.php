<html>

<?php




//require_once ('./connection.php');
require './libs/rb.php';

R::setup( 'mysql:host=localhost;dbname=testPHP', 'root', 'password');




$id = $_GET['id'];

session_start();
if (isset($_SESSION['id'])) { //в этом случае отрисовывается админское меню


    require_once('adminver.php');

   


    function refresh() {
        
        unset($_SESSION['id']);
        $url='index.php';
        //header ('Location: index.php');
        echo '<script type="text/javascript">'; 
        echo 'window.location.href="'.$url.'";'; 
        echo '</script>'; 
    }
    
    //echo $_SESSION['id'];
    echo "админ вошел"; ?>


    <form action="" method="post">
        <button name="quit">выйти</button>
    </form>


    <?  if (isset($_POST["quit"])) { refresh();}     else { //echo "ghj"; //refresh();
    }  
}



else { require_once('userver.php');}?>











  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>    
      <div class="top-menu">
        <button class="auth-but" method="post" onclick="window.location.href='auth.php'" name="login">Авторизация</button>

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
                    <ul>
                        <li> <?echo($task['user_name']);?> </li>
                        <li><?echo($task['mail']);?></li>
                        <li><?echo($task['task_text']);?></li>
                    </ul>
                    <input type="checkbox" disabled>выполнено</input>
                </div>
            <? } ?>
                      
            <button onclick="window.location.href='addtask.php'">Добавить задачу</button>
        </div>
      </div>

  </body>
        
</html>