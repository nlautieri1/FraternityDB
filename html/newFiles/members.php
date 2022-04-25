<?php
	session_start();
	if(!isset($_SESSION['fName'])){
		header("location: login.php");
	}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home.css">    
<title>Salisbury Fraternity Homepage</title>
    <style>
	.navbar-red{
		background:#bf110c;
	}
    </style>
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-red">
    <img src="images/Salisbury_University_logo.png" width="150" height="50" alt="">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="admin.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="members.php">Members</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="alumni.php">Alumni</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="communityService.php">Community Service</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="attendance.php">Attendance</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="dues.php">Dues</a>
      </li>
    </ul>
      <a href="logout.php"><button class="btn btn-outline-light my-2 my-sm-0" type="submit">Logout</button></a>
  </div>
</nav>



<br>
<div class="container">
  <div class="row">
    <div class="col text-center">
<?php
echo "<h1> {$_SESSION['fName']} Members</h1>";
?>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Insert</button>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Delete</button>
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Update</button>
    </div>
  </div>
</div>

<form method="post">

                Filter by: <select name="attribute">
                        <option value="firstName">First Name</option>
                        <option value="lastName">Last Name</option>
                        <option value="position">Position</option>
                        <option value="grade">Grade</option>
                        <option value="gpa">GPA</option>
                        <option value="phone">Cell Phone</option>
                        <option value="email">Email</option>
                        <option value="major">Major</option>
                        <option value="sID">Student ID</option>
                </select>


                <input id="search" name="member_input" type="text" placeholder="Type here">
                <input id="submit" type="submit" value="Search">
        </form>

<br>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Student ID</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Position</th>
      <th scope="col">Grade</th>
      <th scope="col">Major</th>
      <th scope="col">GPA</th>
      <th scope="col">Phone</th>
    </tr>
  </thead>
  <tbody>
<?php
$connection=mysqli_connect("localhost", "nlautieri1", "3Cavalier3gulls", "FraternityDB") or die("Error connecting to database: ".mysqli_error());

$member_input=$_POST['member_input'];
$attribute=$_POST['attribute'];
$query = "select * from Member where fName = '{$_SESSION['fName']}'";

if ($attribute == 'firstName') {
        $displayAtt='first name';
        $query="Select * From Member Where firstName Like '%$member_input%' and fName = '{$_SESSION['fName']}'";
} else if ($attribute == 'lastName') {
        $displayAtt='last name';
        $query="Select * From Member Where lastName Like '%$member_input%' and fName = '{$_SESSION['fName']}'";
} else if ($attribute == 'position') {
        $displayAtt='position';
        $query="Select * From Member Where position Like '%$member_input%' and fName = '{$_SESSION['fName']}'";
} else if ($attribute == 'grade') {
        $displayAtt='grade';
        $query="Select * From Member Where grade Like '%$member_input%' and fName = '{$_SESSION['fName']}'";
} else if ($attribute == 'gpa') {
        $displayAtt='gpa';
        $query="Select * From Member Where gpa >= '$member_input' and fName = '{$_SESSION['fName']}'";
} else if ($attribute == 'phone') {
        $displayAtt='phone';
        $query="Select * From Member Where phone Like '%$member_input%' and fName = '{$_SESSION['fName']}'";
} else if ($attribute == 'major') {
        $displayAtt='major';
        $query="Select * From Member Where major Like '%$member_input%' and fName = '{$_SESSION['fName']}'";
} else if ($attribute == 'sID') {
        $displayAtt='student ID';
        $query="Select * From Member Where sID = '$member_input' and fName = '{$_SESSION['fName']}'";
}

$r=mysqli_query($connection, $query);
        while ($row=mysqli_fetch_array($r)) {
                echo "<tr>";
                echo "<th scope='row'>".$row['sID']."</th>";
                echo "<td>".$row['firstName']."</td>";
                echo "<td>".$row['lastName']."</td>";
                echo "<td>".$row['position']."</td>";
                echo "<td>".$row['grade']."</td>";
                echo "<td>".$row['major']."</td>";
                echo "<td>".$row['gpa']."</td>";
                echo "<td>".$row['phone']."</td>";
                echo "</tr>";
        }
mysqli_close($connection);
?>
  </tbody>
</table>



<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>

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

