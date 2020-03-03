<?php 
require './libs/rb.php';
R::setup( 'mysql:host=localhost;dbname=testPHP', 'root', 'password'); 

$currentid = $_GET['taskid'];
$isChecked = $_GET["check"];

$task = R::load( 'tasks', $currentid );
$task->mail = $_GET["mail"];
$task->user_name = $_GET["name"];
$task->task_text = $_GET["descr"];
$task->changed = 1;
    if (isset($isChecked)) $task->Completed = 1;
      else $task->Completed = 0;
R::store($task);

$wasPressed = $_GET["isPressedCreate"];
$_POST[$wasPressed];
header ('Location: index.php');?>