<?php
$user = $_POST['Rusername'];
echo $user;
$pass = $_POST['Rpassword'];
echo $pass;
if(isset($_POST['register-submit'])){ //if submit was pressed from request_access.php

$currentArray["username"] = $_POST['Rusername'];
$currentArray["password"] = $_POST['Rpassword'];

$content = file_get_contents('../json/login.json');
$tempArray = json_decode($content);
array_push($tempArray,$currentArray);
$jsonAdd = json_encode($currentArray);
file_put_contents('../json/login.json', $jsonAdd);
}
 ?>
<html>
 <h1>text here</h1>
</html>
