<?php
    session_start();
?>
<!doctype html>
<html lang="en">
	<head>
   		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link href="css/login.css" rel="stylesheet">
		<title>Fraterntiy Login</title>
	
	</head>
	<body>
		<br><br>		
		<form action="login.php" method="post">
			<div class="fborder border border-secondary bg-light py-5 w-50 d-block mx-auto" style="border-style: groove;">
				<img alt="" class="d-block h-25 w-25 mx-auto" src="images/Salisbury_University_colored_logo.png"><br>
				<div class="form-group">
					<label class="d-block text-center">Username:</label>
					<input class="form-control w-50 mx-auto" maxlength="20" name="username" placeholder="Enter Username" required="" type="text"><br>
					<label class="d-block text-center"> Password:</label>
					<input class="form-control w-50 mx-auto" maxlength="20" name="password" placeholder="Enter Password" required="" type="password"> 
				</div>
					
				
				<div class="form-group">
					<!-- Submit button -->
					<button name="login" type="submit" class="btn btn-primary btn-block mb-4 w-50 mx-auto">Sign in</button>
					<!-- Register button -->
					<div class="text-center">
						<p>Is your fraternity not listed?<a href="#!">Request an Account</a></p>
					</div>
				</div>
			</div>
				<?php
					$connection=mysqli_connect("localhost", "nlautieri1", "3Cavalier3gulls", "FraternityDB") or die("Error connecting to database: ".mysqli_error());
			       	 	if(isset($_POST['login'])){
					$username = $_POST['username'];
				        $password = $_POST['password'];
					$query = "select * from Account where username='$username' and password='$password'";
	
				        $result = mysqli_query($connection, $query);
				            if(mysqli_num_rows($result) != 0){
				            	$row = mysqli_fetch_array($result);
				            	$_SESSION['fName'] = $row[0];
				            	header("Location: admin.php");
				        }
					}
				?>
		</form>
		
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>