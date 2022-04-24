<?php
	session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title> Login Page</title>
	<link rel="stylesheet" href="css/login.css">
  </head>
  <body>
  
    <center><h1> Fraternity Login </h1></center>
    <form method="post" action="login.php">
      <div class="container">
        <label>Username: </label><br>
        <input type="text" placeholder="Enter Username" name="username" maxlength="20" required>
        <br><label> Password: </label><br>
        <input type="password" placeholder="Enter Password" name="password" maxlength="20" required>
	<button type="submit" value="login" name="login_btn">Login</button>
	<?php
		
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
