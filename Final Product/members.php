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
	<link href="https://cdn.jsdelivr.net/npm/tom-select@2.0.0-rc.4/dist/css/tom-select.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.0.0-rc.4/dist/js/tom-select.complete.min.js"></script>	
	<?php
	    echo "<title>{$_SESSION['fName']} Members</title>";
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
					<a class="nav-link" href="members.php">Members</a>
				</li>
				<li class="nav-item">
					<a class="nav-link color-me" href="alumni.php">Alumni</a>
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
					echo '<a href="adminSwap.php"><button class="btn btn-outline-light my-2 my-sm-0" type="submit">Admin Page</button></a>';

				}
			?>
			<a href="logout.php"><button class="btn btn-outline-light my-2 my-sm-0" type="submit">Logout</button></a>
		</div>
	</nav><br>
	<div class="container">
		<div class="row">
			<div class="col text-center">
				<?php
				    echo "<h1> {$_SESSION['fName']} Members</h1>";
				?>
				<button class="btn btn-primary" data-target="#insert" data-toggle="modal" type="button">Insert</button> 
				<button class="btn btn-primary" data-target="#delete" data-toggle="modal" type="button">Delete</button> 
				<button class="btn btn-primary" data-target="#update" data-toggle="modal" type="button">Update</button>
				<button class="btn btn-primary" data-target="#graduate" data-toggle="modal" type="button">Graduate</button>

			</div>
		</div>
	</div>

	<!-- Insert member -->
	<div aria-hidden="true" class="modal fade" id="insert" role="dialog" tabindex="-1">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Insert Member</h5>
					<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<form method="post">
						<div class="form-group">
							<div class="row md-form mb-5">
								<div class="col-md-4">
									<label class="col-form-label" for="recipient-name">First Name:</label>
									<input class="form-control" name="firstName" required type="text">
								</div>
								<div class="col-md-4">
									<label class="col-form-label" for="recipient-name">Last Name:</label>
									<input class="form-control" name="lastName" required type="text">
								</div>
								<div class="col-md-4">
									<label class="col-form-label" for="recipient-name">Student ID:</label>
									<input class="form-control" pattern="[0-9]{7}" maxlength="7" name="sID" required type="text">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row md-form mb-5">
								<div class="col-md-4">
									<label class="col-form-label" for="recipient-name">Position:</label> <input class="form-control" name="position" type="text">
								</div>
								<div class="col-md-4">
									<label class="col-form-label" for="recipient-name">Grade:</label><br>
									<select name="grade">
										<option value="Freshman">Freshman</option>
										<option value="Sophomore">Sophomore</option>
										<option value="Junior">Junior</option>
										<option value="Senior">Senior</option>
									</select>
								</div>
								<div class="col-md-3">
									<label class="col-form-label" for="recipient-name">Phone Number:</label> <input name="phone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required type="tel">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row md-form mb-5">
								<div class="col-md-4">
									<label class="col-form-label" for="recipient-name">Email:</label>
									<input class="form-control" name="email" required type="email">
								</div>
								<div class="col-md-4">
									<label class="col-form-label" for="recipient-name">Major:</label>
									<select name="major" id="select-major" placeholder="Select a Major..." required>
										<option value="">Select a Major...</option>
					    					<?php
										    $connection=mysqli_connect("localhost", "nlautieri1", "3Cavalier3gulls", "FraternityDB") or die("Error connecting to database: ".mysqli_error());
										    $query = "select * from Major";
										    $r=mysqli_query($connection, $query);
										        while ($row=mysqli_fetch_array($r)) {
										            echo "<option value='{$row['name']}'>{$row['name']}</option>";
										    }
										    mysqli_close($connection);
										?>
									</select>
								</div>
								<div class="col-md-4">
									<label class="col-form-label" for="recipient-name">GPA:</label>
									<input class="form-control" max="4" min="0" name="gpa" required step="0.01" type="number">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button>
							<button class="btn btn-primary" name="insert" type="submit">Insert</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- delete member -->
	<div aria-hidden="true" class="modal fade" id="delete" role="dialog" tabindex="-1">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" >Delete Member</h5>
					<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<form method="post" onSubmit="return confirm('Are you sure you want to delete?')">
						<div class="form-group">
									<label class="col-form-label" for="recipient-name">Student ID:</label>
									<select name="deleteSID" id="select-sidd" placeholder="Select a SID...">
										<option value="">Select a SID...</option>
					    					<?php
										    	$connection=mysqli_connect("localhost", "nlautieri1", "3Cavalier3gulls", "FraternityDB") or die("Error connecting to database: ".mysqli_error());
										    	$query = "select sID, firstName, lastName from Member where fName = '{$_SESSION['fName']}'";
										    	$r=mysqli_query($connection, $query);
										        while ($row=mysqli_fetch_array($r)) {
										            echo "<option value='{$row['sID']}'>{$row['sID']} - {$row['firstName']} {$row['lastName']}</option>";
										    	}
										    	mysqli_close($connection);
											?>
									</select>
						</div>
						<div class="modal-footer">
							<button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button>
							<button class="btn btn-primary" name="delete" type="submit">Delete</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Update member -->
	<div aria-hidden="true" class="modal fade" id="update" role="dialog" tabindex="-1">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Update Member</h5>
					<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<form method="post">
						<div class="form-group">
							<div class="row md-form mb-5">
								<div class="col-md-4">
									<label class="col-form-label" for="recipient-name">First Name:</label>
									<input class="form-control" name="updateFirstName" required type="text">
								</div>
								<div class="col-md-4">
									<label class="col-form-label" for="recipient-name">Last Name:</label>
									<input class="form-control" name="updateLastName" required type="text">
								</div>
								<div class="col-md-4">
									<label class="col-form-label" for="recipient-name">Student ID:</label>
									<select name="updateSID" id="select-update" placeholder="Select a SID...">
										<option value="">Select a SID...</option>
					    					<?php
										    	$connection=mysqli_connect("localhost", "nlautieri1", "3Cavalier3gulls", "FraternityDB") or die("Error connecting to database: ".mysqli_error());
										    	$query = "select sID, firstName, lastName from Member where fName = '{$_SESSION['fName']}'";
										    	$r=mysqli_query($connection, $query);
										        while ($row=mysqli_fetch_array($r)) {
										            echo "<option value='{$row['sID']}'>{$row['sID']} - {$row['firstName']} {$row['lastName']}</option>";
										    	}
										    	mysqli_close($connection);
											?>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row md-form mb-5">
								<div class="col-md-4">
									<label class="col-form-label" for="recipient-name">Position:</label>
									<input class="form-control" name="updatePosition" type="text">
								</div>
								<div class="col-md-4">
									<label class="col-form-label" for="recipient-name">Grade:</label><br>
									<select name="updateGrade">
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
									<label class="col-form-label" for="recipient-name">Phone Number:</label>
									<input name="updatePhone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required type="tel">
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row md-form mb-5">
								<div class="col-md-4">
									<label class="col-form-label" for="recipient-name">Email:</label>
									<input class="form-control" name="updateEmail" required type="email">
								</div>
								<div class="col-md-4">
									<label class="col-form-label" for="recipient-name">Major:</label>
									<select name="updateMajor" id="select-majord" placeholder="Select a Major...">
										<option value="">Select a Major...</option>
					    					<?php
										    	$connection=mysqli_connect("localhost", "nlautieri1", "3Cavalier3gulls", "FraternityDB") or die("Error connecting to database: ".mysqli_error());
										    	$query = "select * from Major";
										    	$r=mysqli_query($connection, $query);
										        	while ($row=mysqli_fetch_array($r)) {
										            	echo "<option value='{$row['name']}'>{$row['name']}</option>";
										    	}
										    	mysqli_close($connection);
											?>
									</select>

								</div>
								<div class="col-md-4">
									<label class="col-form-label" for="recipient-name">GPA:</label>
									<input class="form-control" max="4" min="0" name="updateGPA" required step="0.01" type="number">
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button>
							<button class="btn btn-primary" name="update" type="submit">Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- Graduate Modal -->
	<div aria-hidden="true" class="modal fade" id="graduate" role="dialog" tabindex="-1">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Graduate</h5><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<form method="post">
						<div class="form-group">
									<label class="col-form-label" for="recipient-name">Student ID:</label>
									<select name="graduateSID" id="select-sidg" placeholder="Select a SID...">
										<option value="">Select a SID...</option>
					    					<?php
										    $connection=mysqli_connect("localhost", "nlautieri1", "3Cavalier3gulls", "FraternityDB") or die("Error connecting to database: ".mysqli_error());
										    $query = "select sID, firstName, lastName from Member where fName = '{$_SESSION['fName']}'";
										    $r=mysqli_query($connection, $query);
										        while ($row=mysqli_fetch_array($r)) {
										            echo "<option value='{$row['sID']}'>{$row['sID']} - {$row['firstName']} {$row['lastName']}</option>";
										    }
										    mysqli_close($connection);
										?>
									</select>
						</div>
						<div class="modal-footer">
							<button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button> 
							<button class="btn btn-primary" name="graduate" type="submit">Graduate</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php
	    $connection=mysqli_connect("localhost", "nlautieri1", "3Cavalier3gulls", "FraternityDB") or die("Error connecting to database: ".mysqli_error());
	    if(isset($_POST['insert'])){
	        $query = "insert into Member values ('{$_SESSION['fName']}', '{$_POST['firstName']}', '{$_POST['lastName']}', '{$_POST['position']}', '{$_POST['grade']}', {$_POST['gpa']}, '{$_POST['phone']}', '{$_POST['email']}', '{$_POST['major']}', '{$_POST['sID']}')";
	        mysqli_query($connection, $query);

	    }
	    else if(isset($_POST['delete'])){
	        $query = "delete from Dues where sID = '{$_POST['deleteSID']}'";
	        mysqli_query($connection, $query);
			$query = "delete from Attendance where sID = '{$_POST['deleteSID']}'";
	        mysqli_query($connection, $query);
			$query = "delete from Member where sID = '{$_POST['deleteSID']}'";
	        mysqli_query($connection, $query);

	    }
	    else if(isset($_POST['update'])){
	        $query = "update Member set firstName = '{$_POST['updateFirstName']}', lastName = '{$_POST['updateLastName']}', 
						position = '{$_POST['updatePosition']}', grade = '{$_POST['updateGrade']}', email = '{$_POST['updateEmail']}',
						major = '{$_POST['updateMajor']}', gpa = '{$_POST['updateGPA']}' where sID = '{$_POST['updateSID']}'";
	        mysqli_query($connection, $query);

	    }
	    else if(isset($_POST['graduate'])){
			$query = "delete from Dues where sID = '{$_POST['graduateSID']}'";
	        mysqli_query($connection, $query);
			$query = "delete from Attendance where sID = '{$_POST['graduateSID']}'";
	        mysqli_query($connection, $query);
			$query = "select * from Member where sID = '{$_POST['graduateSID']}'";
			$t = mysqli_query($connection, $query);
			$temp = mysqli_fetch_array($t);
			$query = "insert into Alumni values ('{$temp['firstName']}', '{$temp['lastName']}', '{$_SESSION['fName']}', '{$temp['email']}')";
			mysqli_query($connection, $query);
			$query = "delete from Member where sID = '{$_POST['graduateSID']}'";
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
			<option value="position">
				Position
			</option>
			<option value="grade">
				Grade
			</option>
			<option value="gpa">
				GPA
			</option>
			<option value="phone">
				Cell Phone
			</option>
			<option value="email">
				Email
			</option>
			<option value="major">
				Major
			</option>
			<option value="sID">
				Student ID
			</option>
		</select> <input id="search" name="member_input" placeholder="Type here" type="text"> <input id="submit" type="submit" value="Search">
	</form><br>
	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col">Student ID</th>
				<th scope="col">Name</th>
				<th scope="col">Position</th>
				<th scope="col">Grade</th>
				<th scope="col">Major</th>
				<th scope="col">GPA</th>
				<th scope="col">Phone</th>
				<th scope="col">Email</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$connection=mysqli_connect("localhost", "nlautieri1", "3Cavalier3gulls", "FraternityDB") or die("Error connecting to database: ".mysqli_error());

			$member_input=$_POST['member_input'];
			$attribute=$_POST['attribute'];
			$query = "select * from Member where fName = '{$_SESSION['fName']}'";

			if ($attribute == 'firstName') {
			        $displayAtt='first name';
			        $query="Select * From Member Where firstName Like '%$member_input%' and fName = '{$_SESSION['fName']}'";
			} else if ($attribute == 'lastName') {
			        $displayAtt='last name';
			        $query="Select * From Member Where lastName Like '%$member_input%' and fName = '{$_SESSION['fName']}'";
			} else if ($attribute == 'position') {
			        $displayAtt='position';
			        $query="Select * From Member Where position Like '%$member_input%' and fName = '{$_SESSION['fName']}'";
			} else if ($attribute == 'grade') {
			        $displayAtt='grade';
			        $query="Select * From Member Where grade Like '%$member_input%' and fName = '{$_SESSION['fName']}'";
			} else if ($attribute == 'gpa') {
			        $displayAtt='gpa';
			        $query="Select * From Member Where gpa >= '$member_input' and fName = '{$_SESSION['fName']}'";
			} else if ($attribute == 'phone') {
			        $displayAtt='phone';
			        $query="Select * From Member Where phone Like '%$member_input%' and fName = '{$_SESSION['fName']}'";
			} else if ($attribute == 'major') {
			        $displayAtt='major';
			        $query="Select * From Member Where major Like '%$member_input%' and fName = '{$_SESSION['fName']}'";
			} else if ($attribute == 'sID') {
			        $displayAtt='student ID';
			        $query="Select * From Member Where sID = '$member_input' and fName = '{$_SESSION['fName']}'";
			}

			$query .= " order by lastName";

			$r=mysqli_query($connection, $query);
			        while ($row=mysqli_fetch_array($r)) {
			                echo "<tr>";
			                echo "<th scope='row'>".$row['sID']."</th>";
			                echo "<td>{$row['lastName']}, {$row['firstName']}</td>";
			                echo "<td>".$row['position']."</td>";
			                echo "<td>".$row['grade']."</td>";
			                echo "<td>".$row['major']."</td>";
			                echo "<td>".$row['gpa']."</td>";
			                echo "<td>".$row['phone']."</td>";
							echo "<td>".$row['email']."</td>";
			                echo "</tr>";
			        }
			mysqli_close($connection);
			?>
		</tbody>
	</table>
	<br><br>
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
	<script>
		new TomSelect("#select-major",{
        		create: false,
        		sortField: {
            			field: "text",
            			direction: "asc"
        		}
		});
		new TomSelect("#select-majord",{
        		create: false,
        		sortField: {
            			field: "text",
            			direction: "asc"
        		}
		});	
		new TomSelect("#select-sidg",{
        		create: false,
        		sortField: {
            			field: "text",
            			direction: "asc"
        		}
		});
		new TomSelect("#select-sidd",{
        		create: false,
        		sortField: {
            			field: "text",
            			direction: "asc"
        		}
		});
		new TomSelect("#select-update",{
        		create: false,
        		sortField: {
            			field: "text",
            			direction: "asc"
        		}
		});

</script>
</body>
</html>
