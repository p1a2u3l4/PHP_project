<?php      
      $prihod = $_SERVER['HTTP_REFERER'];         
        if ($_SERVER['REQUEST_URI'] == "/addtask.php?mail") { echo "невалидная почта!"; }
              if ($prihod == "http://pr1:8080/addtask.php") { echo "Заполните все поля!";}?>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>    
      <div class="addtask-block">
        <form action="pushvals.php" >
            <h1>Создание задачи:</h1>
              <input class="inp-create form-control" placeholder="имя: " name="name"></input>
              <input class="inp-create form-control" placeholder="e-mail: " name="mail"></input>
              <input class="inp-create form-control" placeholder="описание задачи: " name="descr"></input>           
              <button class="send-but btn btn-success" name="isPressedCreate" onclick="window.location.href='index.php'">создать</button>
        </form>     
        <form action="index.php" method="POST">
          <button class="send-but btn btn-danger" name="isPressedBack" value="refuse" onclick="window.location.href='index.php'">отмена</button>
        <form action="submit">   
      </div>
  </body>        
</html>