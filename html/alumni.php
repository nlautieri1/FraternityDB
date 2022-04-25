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
    <?php
	echo "<title>{$_SESSION['fName']} Alumni</title>";
    ?>
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
      <li class="nav-item">
        <a class="nav-link" href="pnm.php">PNM's</a>
      </li>
    </ul>
      <a href="logout.php"><button class="btn btn-outline-light my-2 my-sm-0" type="submit">Logout</button></a>
  </div>
</nav>

<br>
<div class="container">
  <div class="row">
    <div class="col text-center">
<?php
	echo "<h1> {$_SESSION['fName']} Alumni</h1>";
?>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insert">Insert</button>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#delete">Delete</button>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update">Update</button>
    </div>
  </div>
</div>


<div class="modal fade" id="insert" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insert Member</h5>
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
 		</div>
		<label for="recipient-name" class="col-form-label">Email:</label>
            	<input type="email" class="form-control" name="email" required>
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


<?php
	$connection=mysqli_connect("localhost", "nlautieri1", "3Cavalier3gulls", "FraternityDB") or die("Error connecting to database: ".mysqli_error());
	if(isset($_POST['insert'])){
		$query = "insert into Alumni values ('{$_POST['firstName']}', '{$_POST['lastName']}', '{$_SESSION['fName']}', '{$_POST['email']}')";
 	}
	else if(isset($_POST['delete'])){
		$query = "delete from Alumni where email = '{$_POST['deleteEmail']}'";
		mysqli_query($connection, $query);
	}
	else if(isset($_POST['update'])){
		$query = "delete from Member where sID = '$deleteSID'";
		mysqli_query($connection, $query);
	}	
?>


<br>

<form method="post">

                Search by: <select name="attribute">
                        <option value="firstName">First Name</option>
                        <option value="lastName">Last Name</option>
			<option value="email">Email</option>
                </select>


                <input id="search" name="alumni_input" type="text" placeholder="Type here">
                <input id="submit" type="submit" value="Search">
        </form>

<br>

<table class="table table-striped">
  <thead>
    <tr>
      	<th scope="col">First Name</th>
   	<th scope="col">Last Name</th>
	<th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>

<?php
$connection=mysqli_connect("localhost", "nlautieri1", "3Cavalier3gulls", "FraternityDB") or die("Error connecting to database: ".mysqli_error());

$alumni_input=$_POST['alumni_input'];
$attribute=$_POST['attribute'];
$query = "select * from Alumni where fName = '{$_SESSION['fName']}'";

if ($attribute == 'firstName') {
        $displayAtt='first name';
        $query="Select * From Alumni Where firstName Like '%$alumni_input%' and fname = '{$_SESSION['fName']}'";
} else if ($attribute == 'lastName') {
        $displayAtt='last name';
        $query="Select * From Alumni Where lastName Like '%$alumni_input%' and fname = '{$_SESSION['fName']}'";
} else if ($attribute == 'email') {
        $displayAtt='email';
        $query="Select * From Alumni Where email Like '%$alumni_input%' and fname = '{$_SESSION['fName']}'";
}


$r=mysqli_query($connection, $query);
        while ($row=mysqli_fetch_array($r)) {
                echo "<tr>";
                echo "<th scope='row'>".$row['firstName']."</th>";
                echo "<td>".$row['lastName']."</td>";
                echo "<td>".$row['email']."</td>";
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
