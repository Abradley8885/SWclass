<!DOCTYPE HTML>
<html>
<head>
  <meta charset="utf-8">
  <meta name='description' content='Signup page for SW Midterm' />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="../css/log_req_styles.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!--<script src='../js/log_req_func.js'></script>-->

<title>Sign Up</title>

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

<body>
<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-16">
								<a href="#" class="active" id="register-form-link">Sign Up</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">

								<form id="register-form" action="../php/addcredentials.php" method="post" role="form" style="display: block;">

                  <span id='userfeedback'></span><br/>
									<div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input type="text" name="Rusername" id="username" tabindex="1" class="form-control" placeholder="Username" value="">
									</div>

                  <span id='passwordfeedback'></span><br/>
									<div class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
										<input type="password" name="Rpassword" id="password" tabindex="2" class="form-control" placeholder="Password">
									</div>

                  <br/>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Add Me" disabled>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
          <footer>
            <p align="center" id='copyright'>
              Copyright &copy ABradley
            </p>
          </footer>
          <span id='submitfeedback'></span><br/>
				</div>
        <p align="center"><i>Username and password must be at least 7 characters<br/>Password must have at least one UPPER case letter and 1 number</i></p>
			</div>
		</div>
	</div>
  <script src='../js/eventlisteners.js'></script>
</body>
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
