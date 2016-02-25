<?php
$name = $_POST['name'];
$title = $_POST['title'];
$id = $_POST['id'];
$password = $_POST['password'];

require 'medoo.min.php';

$database = new medoo();

$database->insert("10hours_user", 
	[
	"name"=>$name,
	"title"=>$title,
	"id"=>$id,
	"password"=>md5($password)
	]);

header("Location: index.php?user=".$id);
exit();

?>