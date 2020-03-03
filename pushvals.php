<?php 
require './libs/rb.php';
R::setup( 'mysql:host=localhost;dbname=testPHP', 'root', 'password'); 
$task = R::dispense( 'tasks' );
$parse = stristr($_GET["mail"], '@');
    if (($_GET["mail"] != "") && ($_GET["name"] != "") && ($_GET["descr"] != "") && $parse != "") {
        $task->mail = $_GET["mail"];
        $task->user_name = $_GET["name"];
        $task->task_text = $_GET["descr"];
        $task->Completed = 0;
        $task->changed = 0;
        R::store($task);
        header ('Location: index.php');
        exit;
    }  
        if ($parse == "") {
            header ('Location: addtask.php?mail'); //не прошло проверку по почте    
        }
        else { header ('Location: addtask.php'); }?>
