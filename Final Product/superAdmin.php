<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">    
<title>Super Admin</title>
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
  <img src="images/Salisbury_University_logo.png" width="150" height="50" alt="">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item mr-5">
        <a class="nav-link color-me" href="home.html">Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>
      <a href="login.php"><button class="btn btn-outline-light my-2 my-sm-0" type="submit">Login</button></a> 
 </div>
</nav>



<br>

<div class="container w-100">
	<div class="row">
		<div class="col">
	<!--		<h1 class="text-center">Manage Fraternities</h1> -->
		</div>
	</div>
	<div class="row">
		<div class="col">
			<form action="superAdmin.php" method="post">
				<div class="w-100 d-inline mt-5">
					<div class="form-group">
						<label class="text-left">Password Hasher:</label>
						<input class="form-control d-inline w-75" maxlength="20" name="password" placeholder="Enter Password" required="" type="password">
					</div>
					<div class="form-group">
					<!-- Submit button -->
					<button type="submit" class="btn btn-primary btn-block mb-4 w-50 mx-auto">Submit</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<br>

 <?php
                                if(isset($_POST['password']))
                                {
                                        $password = $_POST['password'];
					$hashed_password = password_hash($password, PASSWORD_BCRYPT);
					
					print " <p>The password entered was: " . $password . "</p>
						<p>The hashed password is: " . $hashed_password . "</p>";
					
				}
?>	

<br>


<h3>Fraternities</h3>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Fraternity Name</th>
    </tr>
  </thead>
  <tbody>
	<?php
		$connection=mysqli_connect("localhost", "nlautieri1", "3Cavalier3gulls", "FraternityDB") or die("Error connecting to database: ".mysqli_error());
		$query = "select * from Fraternity";
		$r=mysqli_query($connection, $query);
        		while ($row=mysqli_fetch_array($r)) {
                		echo "<tr>";
				echo "<td>".$row['name']."</td>";
            			echo "</tr>";
		}
		
		mysqli_close($connection);

	?>
  </tbody>
</table>


<div class="FooterContainer">
	<footer>Location: Guerrieri Student Union 125 | Phone Number: 410-543-6125</footer>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
