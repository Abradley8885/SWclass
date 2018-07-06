<?php
  session_start();

//  Get username and password contents.
$users = file_get_contents('../json/login.json');
//  Convert file contents to array.
$userArray = json_decode($users, true);
$accessGranted = -1;
foreach ($userArray as $userAndPass) {
  echo "Username: " . $userAndPass["username"] . ", Password: " . $userAndPass["password"] . "<br />";
  if(strcmp($userAndPass["user"], $_POST['username']) == 0 && strcmp($userAndPass["pass"], $_POST['password']) == 0)  {
    $accessGranted = 1;
    setcookie('access', $accessGranted);
    if($_POST['registered'] == 1){
      $_SESSION['registered']=$_POST['username'];
      echo "Access Granted to SuperUser<br/>";
    }
    else{
      $_SESSION['username']=$_POST['username'];
      echo "Access Granted!" . "<br />";
    }

    header('Location: ../html/members.html');
  }
}
if($accessGranted == -1) {
  header('Location: ../php/login_page.php');
  setcookie('access', $accessGranted);
}


?>
