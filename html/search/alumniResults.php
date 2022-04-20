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

if ($attribute == 'name') {
        $query="Select * From Alumni Where name Like '%$alumni_input%'";
} else if ($attribute == 'rank') {
        $query="Select * From Alumni Where rank Like '%$alumni_input%'";
} else if ($attribute == 'sID') {
        $query="Select * From Alumni Where sID = '$alumni_input'";
} else if ($attribute == 'email') {
        $query="Select * From Alumni Where email Like '$alumni_input%'";
}

$r=mysqli_query($connection, $query);
$success=1;
if (($alumni_input == "") || (mysqli_num_rows($r) == 0)) {
        $success=0;
        echo "<h3> No results for ".$attribute.": '".$alumni_input."'</h3>";
} else if ((mysqli_num_rows($r)) != 0) {
        echo "<h3> Results for ".$attribute.": '".$alumni_input."'</h3>";
        echo "<table border='1'>
                <thead>
                <tr>
                <th> Name </th>
                <th> Email </th>
                <th> sID </th>
                <th> Rank  </th>
                </tr>
                </thead>";
}

if ($success == 1) { 
        while ($row=mysqli_fetch_array($r)) {
                echo "<tr>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['sID']."</td>";
                echo "<td>".$row['rank']."</td>";
                echo "</tr>";
        }
        echo "</table>";
}
mysqli_close($connection);
?>

</body>
</html>
