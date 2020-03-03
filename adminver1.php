<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css"> 
</head>
<body>    
      <div class="top-menu">
       <p class="greets"><? echo "Вы вошли, как администратор"; ?></p>
      <form action="" method="post">
        <button class="btn btn-primary"name="quit">выйти</button>
      </form>
        <form action="adminver1.php" method="post">
        <select name="sort">
            <option value="0"></option>
            <option value="1">по имени</option>
            <option value="2">по e-mail</option>
            <option value="3">выполненные</option>
            <option value="4">невыполненные</option>
        </select>
        <button class="btn btn-secondary">сортировка</button>
        </form>
      </div>

      <div class="container-tasks">
        <div class="tasks-block">
            <?php 
                error_reporting(0);
                function refresh() {
                        
                    unset($_SESSION['id']);
                    $url='index.php';
                    //header ('Location: index.php');
                    echo '<script type="text/javascript">'; 
                    echo 'window.location.href="'.$url.'";'; 
                    echo '</script>'; 
                }
                    if (isset($_POST["quit"])) { refresh();}     
                                      
            $con = mysqli_connect("localhost", "root", "password", "testPHP");
            $prihod = $_SERVER['HTTP_REFERER'];


           if ($prihod == "http://pr1:8080/addtask.php") { echo "Запись успешно добавлена!";}
            if ($prihod == "http://pr1:8080/change_task.php") { echo "Запись успешно изменена!";}
           
                $page = 1;

                if (isset($_GET['page'])) {   //получение текущей страницы
                    $page = $_GET['page'];
                } else $page = 1;  



                $count_per_page = 3;              
                $currval = ($page * $count_per_page) - $count_per_page;
            
                if ($_POST['sort'] == 0) {$result = mysqli_query($con,'SELECT * FROM tasks LIMIT '.$currval.', '.$count_per_page.''); $alltasks = mysqli_query($con, "SELECT COUNT(*) FROM tasks");}
                if ($_POST['sort'] == 1) {$result = mysqli_query($con,'SELECT * FROM tasks ORDER BY user_name DESC LIMIT '.$currval.', '.$count_per_page.''); $alltasks = mysqli_query($con, "SELECT COUNT(*) FROM tasks");}
                if ($_POST['sort'] == 2) {$result = mysqli_query($con,'SELECT * FROM tasks ORDER BY mail DESC LIMIT '.$currval.', '.$count_per_page.''); $alltasks = mysqli_query($con, "SELECT COUNT(*) FROM tasks");}
                if ($_POST['sort'] == 3) {$result = mysqli_query($con,'SELECT * FROM tasks WHERE _completed = 1 LIMIT '.$currval.', '.$count_per_page.''); $alltasks = mysqli_query($con, "SELECT COUNT(*) FROM tasks WHERE _completed = 1");}
                if ($_POST['sort'] == 4) {$result = mysqli_query($con,'SELECT * FROM tasks WHERE _completed = 0 LIMIT '.$currval.', '.$count_per_page.''); $alltasks = mysqli_query($con, "SELECT COUNT(*) FROM tasks WHERE _completed = 0");}

            

            $myrow = mysqli_fetch_array($result);

                do{
                    echo "<div class='task'><form action='change_task.php' method='post'>";
                    echo "<ul><li class='hide'>".$myrow['id']."</li>";
                    echo "<li>Имя: ".$myrow['user_name']."</li>";
                    echo "<li>E-mail: ".$myrow['mail']."</li>";
                    echo "<li>Задание: ".$myrow['task_text']."</li></ul>";
            
                    if ($myrow['_completed'] == 1) {
                        echo "<input type='checkbox' checked disabled>"."выполнено"."</input>";
                    } else  echo "<input type='checkbox' disabled>"."выполнено"."</input>";

                    if ($myrow['changed'] == 1) {
                        echo "<p>"."изменено администратором"."</p>";
                    } 
                    echo "<input class='hide' value=".$myrow['id']." name='transfer'></input>";
                    echo "<button class='change-but btn btn-warning'>Изменить</button></form></div>";
                } while ($myrow = mysqli_fetch_array($result));


                $rowID = mysqli_fetch_row($alltasks);
                $total_tasks = $rowID[0];
                

                $page_count = ceil($total_tasks / $count_per_page);
                    echo "<div class='links'>";
                    for ($i = 1; $i <= $page_count; $i++){
                        echo "<a href=adminver1.php?page=".$i."> Стр. ".$i."| </a>";
                    }
                    echo "</div>";?>           
        </div>
        <div class="add-but"><button class="btn btn-success" onclick="window.location.href='addtask.php'">Добавить задачу</button></div>         
      </div>
</body>       
</html>