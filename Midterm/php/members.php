<?php
session_start();
if(isset($_SESSION['username'])){
  echo "<h1>Welcome " . $_SESSION['username'] . " to the members only page</h1>";
  echo "<a href='logout.php' class='btn btn-danger' role='button'>Log Out</a>";
  exit();
}
else{
  exit();
}
?>
