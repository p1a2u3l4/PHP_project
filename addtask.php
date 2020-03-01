<html>

<?php require './libs/rb.php';
      R::setup( 'mysql:host=localhost;dbname=testPHP', 'root', 'password'); ?>

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>    
      <div class="auth-block">
        <!-- <form action="pushvals.php"> -->
        <!-- <form action="addtask.php"> -->
        <form action="pushvals.php">
            <h1>Создание новой задачи:</h1>
            <input placeholder="имя: " name="name"> </input>
            <input placeholder="e-mail: " name="mail"> </input>
            <textarea placeholder="описание задачи:" name="descr"></textarea>
            
            <button class="send-but" name="isPressedCreate" onclick="window.location.href='index.php'">создать</button>
        </form>     
        
        <button class="send-but" name="isPressedBack" onclick="window.location.href='index.php'">отмена</button>   
      </div>
  </body>
        

<?php 
if (isset($_GET['isPressedCreate'])) {
    //echo 'нажата';
    //header ('Location: index.php');
}





else {echo "не нажата";} ?>

</html>