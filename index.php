<html>

<?php


require './libs/rb.php';

R::setup( 'mysql:host=localhost;dbname=testPHP', 'root', 'password');

$con = mysqli_connect("localhost", "root", "password", "testPHP");



$id = $_GET['id'];

session_start();
if (isset($_SESSION['id'])) { //в этом случае отрисовывается админское меню


    // require_once('adminver.php'); //вернуть!

   


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



else { //require_once('userver.php'); //вернуть!
}?>











  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>    
      <div class="top-menu">
        <button class="auth-but" method="post" onclick="window.location.href='auth.php'" name="login">Авторизация</button>

        <form action="index.php" method="post">
        <select name="sort">
            <option value="0"></option>
            <option value="1">по имени</option>
            <option value="2">по e-mail</option>
            <option value="3">выполненные</option>
            <option value="4">невыполненные</option>
        </select>
        <button>сортировка</button>
            <input type="submit" >
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


            echo $_POST['sort'];

              



            $page = 1;

            if (isset($_GET['page'])) {   //получение текущей страницы
                $page = $_GET['page'];
            } else $page = 1;  



            $count_per_page = 3;              
            $currval = ($page * $count_per_page) - $count_per_page;
        
          if ($_POST['sort'] == 0) {$result = mysqli_query($con,'SELECT * FROM tasks LIMIT '.$currval.', '.$count_per_page.''); $alltasks = mysqli_query($con, "SELECT COUNT(*) FROM tasks");}
          if ($_POST['sort'] == 1) {$result = mysqli_query($con,'SELECT * FROM tasks ORDER BY user_name LIMIT '.$currval.', '.$count_per_page.''); $alltasks = mysqli_query($con, "SELECT COUNT(*) FROM tasks");}
          if ($_POST['sort'] == 2) {$result = mysqli_query($con,'SELECT * FROM tasks ORDER BY mail LIMIT '.$currval.', '.$count_per_page.''); $alltasks = mysqli_query($con, "SELECT COUNT(*) FROM tasks");}
          if ($_POST['sort'] == 3) {$result = mysqli_query($con,'SELECT * FROM tasks WHERE _completed = 1 LIMIT '.$currval.', '.$count_per_page.''); $alltasks = mysqli_query($con, "SELECT COUNT(*) FROM tasks WHERE _completed = 1");}
          if ($_POST['sort'] == 4) {$result = mysqli_query($con,'SELECT * FROM tasks WHERE _completed = 0 LIMIT '.$currval.', '.$count_per_page.''); $alltasks = mysqli_query($con, "SELECT COUNT(*) FROM tasks WHERE _completed = 0");}

          //$result = mysqli_query($con,'SELECT * FROM tasks LIMIT '.$currval.', '.$count_per_page.''); // запрос по умолчанию
          //$result = mysqli_query($con,'SELECT * FROM tasks ORDER BY user_name LIMIT '.$currval.', '.$count_per_page.''); //сортировка по имени
          //$result = mysqli_query($con,'SELECT * FROM tasks ORDER BY mail LIMIT '.$currval.', '.$count_per_page.'');
          //$result = mysqli_query($con,'SELECT * FROM tasks WHERE _completed = 1 LIMIT '.$currval.', '.$count_per_page.''); 
          //$alltasks = mysqli_query($con, "SELECT COUNT(*) FROM tasks");
          //$alltasks = mysqli_query($con, "SELECT COUNT(*) FROM tasks WHERE _completed = 0");

          $myrow = mysqli_fetch_array($result);

            do{
                echo "<h2>".$myrow['user_name']."</h2>";
                echo "<p>".$myrow['mail']."</p>";
            } while ($myrow = mysqli_fetch_array($result));



            //$alltasks = mysqli_query($con, "SELECT COUNT(*) FROM tasks"); //по умолчанию
            $rowID = mysqli_fetch_row($alltasks);
            $total_tasks = $rowID[0];
            

            $page_count = ceil($total_tasks / $count_per_page);
            echo $page_count;
                for ($i = 1; $i <= $page_count; $i++){
                    echo "<a href=index.php?page=".$i."> Страница ".$i." </a>";
                }
             
                    
                    
                    
                    
                   
        
            ?>     
                
            
                      
            <button onclick="window.location.href='addtask.php'">Добавить задачу</button>
        </div>
      </div>

  </body>
        
</html>