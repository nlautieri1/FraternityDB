<html>
  <head>
    <title> Login Page</title>
	<link rel="stylesheet" href="login.css">
  </head>
  <body>
    <?php
	session_start();
     ?>
    <center><h1> Fraternity Login </h1></center>
    <form method="post" action="login.php">
      <div class="container">
        <label>Username: </label><br>
        <input type="text" placeholder="Enter Username" name="username" maxlength="20" required>
        <br><label> Password: </label><br>
        <input type="password" placeholder="Enter Password" name="password" maxlength="20" required>
	<button type="submit" value="login" name="login_btn">Login</button>
	<?php
		if($connection=@mysqli_connect('localhost', 'mdemchuk1', 'Coors478Ultra', 'FraternityDB')){
		}
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
		$query = "select * from Account where username='$username' and password='$password'";
		
		$r = mysqli_query($connection, $query);
		if(mysqli_num_rows($r) != 0){
			
		}
	?>
      </div>
    </form>
  </body>
  
</html>
