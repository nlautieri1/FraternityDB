<?php
    session_start();
    if(!isset($_SESSION['fName'])){
        header("location: login.php");
    }
    if($_SESSION['fName'] == "admin"){
	$_SESSION['admin'] = 'admin';
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
	        echo "<title>{$_SESSION['fName']} Home</title>";
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
					<a class="nav-link" href="admin.php">Home <span class="sr-only">(current)</span></a>
				</li>
				<?php
					if($_SESSION['fName'] != 'admin'){
						echo "<li class='nav-item'><a class='nav-link color-me' href='members.php'>Members</a></li>";
						echo "<li class='nav-item'><a class='nav-link color-me' href='alumni.php'>Alumni</a></li>";
						echo "<li class='nav-item'><a class='nav-link color-me' href='communityService.php'>Community Service</a></li>";
						echo "<li class='nav-item'><a class='nav-link color-me' href='attendance.php'>Attendance</a></li>";
						echo "<li class='nav-item'><a class='nav-link color-me' href='dues.php'>Dues</a></li>";
						echo "<li class='nav-item'><a class='nav-link color-me' href='pnm.php'>PNMs</a></li>";
					}
				?>
			</ul>
			<?php
				if(isset($_SESSION['admin'])){
					echo '<a href="adminSwap.php"><button class="btn btn-outline-light my-2 my-sm-0" type="submit">Admin Page</button></a>';

				}
			?>
			<a href="logout.php"><button class="btn btn-outline-light my-2 my-sm-0" type="submit">Logout</button></a>
		</div>
	</nav>

	<?php
		if($_SESSION['fName'] != 'admin'){//admin
			echo "<div class='jumbotron jumbotron-fluid'><div class='container'><h1 class='display-4'>Welcome to the {$_SESSION['fName']} Database</h1></div></div>";
			echo "<div class='container'><div class='row'>";
			echo "<div class='col'><div class='card' style='width: 18rem;'><div class='card-body'><h5 class='card-title'>Members</h5><a href='members.php' class='btn btn-primary'>Go to Members</a></div></div></div>";
			echo "<div class='col'><div class='card' style='width: 18rem;'><div class='card-body'><h5 class='card-title'>Alumni</h5><a href='alumni.php' class='btn btn-primary'>Go to Alumni</a></div></div></div>";
			echo "<div class='col'><div class='card' style='width: 18rem;'><div class='card-body'><h5 class='card-title'>Community Service</h5><a href='communityService.php' class='btn btn-primary'>Go to Community Service</a></div></div></div>";
			echo "</div><br><div class='row'>";
			echo "<div class='col'><div class='card' style='width: 18rem;'><div class='card-body'><h5 class='card-title'>Attendance</h5><a href='attendance.php' class='btn btn-primary'>Go to Attendance</a></div></div></div>";
			echo "<div class='col'><div class='card' style='width: 18rem;'><div class='card-body'><h5 class='card-title'>Dues</h5><a href='dues.php' class='btn btn-primary'>Go to Dues</a></div></div></div>";
			echo "<div class='col'><div class='card' style='width: 18rem;'><div class='card-body'><h5 class='card-title'>PNMs</h5><a href='pnm.php' class='btn btn-primary'>Go to PNMs</a></div></div></div>";
			echo "</div></div>";
		}
		else{
			echo '<div class="container"><div class="row"><div class="col text-center">';
		    echo "<h1> Admin Page </h1>";
			echo '<button class="btn btn-primary" data-target="#insertFrat" data-toggle="modal" type="button">Insert Fraternity</button> ';
			echo '<button class="btn btn-primary" data-target="#deleteFrat" data-toggle="modal" type="button">Delete Fraternity</button> ';
			echo '<button class="btn btn-primary" data-target="#addAccount" data-toggle="modal" type="button">Add Account</button> ';
            echo '<button class="btn btn-primary" data-target="#deleteAccount" data-toggle="modal" type="button">Delete Account</button> ';
            echo '<button class="btn btn-primary" data-target="#updateAccount" data-toggle="modal" type="button">Update Account</button>';
            echo "</div></div></div><br>";

			

			echo "<table class='table table-striped'>";
			echo "<thead><tr>";
			echo "<th scope='col'>Fraternity</th>";
			echo "<th scope='col'>Username</th>";
			echo "<th scope='col'>Email</th>";
			echo "<th scope='col'>Password</th>";
			echo "</tr></thead><tbody>";

			$connection=mysqli_connect("localhost", "nlautieri1", "3Cavalier3gulls", "FraternityDB") or die("Error connecting to database: ".mysqli_error());
			$query = "select * from Fraternity left join Account on name = fName";

			$r=mysqli_query($connection, $query);
			while ($row=mysqli_fetch_array($r)) {
				echo "<tr>";
				echo "<th scope='row'><a href='swap.php?temp={$row['name']}'> {$row['name']}</a></th>";
				echo "<td>{$row['username']}</td>";
				echo "<td>{$row['email']}</td>";
				echo "<td>{$row['password']}</td>";
				echo "</tr>";
			}
			echo "</tbody></table>";
			mysqli_close($connection);
		}
	?>

	<!-- Insert Fraternity Modal -->
    <div aria-hidden="true" class="modal fade" id="insertFrat" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" >Add New Fraternity</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden=w"true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        <div class="form-group">
                            <label class="col-form-label" for="recipient-name">Fraternity Name:</label>
                            <input class="form-control" maxlength="40" name="newFrat" required type="text">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button>
                            <button class="btn btn-primary" name="insertFrat" type="submit">Insert</button>
                        </div>
                   </form>
				</div>
            </div>
        </div>
	</div>

    <!-- Delete Fraternity Modal -->
    <div aria-hidden="true" class="modal fade" id="deleteFrat" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Fraternity</h5>
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                        <span aria-hidden=w"true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" onSubmit="return confirm('Are you sure you want to delete?')">
                        <div class="form-group">
                            <label class="col-form-label" for="recipient-name">Fraternity Name:</label>
                            <select name="deleteFname" id="delete-frat" placeholder="Select a Fraternity...">
                                <option value="">Select a Fraternity...</option>
								<?php
									$connection=mysqli_connect("localhost", "nlautieri1", "3Cavalier3gulls", "FraternityDB") or die("Error connecting to database: ".mysqli_error());
									$query = "select * from Fraternity";
									$r=mysqli_query($connection, $query);
									while ($row=mysqli_fetch_array($r)){
										echo "<option value='{$row['name']}'>{$row['name']}</option>";
									}
									mysqli_close($connection);
								?>
							</select>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button>
                            <button class="btn btn-primary" name="deleteFrat" type="submit">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
	</div>



	<?php
		$connection=mysqli_connect("localhost", "nlautieri1", "3Cavalier3gulls", "FraternityDB") or die("Error connecting to database: ".mysqli_error());

		if(isset($_POST['insertFrat'])){
			$query = "insert into Fraternity values ('{$_POST['newFrat']}')";
			mysqli_query($connection, $query);
		}
		else if(isset($_POST['deleteFrat'])){
			$query = "delete from Fraternity  where name = '{$_POST['deleteFname']}'";
			mysqli_query($connection, $query);
		}
		else if(isset($_POST['updateFrat'])){
			$query = "update Fraternity set name = '" . $_POST['updateTo'] . "' where name = '" . $_POST['updateFrom'] . "'";

		}
		mysqli_close($connection);
    ?>

	
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
        new TomSelect("#delete-frat",{
        		create: false,
        		sortField: {
            			field: "text",
            			direction: "asc"
        		}
		});	

		new TomSelect("#update-frat",{
        		create: false,
        		sortField: {
            			field: "text",
            			direction: "asc"
        		}
		});	
    </script>
</body>
</html>