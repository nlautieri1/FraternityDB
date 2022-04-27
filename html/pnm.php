<?php
    session_start();
    if(!isset($_SESSION['fName'])){
        header("location: login.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport"><!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/home.css" rel="stylesheet">
	<title>Salisbury Fraternity Homepage</title>
	<style>
	   .navbar-red{
	       background:#bf110c;
	   }
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark navbar-red">
		<img alt="" height="50" src="images/Salisbury_University_logo.png" width="150"> <button aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarText" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
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
			</ul><a href="logout.php"><button class="btn btn-outline-light my-2 my-sm-0" type="submit">Logout</button></a>
		</div>
	</nav>
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<?php
				    echo "<h1> {$_SESSION['fName']} PNM's</h1>";
				?><button class="btn btn-primary" data-target="#insert" data-toggle="modal" type="button">Insert PNM</button> <button class="btn btn-primary" data-target="#delete" data-toggle="modal" type="button">Delete PNM</button> <button class="btn btn-primary" data-target="#update" data-toggle="modal" type="button">Update PNM</button> <button class="btn btn-primary" data-target="#insertRush" data-toggle="modal" type="button">Insert Rush Event</button> <button class="btn btn-primary" data-target="#deleteRush" data-toggle="modal" type="button">Delete Rush Event</button> <button class="btn btn-primary" data-target="#updateRush" data-toggle="modal" type="button">Update Rush Event</button>
			</div>
		</div>
	</div>
	<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="insert" role="dialog" tabindex="-1">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Insert PNM</h5><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<form method="post">
						<div class="form-group">
							<div class="row md-form mb-5">
								<div class="col-md-4">
									<label class="col-form-label" for="recipient-name">First Name:</label> <input class="form-control" name="firstName" required="" type="text">
								</div>
								<div class="col-md-4">
									<label class="col-form-label" for="recipient-name">Last Name:</label> <input class="form-control" name="lastName" required="" type="text">
								</div>
								<div class="col-md-4">
									<label class="col-form-label" for="recipient-name">GPA:</label> <input class="form-control" max="4" min="0" name="gpa" required="" step="0.01" type="number">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row md-form mb-5">
								<div class="col-md-4">
									<label class="col-form-label" for="recipient-name">Email:</label> <input class="form-control" name="email" required="" type="email">
								</div>
								<div class="col-md-4">
									<label class="col-form-label" for="recipient-name">Grade:</label><br>
									<select name="grade">
										<option value="Freshman">
											Freshman
										</option>
										<option value="Sophomore">
											Sophomore
										</option>
										<option value="Junior">
											Junior
										</option>
										<option value="Senior">
											Senior
										</option>
									</select>
								</div>
								<div class="col-md-3">
									<div class="col-md-4">
										<label class="col-form-label" for="recipient-name">Phone Number:</label> <input name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required="" type="tel">
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row md-form mb-5"></div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button> <button class="btn btn-primary" name="insert" type="submit">Insert</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="delete" role="dialog" tabindex="-1">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Delete Member</h5><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<form method="post">
						<div class="form-group">
							<label class="col-form-label" for="recipient-name">Email:</label> <input class="form-control" name="deleteEmail" required="" type="email">
						</div>
						<div class="modal-footer">
							<button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button> <button class="btn btn-primary" name="delete" type="submit">Delete</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="insertRush" role="dialog" tabindex="-1">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Insert PNM Rush Event</h5><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<form method="post">
						<div class="form-group">
							<div class="row md-form mb-5">
								<div class="col-md-4">
									<label class="col-form-label" for="recipient-name">Event Name:</label> <input class="form-control" name="eventName" required="" type="text">
								</div>
								<div class="col-md-4">
									<label class="col-form-label" for="recipient-name">Email:</label> <input class="form-control" name="emailRush" required="" type="email">
								</div>
								<div class="col-md-4">
									<label class="col-form-label" for="recipient-name">Date:</label><br>
									<input name="date" required="" type="date">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button> <button class="btn btn-primary" name="insertRush" type="submit">Insert</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="deleteRush" role="dialog" tabindex="-1">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Delete PNM Rush Event</h5><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<form method="post">
						<div class="form-group">
							<div class="row md-form mb-5">
								<div class="col-md-4">
									<label class="col-form-label" for="recipient-name">Event Name:</label> <input class="form-control" name="deleteEventName" required="" type="text">
								</div>
								<div class="col-md-4">
									<label class="col-form-label" for="recipient-name">Email:</label> <input class="form-control" name="deleteEmailRush" required="" type="email">
								</div>
								<div class="col-md-4">
									<label class="col-form-label" for="recipient-name">Date:</label><br>
									<input name="deleteDate" required="" type="date">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button> <button class="btn btn-primary" name="deleteRush" type="submit">Delete</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div><?php
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
		Filter by: <select name="attribute">
			<option value="firstName">
				First Name
			</option>
			<option value="lastName">
				Last Name
			</option>
			<option value="phone">
				Phone
			</option>
			<option value="email">
				Email
			</option>
			<option value="grade">
				Grade
			</option>
			<option value="gpa">
				GPA
			</option>
		</select> <input id="search" name="pnm_input" placeholder="Type here" type="text"> <input id="submit" type="submit" value="Search">
	</form><br>
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
		<footer>
			Location: Guerrieri Student Union 125 | Phone Number: 410-543-6125
		</footer>
	</div><!-- Optional JavaScript -->
	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js">
	</script> 
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js">
	</script> 
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js">
	</script>
</body>
</html>
