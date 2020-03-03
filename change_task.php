<html>

<?php require './libs/rb.php';
      R::setup( 'mysql:host=localhost;dbname=testPHP', 'root', 'password');
      $task_id = $_POST['transfer'];      
    //   echo $task_id; 
      $current_task = R::load('tasks', $task_id);?>

  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>    
      <div class="addtask-block">
        
        <form action="updvals.php">
            <h1>Изменение задачи:</h1>
            <input class="hide" value="<?php echo $current_task->id; ?>" placeholder="id: " name="taskid"> </input>

            <input class="inp-create form-control" value="<?php echo $current_task->user_name; ?>" placeholder="имя: " name="name"> </input>
            <input class="inp-create form-control" value="<?php echo $current_task->mail; ?>" placeholder="e-mail: " name="mail"> </input>
            <input class="inp-create form-control" value="<?php echo $current_task->task_text; ?>" placeholder="описание задачи: " name="descr"> </input>
            <!-- <textarea  placeholder="описание задачи:" name="descr"></textarea> -->

            <? if ($current_task->_completed == 0) { ?>
                <input class="inp-create form-check-input" type="checkbox" name="check">Выполнено</input>
            <? }  else { ?>
                <input class="inp-create " type="checkbox" name="check" checked>Выполнено</input>
            <? } ?>
            <button class="send-but btn btn-success" name="isPressedCreate" onclick="window.location.href='index.php'">обновить</button>
        </form>     
        
        <button class="send-but btn btn-danger" name="isPressedBack" onclick="window.location.href='index.php'">отмена</button>   
      </div>
  </body>        
</html>