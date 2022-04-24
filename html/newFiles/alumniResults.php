<!DOCTYPE html>
<html>
<head>
<?php
$connection=mysqli_connect("localhost", "nlautieri1", "3Cavalier3gulls", "FraternityDB") or die("Error connecting to database: ".mysqli_error());
?>
        <title> Search Results </title>
        <meta charset="utf-8">
</head>
<body>
<?php
$alumni_input=$_POST['alumni_input'];
$attribute=$_POST['attribute'];

if ($attribute == 'firstName') {
        $displayAtt='first name';
        $query="Select * From Alumni Where firstName Like '%$alumni_input%'";
} else if ($attribute == 'lastName') {
        $displayAtt='last name';
        $query="Select * From Alumni Where lastName Like '%$alumni_input%'";
} else if ($attribute == 'fname') {
        $displayAtt='fraternity';
        $query="Select * From Alumni Where fname Like '%$alumni_input%'";
} else if ($attribute == 'email') {
        $displayAtt='email';
        $query="Select * From Alumni Where email Like '%$alumni_input%'";
}

$r=mysqli_query($connection, $query);
$success=1;
if (($alumni_input == "") || (mysqli_num_rows($r) == 0)) {
        $success=0;
        echo "<h3> No results for ".$displayAtt.": '".$alumni_input."'</h3>";
} else if ((mysqli_num_rows($r)) != 0) {
        echo "<h3> Results for ".$displayAtt.": '".$alumni_input."'</h3>";
        echo "<table border='1'>
                <thead>
                <tr>
                <th> First Name </th>
                <th> Last Name </th>
                <th> Fraternity </th>
                <th> Email </th>
                </tr>
                </thead>";
}

if ($success == 1) {
        while ($row=mysqli_fetch_array($r)) {
                echo "<tr>";
                echo "<td>".$row['firstName']."</td>";
                echo "<td>".$row['lastName']."</td>";
                echo "<td>".$row['fname']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "</tr>";
        }
        echo "</table>";
}
mysqli_close($connection);
?>

</body>
</html>
