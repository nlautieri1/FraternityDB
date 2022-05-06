<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link href="css/login.css" rel="stylesheet">
</head>
<body>
	<center>
		<h1>Fraternity Login</h1>
	</center>
	<form action="login.php" method="post">
		<div class="container">
			<label>Username:</label><br>
			<input maxlength="20" name="username" placeholder="Enter Username" required="" type="text"><br>
			<label>Password:</label><br>
			<input maxlength="20" name="password" placeholder="Enter Password" required="" type="password"> <button name="login_btn" type="submit" value="login">Login</button> <?php
			        
			        if($connection=@mysqli_connect('localhost', 'mdemchuk1', 'Coors478Ultra', 'FraternityDB')){}
			        $username = $_POST['username'];
			        $password = $_POST['password'];

			        $result = mysqli_query($connection, "select * from Account where username='$username' and password='$password'");
			        if(mysqli_num_rows($result) != 0){
			            $row = mysqli_fetch_array($result);
			            $_SESSION['fName'] = $row[0];
			            header("Location: admin.php");
			        }
			    ?>
		</div>
	</form>
</body>
</html>