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


	<title>Salisbury Fraternity Homepage</title>
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
					<a class="nav-link color-me" href="alumni.php">Alumni</a>
				</li>
				<li class="nav-item">
					<a class="nav-link color-me" href="communityService.php">Community Service</a>
				</li>
				<li class="nav-item">
					<a class="nav-link color-me" href="attendance.php">Attendance</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="dues.php">Dues</a>
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
					echo "<h1> {$_SESSION['fName']} Dues</h1>";
				?>
				<button class="btn btn-primary" data-target="#insert" data-toggle="modal" data-whatever="@mdo" type="button">Insert</button>
				<button class="btn btn-primary" data-target="#delete" data-toggle="modal" data-whatever="@fat" type="button">Delete</button>
				<button class="btn btn-primary" data-target="#update" data-toggle="modal" data-whatever="@getbootstrap" type="button">Update</button>
			</div>
		</div>
	</div>
<br>
<div aria-hidden="true" class="modal fade" id="insert" role="dialog" tabindex="-1">
	<div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
			<div class="modal-header">
		    	<h5 class="modal-title" >Add Dues</h5>
		    	<button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
			</div>
			<div class="modal-body">
		    	<form method="post">
					<div class="form-group">
						<div class="row md-form mb-5">
							<div class="col-md-4">
								<label class="col-form-label" for="recipient-name">Student ID:</label>
								<select name="sID" id="add-dues" placeholder="Select a SID...">
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
							<div class="col-md-4">
					    		<label class="col-form-label" for="recipient-name">Term:</label><br>
					    			<select name="term">
										<option value="Fall">Fall</option>
										<option value="Spring">Spring</option>
										<option value="Winter">Winter</option>
										<option value="Summer">Summer</option>
					    			</select>
							</div>
							<div class="col-md-4">
					    		<label class="col-form-label" for="recipient-name">Year:</label>
					    		<input class="form-control" name="year" required type="text">		
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row md-form mb-5">
							<div class="col-md-4">
					    		<label class="col-form-label" for="recipient-name">Current Paid:</label>
					    		<input class="form-control" name="paid" required type="text">
							</div>
							<div class="col-md-4">
					    		<label class="col-form-label" for="recipient-name">Current Dues:</label>
					    		<input class="form-control" name="currentDues" required type="text">		
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

			<?php
				$connection=mysqli_connect("localhost", "nlautieri1", "3Cavalier3gulls", "FraternityDB") or die("Error connecting to database: ".mysqli_error());
					if(isset($_POST['insert'])){
						if (($_POST['paid']) == ($_POST['currentDues']))
							$paidOff=1;
						else
							$paidOff=0;
					$query = "insert into Dues values ('{$_POST['sID']}', '{$_POST['term']}', {$_POST['year']}, 
						{$_POST['paid']}, {$_POST['currentDues']}, $paidOff)";
					$result = mysqli_query($connection, $query);
					}
			/*
				else if(isset($_POST['delete'])){
					$query = "delete from Dues where sID = '{$_POST['deleteSID']}'";
					mysqli_query($connection, $query);
					$query = "delete from Attendance where sID = '{$_POST['deleteSID']}'";
					mysqli_query($connection, $query);
					$query = "delete from Member where sID = '{$_POST['deleteSID']}'";
					mysqli_query($connection, $query);
				}
				else if(isset($_POST['update'])){
					$query = "delete from Member where sID = '$deleteSID'";
					mysqli_query($connection, $query);
				}
			 */	
			?>
			

	<form method="post">
		Filter by: <select name="attribute">
			<option value="sID">
				Student ID
			</option>
			<option value="firstName">
				First Name
			</option>
			<option value="lastName">
				Last Name
			</option>
			<option value="term">
				Term
			</option>
			<option value="year">
				Year
			</option>
			<option value="paid">
				Current Paid
			</option>
			<option value="currentDues">
				Current Dues
			</option>
			<option value="paidOff">
				Paid Off (Y/N)
			</option>
		</select> <input id="search" name="dues_input" placeholder="Type here" type="text"> <input id="submit" type="submit" value="Search">
	</form><br>
	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col">Student ID</th>
				<th scope="col">Name</th>
				<th scope="col">Term</th>
				<th scope="col">Year</th>
				<th scope="col">Current Paid</th>
				<th scope="col">Current Dues</th>
				<th scope="col">Paid Off (Y/N)</th>
			</tr>
		</thead>
		<tbody>

