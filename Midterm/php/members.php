<html>
<head>
  <meta charset="utf-8">
  <meta name='description' content='Login page for SW Midterm' />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Member Page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="../css/log_req_styles.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--<script src='../js/log_req_func.js'></script>-->
</head>
<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Midterm</a>
      <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#collapse-navbar" aria-expanded="false" aria-controls="navbar">
        &#9776;
      </button>
    </div>
    <div class="navbar-collapse collapse" id="collapse-navbar">
    <ul class="nav navbar-nav">
      <li><a href="/SWclass/Midterm/php/members.php">Members</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="/SWclass/Midterm/html/signup.html"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="/SWclass/Midterm/html/login.html"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
  </div>
</nav>
</html>
<?php
session_start();
if(isset($_SESSION['username'])){
  echo "<h1>Welcome " . $_SESSION['username'] . " to the members only page</h1>";
  echo "<a href='logout.php' class='btn btn-danger' role='button'>Log Out</a>";
  exit();
}
else{
  echo "<h1>You must sign in to see the contents of this page</h1>";
  exit();
}
?>
