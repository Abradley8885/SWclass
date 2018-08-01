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

<title>SWQuiz2</title>

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

<body>
<div class="container">
    	<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-16">
								<a href="#" class="active" id="register-form-link">Welcome to the Members only page!</a>
							</div>
						</div>
						<hr>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">

								<form id="register-form" action="members.php" method="post" role="form" style="display: block;">
                  <div class="container">
                    <h2>Control the elevator</h2>
                      <div class="radio">
                        <label><input type="radio" name="optradio" value="1">Floor 1</label>
                      </div>
                      <div class="radio">
                        <label><input type="radio" name="optradio" value="2">Floor 2</label>
                      </div>
                      <div class="radio">
                        <label><input type="radio" name="optradio" value="3">Floor 3</label>
                      </div>

                  </div>


                  <br/>
									<div class="form-group">
										<div class="row">
											<div class="col-sm-6 col-sm-offset-3">
												<input type="submit" name="update" id="register-submit" tabindex="4" class="form-control btn btn-register" value="Update car Node">
											</div>
										</div>
									</div>
							</form>
							</div>
              <?php
              if(isset($_POST['update'])){
                update($_POST['optradio']);
                echo "The car is now on floor:" . $_POST['optradio'];
                displayTable();
              }

               ?>
						</div>
					</div>
          <footer>
            <p align="center" id='copyright'>
              Copyright &copy ABradley
            </p>
          </footer>
				</div>

		</div>
	</div>
  <script src='../js/eventlisteners.js'></script>
</body>
</html>

<?php


function update(int $newFloor){

  $db = new PDO('mysql:host=127.0.0.1;dbname=quizElevator', 'root', '');//open database

  $query = 'UPDATE carNode SET floorNumber = :new WHERE nodeID = 1';//set query to update current floor

  $stmt = $db->prepare($query);
  $stmt->bindvalue('new', $newFloor);

  $stmt->execute();

}

function displayTable(){
  $db = new PDO('mysql:host=127.0.0.1;dbname=quizElevator', 'root', '');//open database
  echo '
  <table class="table responsive">
  	<thead>
    	<tr>
				<th scope="col">nodeID						</th>
      	<th scope="col">info	     	</th>
        <th scope="col">status	     	</th>
        <th scope="col">floorNumber	     	</th>
    	</tr>
  	</thead>';
  $rows = $db->query("SELECT t1.nodeID, t1.info, t1.status, t2.floorNumber FROM elevatorNodes t1 LEFT JOIN carNode t2 ON t1.nodeID = t2.nodeID");//pull data from database
  echo '<tbody>';
    foreach ($rows as $row) { //while data is pulled fill table rows
      echo//Display table
      '<tr>
       <td>' . $row['nodeID'] . 	'</td>
       <td>' . $row['info'] . 	'</td>
       <td>' . $row['status'] . 	'</td>
       <td>' . $row['floorNumber'] . 	'</td>
      </tr>';
    }
    echo '</tbody>
      </table>';


}

?>
