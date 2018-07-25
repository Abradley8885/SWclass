<?php
if(isset($_POST['register-submit'])){ //if submit was pressed from signup.html

$currentArray["username"] = $_POST['Rusername'];
$currentArray["password"] = $_POST['Rpassword'];

$content = file_get_contents('../json/authorizedUsers.json');
$tempArray = json_decode($content);
array_push($tempArray,$currentArray);
$jsonAdd = json_encode($tempArray);
file_put_contents('../json/authorizedUsers.json', $jsonAdd);
}
header('Location: ../html/login.html');
 ?>
