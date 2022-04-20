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
$member_input=$_POST['member_input'];
$attribute=$_POST['attribute'];

if ($attribute == 'name') {
        $query="Select * From Member Where name Like '%$member_input%'";
} else if ($attribute == 'rank') {
        $query="Select * From Member Where rank Like '%$member_input%'";
} else if ($attribute == 'grade') {
        $query="Select * From Member Where grade Like '%$member_input%'";
} else if ($attribute == 'gpa') {
        $query="Select * From Member Where gpa >= '$member_input'";
} else if ($attribute == 'phone') {
        $query="Select * From Member Where phone Like '%$member_input%'";
} else if ($attribute == 'major') {
        $query="Select * From Member Where major Like '%$member_input%'";
} else if ($attribute == 'sID') {
        $query="Select * From Member Where sID = '$member_input'";
}

$r=mysqli_query($connection, $query);
$success=1;
if (($member_input == "") || (mysqli_num_rows($r) == 0)) {
        $success=0;
        echo "<h3> No results for ".$attribute.": '".$member_input."'</h3>";
} else if ((mysqli_num_rows($r)) != 0) {
        echo "<h3> Results for ".$attribute.": '".$member_input."'</h3>";
        echo "<table border='1'>
                <thead>
                <tr>
                <th> Name </th>
                <th> Rank </th>
                <th> Grade </th>
                <th> GPA </th>
                <th> Phone </th>
                <th> Major </th>
                <th> sID </th>
                </tr>
                </thead>";
}

if ($success == 1) {
        while ($row=mysqli_fetch_array($r)) {
                echo "<tr>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['rank']."</td>";
                echo "<td>".$row['grade']."</td>";
                echo "<td>".$row['gpa']."</td>";
                echo "<td>".$row['phone']."</td>";
                echo "<td>".$row['major']."</td>";
                echo "<td>".$row['sID']."</td>";
                echo "</tr>";
        }
        echo "</table>";
}
mysqli_close($connection);
?>

</body>
</html>
