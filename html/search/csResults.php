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
$cs_input=$_POST['cs_input'];
$attribute=$_POST['attribute'];

if ($attribute == 'eventName') {
        $query="Select * From Community_Service Where eventName Like '%$cs_input%'";
} else if ($attribute == 'hostName') {
        $query="Select * From Community_Service Where hostName Like '%$cs_input%'";
} else if ($attribute == 'date') {
        $query="Select * From Community_Service Where date Like '%$cs_input%'";
}

$r=mysqli_query($connection, $query);
$success=1;
if (($cs_input == "") || (mysqli_num_rows($r) == 0)) {
        $success=0;
        echo "<h3> No results for ".$attribute.": '".$cs_input."'</h3>";
} else if ((mysqli_num_rows($r)) != 0) {
        echo "<h3> Results for ".$attribute.": '".$cs_input."'</h3>";
        echo "<table border='1'>
                <thead>
                <tr>
                <th> Event Name </th>
                <th> Host Name </th>
                <th> Date  </th>
                </tr>
                </thead>";
}

if ($success == 1) {
        while ($row=mysqli_fetch_array($r)) {
                echo "<tr>";
                echo "<td>".$row['eventName']."</td>";
                echo "<td>".$row['hostName']."</td>";
                echo "<td>".$row['date']."</td>";
                echo "</tr>";
        }
        echo "</table>";
}
mysqli_close($connection);
?>

</body>
</html>
