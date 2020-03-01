<html>

<?php require './libs/rb.php';
      R::setup( 'mysql:host=localhost;dbname=testPHP', 'root', 'password');

      $task_id = $_POST['transfer'];
      echo $task_id; 
     


      $current_task = R::load( 'tasks', $task_id);

      
      $post->text 
      ?>

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>    
      <div class="auth-block">
        
        <form action="updvals.php">
            <h1>Изменение задачи:</h1>
            <input value="<?php echo $current_task->id; ?>" placeholder="id: " name="taskid"> </input>

            <input value="<?php echo $current_task->user_name; ?>" placeholder="имя: " name="name"> </input>
            <input value="<?php echo $current_task->mail; ?>" placeholder="e-mail: " name="mail"> </input>
            <textarea  placeholder="описание задачи:" name="descr"></textarea>

            <? if ($current_task->_completed == 0) { ?>
                <input type="checkbox" name="check">Выполнено</input>
            <? }  else { ?>
                <input type="checkbox" name="check" checked>Выполнено</input>
            <? } ?>
            <button class="send-but" name="isPressedCreate" onclick="window.location.href='index.php'">обновить</button>
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