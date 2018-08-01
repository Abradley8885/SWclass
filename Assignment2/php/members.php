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
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */

    .btn-register{width: 100px;}
  </style>
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
      <li><a href="/SWclass/Assignment2/php/members.php">Members</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href=""><span class="glyphicon glyphicon-user"></span>#</a></li>
      <li><a href=""><span class="glyphicon glyphicon-log-in"></span>#</a></li>
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
                    <h2>Update fields of the database</h2>
                    <div class="form-group">
                      <label for="Input" class="control-label col-sm-1" >Input:</label>
                      <div class="col-sm-4">
                        <input id="input" class="form-control" type="text" placeholder="text / numbers here" name="input" required autofocus/>
                      </div>
                    </div>

                  </div>


                  <br/>


											<div align="center">
												<input type="submit" name="update1" id="register-submit1"  class="form-control btn btn-register" value="Field 1">
                        <input type="submit" name="update2" id="register-submit2"  class="form-control btn btn-register" value="Field 2">
                        <input type="submit" name="update3" id="register-submit3"  class="form-control btn btn-register" value="Field 3">
                        <input type="submit" name="update4" id="register-submit4"  class="form-control btn btn-register" value="Field 4">

                      </div>


							</form>
							</div>
              <?php
              if(isset($_POST['update1'])){
                update1($_POST['input']);
                echo "updated Field1";
                displayTable();
              }
              if(isset($_POST['update2'])){
                update2($_POST['input']);
                echo "updated Field2";
                displayTable();
              }
              if(isset($_POST['update3'])){
                update3($_POST['input']);
                echo "updated Field3";
                displayTable();
              }
              if(isset($_POST['update4'])){
                update4($_POST['input']);
                echo "updated Field4";
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
</body>
</html>

<?php


/*function update(int $newFloor){

  $db = new PDO('mysql:host=127.0.0.1;dbname=assignment', 'root', '');//open database

  $query = 'UPDATE carNode SET floorNumber = :new WHERE nodeID = 1';//set query to update current floor

  $stmt = $db->prepare($query);
  $stmt->bindvalue('new', $newFloor);

  $stmt->execute();

}*/
function update1(string $newFloor){

  $db = new PDO('mysql:host=127.0.0.1;dbname=assignment', 'root', '');//open database

  $query = 'UPDATE a2 SET field1 = :new WHERE ID = 1';//set query to update current floor

  $stmt = $db->prepare($query);
  $stmt->bindvalue('new', $newFloor);

  $stmt->execute();

}
function update2(string $newFloor){

  $db = new PDO('mysql:host=127.0.0.1;dbname=assignment', 'root', '');//open database

  $query = 'UPDATE a2 SET field2 = :new WHERE ID = 1';//set query to update current floor

  $stmt = $db->prepare($query);
  $stmt->bindvalue('new', $newFloor);

  $stmt->execute();

}
function update3(string $newFloor){

  $db = new PDO('mysql:host=127.0.0.1;dbname=assignment', 'root', '');//open database

  $query = 'UPDATE a2 SET field3 = :new WHERE ID = 1';//set query to update current floor

  $stmt = $db->prepare($query);
  $stmt->bindvalue('new', $newFloor);

  $stmt->execute();

}
function update4(string $newFloor){

  $db = new PDO('mysql:host=127.0.0.1;dbname=assignment', 'root', '');//open database

  $query = 'UPDATE a2 SET field4 = :new WHERE ID = 1';//set query to update current floor

  $stmt = $db->prepare($query);
  $stmt->bindvalue('new', $newFloor);

  $stmt->execute();

}

function displayTable(){
  $db = new PDO('mysql:host=127.0.0.1;dbname=assignment', 'root', '');//open database
  echo '
  <table class="table responsive">
  	<thead>
    	<tr>
				<th scope="col">ID						</th>
      	<th scope="col">field1	     	</th>
        <th scope="col">field2	     	</th>
        <th scope="col">field3	     	</th>
        <th scope="col">field4	     	</th>
    	</tr>
  	</thead>';
  $rows = $db->query("SELECT*FROM a2");//pull data from database
  echo '<tbody>';
    foreach ($rows as $row) { //while data is pulled fill table rows
      echo//Display table
      '<tr>
       <td>' . $row['ID'] . 	'</td>
       <td>' . $row['field1'] . 	'</td>
       <td>' . $row['field2'] . 	'</td>
       <td>' . $row['field3'] . 	'</td>
       <td>' . $row['field4'] . 	'</td>
      </tr>';
    }
    echo '</tbody>
      </table>';


}

?>
