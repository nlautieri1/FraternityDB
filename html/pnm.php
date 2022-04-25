<?php
	session_start();
	if(!isset($_SESSION['fName'])){
		header("location: login.php");
	}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">    
<title>Salisbury Fraternity Homepage</title>
    <style>
	.navbar-red{
		background:#bf110c;
	}
    </style>
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-red">
    <img src="images/Salisbury_University_logo.png" width="150" height="50" alt="">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="admin.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="members.php">Members</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="alumni.php">Alumni</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="communityService.php">Community Service</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="attendance.php">Attendance</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dues.php">Dues</a>
      </li>
    </ul>
      <a href="logout.php"><button class="btn btn-outline-light my-2 my-sm-0" type="submit">Logout</button></a>
  </div>
</nav>



<div class="container">
  <div class="row">
    <div class="col text-center">
<?php
	echo "<h1> {$_SESSION['fName']} PNM's</h1>";
?>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insert">Insert PNM</button>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#delete">Delete PNM</button>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update">Update PNM</button>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertRush">Insert Rush Event</button>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deleteRush">Delete Rush Event</button>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateRush">Update Rush Event</button>

    </div>
  </div>
</div>


<div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insert PNM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="form-group">
		<div class="row md-form mb-5 ">
 			<div class="col-md-4">
				<label for="recipient-name" class="col-form-label">First Name:</label>
            			<input type="text" class="form-control" name="firstName" required>
			</div>
 			<div class="col-md-4">
				<label for="recipient-name" class="col-form-label">Last Name:</label>
            			<input type="text" class="form-control" name="lastName" required>
			</div>
 			<div class="col-md-4">
				<label for="recipient-name" class="col-form-label">GPA:</label>
            			<input type="number" class="form-control" step="0.01" name="gpa" max="4" min="0" required>
			</div>
 		</div>
          </div>
          <div class="form-group">
		<div class="row md-form mb-5 ">
			<div class="col-md-4">
				<label for="recipient-name" class="col-form-label">Email:</label>
            			<input type="email" class="form-control" name="email" required>
 			</div>
 			<div class="col-md-4">
				<label for="recipient-name" class="col-form-label">Grade:</label>
				<br><select name="grade">
		                        <option value="Freshman">Freshman</option>
		                        <option value="Sophomore">Sophomore</option>
		                        <option value="Junior">Junior</option>
		                        <option value="Senior">Senior</option>
				</select>
			</div>
			<div class="col-md-3">
				<div class="col-md-4">
					<label for="recipient-name" class="col-form-label">Phone Number:</label>
            				<input type="tel" name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
				</div>
			</div>
 		</div>
          </div>
          <div class="form-group">
		<div class="row md-form mb-5 ">
		</div>
          </div>
	<div class="modal-footer">
        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        	<button type="submit" class="btn btn-primary" name="insert">Insert</button>
     	 </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Member</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="form-group">
		<label for="recipient-name" class="col-form-label">Email:</label>
            	<input type="email" class="form-control" name="deleteEmail" required>
          </div>
	<div class="modal-footer">
        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        	<button type="submit" class="btn btn-primary" name="delete">Delete</button>
     	 </div>

        </form>
      </div>
      
    </div>
  </div>
</div>

<div class="modal fade" id="insertRush" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insert PNM Rush Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="form-group">
		<div class="row md-form mb-5 ">
 			<div class="col-md-4">
				<label for="recipient-name" class="col-form-label">Event Name:</label>
            			<input type="text" class="form-control" name="eventName" required>
			</div>
 			<div class="col-md-4">
				<label for="recipient-name" class="col-form-label">Email:</label>
            			<input type="email" class="form-control" name="emailRush" required>
 			</div>
			<div class="col-md-4">
				<label for="recipient-name" class="col-form-label">Date:</label><br>
            			<input type="date" name="date" required>
			</div>
 		</div>
          </div>
	<div class="modal-footer">
        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        	<button type="submit" class="btn btn-primary" name="insertRush">Insert</button>
     	 </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="deleteRush" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete PNM Rush Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="form-group">
		<div class="row md-form mb-5 ">
 			<div class="col-md-4">
				<label for="recipient-name" class="col-form-label">Event Name:</label>
            			<input type="text" class="form-control" name="deleteEventName" required>
			</div>
 			<div class="col-md-4">
				<label for="recipient-name" class="col-form-label">Email:</label>
            			<input type="email" class="form-control" name="deleteEmailRush" required>
 			</div>
			<div class="col-md-4">
				<label for="recipient-name" class="col-form-label">Date:</label><br>
            			<input type="date" name="deleteDate" required>
			</div>
 		</div>
          </div>
	<div class="modal-footer">
        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        	<button type="submit" class="btn btn-primary" name="deleteRush">Delete</button>
     	 </div>
        </form>
      </div>
    </div>
  </div>
