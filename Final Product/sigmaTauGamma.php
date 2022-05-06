<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">    
<title>Sigma Tau Gamma</title>
    <style>
	.navbar-red{
		background:#bf110c;
	}
	.color-me{
		color:white;
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
      <li class="nav-item">
        <a class="nav-link color-me" href="home.html">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link color-me" href="alphaSigmaPhi.php">Alpha Sigma Phi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link color-me" href="kappaSigma.php">Kappa Sigma</a>
      </li>
      <li class="nav-item">
        <a class="nav-link color-me" href="piLambdaPhi.php">Pi Lambda Phi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link color-me" href="sigmaAlphaEpsilon.php">Sigma Alpha Epsilon</a>
      </li>
      <li class="nav-item">
        <a class="nav-link color-me" href="sigmaPhiEpsilon.php">Sigma Phi Epsilon</a>
      </li>
      <li class="nav-item">
        <a class="nav-link color-me" href="sigmaPi.php">Sigma Pi</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="sigmaTauGamma.php">Sigma Tau Gamma</a>
      </li>
    </ul>
      <a href="login.php"><button class="btn btn-outline-light my-2 my-sm-0" type="submit">Login</button></a>
  </div>
</nav>
<br>
<div class="container">
  <div class="row">
    <div class="col">
      <img src="images/piLambdaPhi.jpg">
    </div>
    <div class="col">
      <h1>Sigma Tau Gamma</h1>
    </div>
    <div class="col">
	<a href="https://sigtau.org/"><button type="button" class="btn btn-primary">National Site</button></a>
    </div>
    <div class="col">
      <a><span>Phone: xxx-xxx-xxxx <br>Email: xxx@gmail.com</span></a>
    </div>
  </div>
</div>

<br>

<h3>Current Members</h3>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
    </tr>
  </thead>
  <tbody>
	<?php
		$connection=mysqli_connect("localhost", "nlautieri1", "3Cavalier3gulls", "FraternityDB") or die("Error connecting to database: ".mysqli_error());
		$query = "select firstName, lastName from Member where fName = 'Sigma Tau Gamma'";
		$r=mysqli_query($connection, $query);
        		while ($row=mysqli_fetch_array($r)) {
                		echo "<tr>";
                		echo "<th scope='row'>".$row['firstName']."</th>";
                		echo "<td>".$row['lastName']."</td>";
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