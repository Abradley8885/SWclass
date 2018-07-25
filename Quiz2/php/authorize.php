<html>
<head>
  <meta charset="utf-8">
  <meta name='description' content='Login page for SW Midterm' />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Logout</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="../css/log_req_styles.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Quiz2</a>
      <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#collapse-navbar" aria-expanded="false" aria-controls="navbar">
        &#9776;
      </button>
    </div>
    <div class="navbar-collapse collapse" id="collapse-navbar">
    <ul class="nav navbar-nav">
      <li><a href="/SWclass/Quiz2/php/members.php">Members</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="/SWclass/Quiz2/html/signup.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="/SWclass/Quiz2/html/login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
  </div>
</nav>
</html>
<?php
  session_start();

//  Get username and password contents.
$users = file_get_contents('../json/authorizedUsers.json');
//  Convert file contents to array.
$userArray = json_decode($users, true);
$accessGranted = -1;
foreach ($userArray as $userAndPass) {
  //echo "Username: " . $userAndPass["username"] . ", Password: " . $userAndPass["password"] . "<br />";
  //echo "input User: " . $_POST["username"] . ", input Pass: " . $_POST["password"] . "<br />";
  if(strcmp($userAndPass["username"], $_POST['username']) == 0 && strcmp($userAndPass["password"], $_POST['password']) == 0)  {
    $accessGranted = 1;
    setcookie('access', $accessGranted);
      $_SESSION['username']=$_POST['username'];
      echo "Access Granted!" . "<br />";
    header('Location: members.php');
  }

}
if($accessGranted == -1){
  echo "That information is not authorized. Please try logging in again<br/>";
  echo"<a href='../html/login.html' class='btn btn-success' role='button'>Log In</a>";

}
?>
