<?php 
require './libs/rb.php';
R::setup( 'mysql:host=localhost;dbname=testPHP', 'root', 'password'); 
$task = R::dispense( 'tasks' );
$task->mail = $_GET["mail"];
$task->user_name = $_GET["name"];
$task->task_text = $_GET["descr"];


//R::store($task);
$wasPressed = $_GET["isPressedCreate"];
$_POST[$wasPressed];
//echo("redirect..");

header ('Location: index.php');
?>

<!-- <html><input placeholder="" name="name" > </input></html> -->