<?php
$currentArray["username"] = $_POST['Rusername'];
$currentArray["password"] = $_POST['Rpassword'];

$content = file_get_contents('../json/login.json');
$tempArray = json_decode($content);
array_push($tempArray, $currentArray);
$jsonAdd = json_encode($tempArray);
file_put_contents('../json/login.json', $jsonAdd);
 ?>