<?php
	$connection=mysqli_connect("localhost", "nlautieri1", "3Cavalier3gulls", "FraternityDB") or die("Error connecting to database: ".mysqli_error());

	$query = "select * from Dues natural join Member where fName = '{$_SESSION['fName']}'";
	/*
			$dues_input=$_POST['dues_input'];
			$attribute=$_POST['attribute'];
			        $query="Select sID, firstName, lastName, term, year, paid, currentDues, paidOff From Dues natural join Member where fName = '{$_SESSION['fName']}'";
			if ($attribute == 'sID') {
			        $displayAtt='sID';
			        $query="Select sID, firstName, lastName, term, year, paid, currentDues  paidOff From Dues natural join Member where sID Like '%$dues_input%' and fName = '{$_SESSION['fName']}'";
			} else if ($attribute == 'firstName') {
			        $displayAtt='first name';
			        $query="Select sID, firstName, lastName, term, year, paid, currentDues, paidOff From Dues natural join Member where firstName Like '%$dues_input%' and fName = '{$_SESSION['fName']}'";
			} else if ($attribute == 'lastName') {
			        $displayAtt='last name';
			        $query="Select sID, firstName, lastName, term, year, paid, currentDues, paidOff From Dues natural join Member where lastName Like '%$dues_input%' and fName = '{$_SESSION['fName']}'";
			} else if ($attribute == 'term') {
			        $displayAtt='term';
			        $query="Select sID, firstName, lastName, term, year, paid, currentDues, paidOff From Dues natural join Member where term Like '%$dues_input%' and fName = '{$_SESSION['fName']}'";
			} else if ($attribute == 'year') {
			        $displayAtt='year';
			        $query="Select sID, firstName, lastName, term, year, paid, currentDues, paidOff From Dues natural join Member where year Like '%$dues_input%' and fName = '{$_SESSION['fName']}'";
			} else if ($attribute == 'paid') {
			        $displayAtt='paid';
			        $query="Select sID, firstName, lastName, term, year, paid, currentDues, paidOff From Dues natural join Member where paid >= '$dues_input' and fName = '{$_SESSION['fName']}'";
			} else if ($attribute == 'currentDues') {
			        $displayAtt='current dues';
			        $query="Select sID, firstName, lastName, term, year, paid, currentDues, paidOff From Dues natural join Member where currentDues Like '%$dues_input%' and fName = '{$_SESSION['fName']}'";
			} else if ($attribute == 'paidOff') {
			        $displayAtt='dues paid';
			        $new_input=1;
			        if (($dues_input == 'Yes') || ($dues_input == 'yes') || ($dues_input == 'y') || ($dues_input == 'Y')) {
			                $query="Select sID, firstName, lastName, term, year, paid, currentDues, paidOff From Dues natural join Member where paidOff = '$new_input' and fName = '{$_SESSION['fName']}'";
			        } else if (($dues_input == 'No') || ($dues_input == 'no') || ($dues_input == 'n') || ($dues_input == 'N')) {
			                $query="Select sID, firstName, lastName, term, year, paid, currentDues, paidOff From Dues natural join Member where paidOff = 0 and fName = '{$_SESSION['fName']}'";
			        } else {
			                $query="";
			        }
			}
 */
			
			$r=mysqli_query($connection, $query);
			        while ($row=mysqli_fetch_array($r)) {
			                echo "<tr>";
			                echo "<th scope='row'>".$row['sID']."</th>";
			                echo "<td> {$row['lastName']}, {$row['firstName']} </td>";
			                echo "<td>".$row['term']."</td>";
			                echo "<td>".$row['year']."</td>";
			                echo "<td>".$row['paid']."</td>";
			                echo "<td>".$row['currentDues']."</td>";
			        if($row['paidOff'] == 1){
			            echo "<td>Yes</td>";
			        }
			        else{
			            echo "<td>No</td>";
			        }
			                
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
	<script>
		new TomSelect("#add-dues",{
        		create: false,
        		sortField: {
            			field: "text",
            			direction: "asc"
        		}
		});	
	</script>
</body>
</html>