</div>



<?php
	$connection=mysqli_connect("localhost", "nlautieri1", "3Cavalier3gulls", "FraternityDB") or die("Error connecting to database: ".mysqli_error());
	if(isset($_POST['insert'])){
		$query = "insert into PNM values ('{$_POST['firstName']}', '{$_POST['lastName']}', '{$_POST['phone']}', '{$_POST['email']}', '{$_POST['grade']}', {$_POST['gpa']})";
		mysqli_query($connection, $query);
	}
	else if(isset($_POST['delete'])){
		$query = "delete from PNM where email = '{$_POST['deleteEmail']}'";
		mysqli_query($connection, $query);
	}
	else if(isset($_POST['update'])){
		mysqli_query($connection, $query);
	}
	else if(isset($_POST['insertRush'])){
		$query = "insert into Rush values ('{$_SESSION['fName']}', '{$_POST['emailRush']}', '{$_POST['eventName']}', '{$_POST['date']}')";
		mysqli_query($connection, $query);
	}
	else if(isset($_POST['deleteRush'])){
		$query = "delete from Rush where fName = '{$_SESSION['fName']}' and email = '{$_POST['deleteEmailRush']}' and eventName = '{$_POST['deleteEventName']}' and date = '{$_POST['deleteDate']}'";
		mysqli_query($connection, $query);
	}
	else if(isset($_POST['updateRush'])){
		mysqli_query($connection, $query);
	}


	mysqli_close($connection);
?>



<form method="post">

                Search by: <select name="attribute">
                        <option value="firstName">First Name</option>
                        <option value="lastName">Last Name</option>
                        <option value="phone">Phone</option>
                        <option value="email">Email</option>
                        <option value="grade">Grade</option>
                        <option value="gpa">GPA</option>
                </select>


                <input id="search" name="pnm_input" type="text" placeholder="Type here">
                <input id="submit" type="submit" value="Search">
        </form>

<br>

<table class="table table-striped">
  <thead>
    <tr> 
      <th scope="col">Email</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Phone</th>
      <th scope="col">Grade</th>
      <th scope="col">GPA</th>
      <th scope="col">Event Name</th>
      <th scope="col">Date</th>
    </tr>
  </thead>
  <tbody>
<?php
$connection=mysqli_connect("localhost", "nlautieri1", "3Cavalier3gulls", "FraternityDB") or die("Error connecting to database: ".mysqli_error());

$pnm_input=$_POST['pnm_input'];
$attribute=$_POST['attribute'];

$query = "Select * From PNM natural join Rush Where fName = '{$_SESSION['fName']}'";

if ($attribute == 'firstName') {
        $query="Select * From PNM natural join Rush Where firstName Like '%$pnm_input%' and fName = '{$_SESSION['fName']}'";
} else if ($attribute == 'lastName') {
        $query="Select * From PNM natural join Rush Where lastName Like '%$pnm_input%' and fName = '{$_SESSION['fName']}'";
} else if ($attribute == 'phone') {
        $query="Select * From PNM natural join Rush Where phone Like '%$pnm_input%' and fName = '{$_SESSION['fName']}'";
} else if ($attribute == 'email') {
        $query="Select * From PNM natural join Rush Where email Like '%$pnm_input%' and fName = '{$_SESSION['fName']}'";
} else if ($attribute == 'gpa') {
        $query="Select * From PNM natural join Rush Where gpa >= '$pnm_input' and fName = '{$_SESSION['fName']}'";
} else if ($attribute == 'grade') {
        $query="Select * From PNM natural join Rush Where grade Like '%$pnm_input%' and fName = '{$_SESSION['fName']}'";
}

$r=mysqli_query($connection, $query);
        while ($row=mysqli_fetch_array($r)) {
                echo "<tr>";
                echo "<th scope='row'>".$row['email']."</th>";
                echo "<td>".$row['firstName']."</td>";
                echo "<td>".$row['lastName']."</td>";
                echo "<td>".$row['phone']."</td>";
                echo "<td>".$row['grade']."</td>";
                echo "<td>".$row['gpa']."</td>";
                echo "<td>".$row['eventName']."</td>";
                echo "<td>".$row['date']."</td>";
                echo "</tr>";
        }
mysqli_close($connection);
?>
  </tbody>
</table>

<div class="FooterContainer">
	<footer>Location: Guerrieri Student Union 125 | Phone Number: 410-543-6125</footer>
</div>

<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
	
	</body>
</html>