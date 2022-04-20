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
$attendance_input=$_POST['attendance_input'];
$attribute=$_POST['attribute'];

if ($attribute == 'eventName') {
        $query="Select * From Attendance Where eventName Like '%$attendance_input%'";
} else if ($attribute == 'status') {
        $query="Select * From Attendance Where status Like '%$attendance_input%'";
} else if ($attribute == 'sID') {
        $query="Select * From Attendance Where sID = '$attendance_input'";
} else if ($attribute == 'date') {
        $query="Select * From Attendance Where date Like '%$attendance_input%'";
}

$r=mysqli_query($connection, $query);
$success=1;
if (($attendance_input == "") || (mysqli_num_rows($r) == 0)) {
        $success=0;
        echo "<h3> No results for ".$attribute.": '".$attendance_input."'</h3>";
} else if ((mysqli_num_rows($r)) != 0) {
        echo "<h3> Results for ".$attribute.": '".$attendance_input."'</h3>";
        echo "<table border='1'>
                <thead>
                <tr>
                <th> Event Name </th>
                <th> Status </th>
                <th> Date  </th>
                <th> sID </th>
                </tr>
                </thead>";
}

if ($success == 1) {
        while ($row=mysqli_fetch_array($r)) {
                echo "<tr>";
                echo "<td>".$row['eventName']."</td>";
                echo "<td>".$row['status']."</td>";
                echo "<td>".$row['date']."</td>";
                echo "<td>".$row['sID']."</td>";
                echo "</tr>";
        }
        echo "</table>";
}
mysqli_close($connection);
?>

</body>
</html>
