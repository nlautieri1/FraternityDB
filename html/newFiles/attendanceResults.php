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
        $displayAtt='event name';
        $query="Select * From Attendance natural join Member Where eventName Like '%$attendance_input%'";
} else if ($attribute == 'sID') {
        $displayAtt='student ID';
        $query="Select * From Attendance natural join Member Where sID = '$attendance_input'";
} else if ($attribute == 'date') {
        $displayAtt='date';
        $query="Select * From Attendance natural join Member Where date Like '%$attendance_input%'";
}

$r=mysqli_query($connection, $query);
$success=1;
if (($attendance_input == "") || (mysqli_num_rows($r) == 0)) {
        $success=0;
        echo "<h3> No results for ".$displayAtt.": '".$attendance_input."'</h3>";
} else if ((mysqli_num_rows($r)) != 0) {
        echo "<h3> Results for ".$displayAtt.": '".$attendance_input."'</h3>";
        echo "<table border='1'>
                <thead>
                <tr>
                <th> sID </th>
                <th> Event Name </th>
                <th> Date </th>
                <th> First Name </th>
                <th> Last Name </th>
                </tr>
                </thead>";
}

if ($success == 1) {
        while ($row=mysqli_fetch_array($r)) {
                echo "<tr>";
                echo "<td>".$row['sID']."</td>";
                echo "<td>".$row['eventName']."</td>";
                echo "<td>".$row['date']."</td>";
                echo "<td>".$row['firstName']."</td>";
                echo "<td>".$row['lastName']."</td>";
                echo "</tr>";
        }
        echo "</table>";
}
mysqli_close($connection);
?>

</body>
</html>
