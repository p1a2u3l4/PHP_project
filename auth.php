<html>
<? if (isset($_COOKIE["TestCookie"])) echo $_COOKIE["TestCookie"]; ?>

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
  </head>
<body>    
      <div class="auth-block">
          <form action="enter.php">
            <h1>Авторизация:</h1>
            <input placeholder="логин: " name="login" class="inp-auth form-control"> </input>
            <input placeholder="пароль: " name="password" class="inp-auth form-control"> </input>
            <button class="send-but btn btn-success" type="submit" name="auth" class="btn-auth1 ">Отправить</button>     
          </form>   
        <button class="send-but2 btn btn-danger" name="isPressedBack" onclick="window.location.href='index.php'" class="btn-auth2 btn btn-danger">Отмена</button>
      </div>
</body>        
</html>