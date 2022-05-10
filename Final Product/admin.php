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
	<link href="css/home.css" rel="stylesheet"><?php
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
			<a href="logout.php"><button class="btn btn-outline-light my-2 my-sm-0" type="submit">Logout</button></a>
		</div>
	</nav>

	<?php
		if($_SESSION['fName'] != 'admin'){
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
			/*insert code here*/
		}
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
</body>
</html>
