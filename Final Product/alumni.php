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
	<link href="css/home.css" rel="stylesheet"><?php
	    echo "<title>{$_SESSION['fName']} Alumni</title>";
	    ?>
	<style>
	   .navbar-red{
	       		background:#bf110c;
	   	}
	   	.carosel-inner{
	       		height: 100px;
	   	}
	   	.color-me{
    			color:white;
	   	}
		.navbar-red button.navbar-toggler {
  			border-color: white;
		}
		.navbar-red span.navbar-toggler-icon {
  			background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='white' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
  			color: white;
		}
	</style>
	<title></title>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-red">
		<img alt="" height="50" src="images/Salisbury_University_logo.png" width="150"> <button aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler" data-target="#navbarText" data-toggle="collapse" type="button"><span class="navbar-toggler-icon"></span></button>
		<div class="collapse navbar-collapse" id="navbarText">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link color-me" href="admin.php">Home <span class="sr-only">(current)</span></a>
				</li>
				<li class="nav-item">
					<a class="nav-link color-me" href="members.php">Members</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="alumni.php">Alumni</a>
				</li>
				<li class="nav-item">
					<a class="nav-link color-me" href="communityService.php">Community Service</a>
				</li>
				<li class="nav-item">
					<a class="nav-link color-me" href="attendance.php">Attendance</a>
				</li>
				<li class="nav-item">
					<a class="nav-link color-me" href="dues.php">Dues</a>
				</li>
				<li class="nav-item">
					<a class="nav-link color-me" href="pnm.php">PNM's</a>
				</li>
			</ul>
			<?php
				if(isset($_SESSION['admin'])){
					echo '<a href="admin.php"><button class="btn btn-outline-light my-2 my-sm-0" type="submit">Admin Page</button></a>';

				}
			?>

			<a href="logout.php"><button class="btn btn-outline-light my-2 my-sm-0" type="submit">Logout</button></a>
		</div>
	</nav><br>
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<?php
				    echo "<h1> {$_SESSION['fName']} Alumni</h1>";
				?><button class="btn btn-primary" data-target="#insert" data-toggle="modal" type="button">Insert</button> <button class="btn btn-primary" data-target="#delete" data-toggle="modal" type="button">Delete</button> <button class="btn btn-primary" data-target="#update" data-toggle="modal" type="button">Update</button>
			</div>
		</div>
	</div>
	<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="insert" role="dialog" tabindex="-1">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Insert Member</h5><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
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
							</div><label class="col-form-label" for="recipient-name">Email:</label> <input class="form-control" name="email" required="" type="email">
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
	</div><?php
	    $connection=mysqli_connect("localhost", "nlautieri1", "3Cavalier3gulls", "FraternityDB") or die("Error connecting to database: ".mysqli_error());
	    if(isset($_POST['insert'])){
	        $query = "insert into Alumni values ('{$_POST['firstName']}', '{$_POST['lastName']}', '{$_SESSION['fName']}', '{$_POST['email']}')";
	        mysqli_query($connection, $query);
	    }
	    else if(isset($_POST['delete'])){
	        $query = "delete from Alumni where email = '{$_POST['deleteEmail']}'";
	        mysqli_query($connection, $query);
	    }
	    else if(isset($_POST['update'])){
	        $query = "delete from Member where sID = '$deleteSID'";
	        mysqli_query($connection, $query);
	    }
	mysqli_close($connection);  
	?><br>
	<form method="post">
		Filter by: <select name="attribute">
			<option value="firstName">
				First Name
			</option>
			<option value="lastName">
				Last Name
			</option>
			<option value="email">
				Email
			</option>
		</select> <input id="search" name="alumni_input" placeholder="Type here" type="text"> <input id="submit" type="submit" value="Search">
	</form><br>
	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col">Name</th>
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
			                echo "<th scope='row'> {$row['firstName']} {$row['lastName']} </th>";
			                echo "<td>".$row['email']."</td>";
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