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
					<div class="form-group w-75 mx-auto">
						<label class="text-left">Password Hash:</label>
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

<!-- Insert Modal -->
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="insert" role="dialog" tabindex="-1">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Add New Fraternity</h5>
				<button aria-label="Close" class="close" data-dismiss="modal" type="button">
					<span aria-hidden=w"true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post">
					<div class="form-group">
						<div class="row md-form mb-5">
							<div class="col-md-4">
								<label class="col-form-label" for="recipient-name">Fraternity Name:</label> 
								<input class="form-control" maxlength="40" name="insertFname" required="" type="text">
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

<!-- Delete Modal -->
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="delete" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Fraternity</h5>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                        <span aria-hidden=w"true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                                <form method="post">
                                        <div class="form-group">
                                                <div class="row md-form mb-5">
                                                        <div class="col-md-4">
                                                                <label class="col-form-label" for="recipient-name">Fraternity Name:</label>
                                                                <input class="form-control" maxlength="40" name="deleteFname" required="" type="text">
                                                        </div>
                                                </div>
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

<!-- Update Modal -->
<div aria-hidden="true" aria-labelledby="exampleModalLabel" class="modal fade" id="update" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                        <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Update Fraternity Name</h5>
                                <button aria-label="Close" class="close" data-dismiss="modal" type="button">
                                        <span aria-hidden=w"true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body">
                                <form method="post">
                                        <div class="form-group">
                                                <div class="row md-form mb-5">
                                                        <div class="col-md-4">
                                                                <label class="col-form-label" for="recipient-name">Old Fraternity Name:</label>
                                                                <input cliass="form-control" maxlength="40" name="updateFrom" required="" type="text">
							</div>
							<div class="col-md-4">
                                                                <label class="col-form-label" for="recipient-name">New Fraternity Name:</label>
                                                                <input cliass="form-control" maxlength="40" name="updateTo"i required="" type="text">
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
	<?php
	    $connection=mysqli_connect("localhost", "nlautieri1", "3Cavalier3gulls", "FraternityDB") or die("Error connecting to database: ".mysqli_error());
	    
	    if(isset($_POST['insert'])){
		  $query = "insert into Fraternity values ('{$_POST['insertFname']}')";

	        mysqli_query($connection, $query);
	    }
	    else if(isset($_POST['delete'])){
	        $query = "delete from Fraternity  where name = '{$_POST['deleteFname']}'";
	        mysqli_query($connection, $query);
	    }
	    else if(isset($_POST['updateTo']) && isset($_POST['updateFrom']))
	    {
		
	        $query = "update Fraternity set name = '" . $_POST['updateTo'] . "' where name = '" . $_POST['updateFrom'] . "'";
	        
	    }
		mysqli_close($connection);
	?>
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
<div class="fluid container">
	<div class="row">
		<div class="col text-center">
			<button class="btn btn-primary" data-target="#insert" data-toggle="modal" type="button">Insert</button>
			<button class="btn btn-primary" data-target="#delete" data-toggle="modal" type="button">Delete</button>
			<button class="btn btn-primary" data-target="#update" data-toggle="modal" type="button">Update</button>
		</div>
	</div>
</div>
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
