<?php
error_reporting(0);
$con = mysqli_connect("localhost", "root", "password", "testPHP");
$id = $_GET['id'];

session_start();
    if (isset($_SESSION['id'])) { //в этом случае отрисовывается админское меню
        require_once('adminver1.php'); 

        function refresh() {       
            unset($_SESSION['id']);
            $url='index.php';
            echo '<script type="text/javascript">'; 
            echo 'window.location.href="'.$url.'";'; 
            echo '</script>'; 
        }?>


        <form action="" method="post">
            <button name="quit">выйти</button>
        </form>


        <?  if (isset($_POST["quit"])) { refresh();}   
        exit;
    }
        else { require_once('userver1.php'); exit; }//обычный пользователь
?>