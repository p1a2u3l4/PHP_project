<html>


<? 
//$con = mysqli_connect("localhost", "testPHP", "root", "password");





function admin_enter() {
    

}





?>






  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>    
      <div class="auth-block">
          <form action="enter.php">
        <h1>Авторизация:</h1>
        <input placeholder="логин: " name="login"> </input>
        <input placeholder="пароль: " name="password"> </input>
        <button class="send-but" type="submit" name="auth">Отправить</button>     
     </form>   
     <button class="send-but" name="isPressedBack" onclick="window.location.href='index.php'">отмена</button>
      </div>
      
  


<? if (isset($_POST["auth"])) { ?>
    <p><?echo("нажатие");
    admin_enter(); ?></p>
    //header ('Location: index.php');
<?} else echo "null"?>


</body>
        
</html>