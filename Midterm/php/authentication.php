<?php
  session_start();

//  Get username and password contents.
$users = file_get_contents('../json/login.json');
//  Convert file contents to array.
$userArray = json_decode($users, true);
$accessGranted = -1;
foreach ($userArray as $userAndPass) {
  echo "Username: " . $userAndPass["username"] . ", Password: " . $userAndPass["password"] . "<br />";
  echo "input User: " . $_POST["username"] . ", input Pass: " . $_POST["password"] . "<br />";
  if(strcmp($userAndPass["username"], $_POST['username']) == 0 && strcmp($userAndPass["password"], $_POST['password']) == 0)  {
    $accessGranted = 1;
    setcookie('access', $accessGranted);
      $_SESSION['username']=$_POST['username'];
      echo "Access Granted!" . "<br />";
    header('Location: ../php/members.php');
  }
}
/*if($accessGranted == -1) {
  header('Location: ../html/log_req.html');
  setcookie('access', $accessGranted);
}*/


?>
