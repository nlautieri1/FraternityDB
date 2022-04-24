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
$pnm_input=$_POST['pnm_input'];
$attribute=$_POST['attribute'];

if ($attribute == 'name') {
        $query="Select * From PNM Where name Like '%$pnm_input%'";
} else if ($attribute == 'term') {
        $query="Select * From PNM Where term Like '%$pnm_input%'";
} else if ($attribute == 'year') {
        $query="Select * From PNM Where year Like '%$pnm_input%'";
} else if ($attribute == 'gpa') {
        $query="Select * From PNM Where gpa >= '$pnm_input'";
} else if ($attribute == 'phone') {
        $query="Select * From PNM Where phone Like '%$pnm_input%'";
} else if ($attribute == 'grade') {
        $query="Select * From PNM Where grade Like '%$pnm_input%'";
} else if ($attribute == 'email') {
        $query="Select * From PNM Where email Like '%$pnm_input%'";
}

$r=mysqli_query($connection, $query);
$success=1;
if (($pnm_input == "") || (mysqli_num_rows($r) == 0)) {
        $success=0;
        echo "<h3> No results for ".$attribute.": '".$pnm_input."'</h3>";
} else if ((mysqli_num_rows($r)) != 0) {
        echo "<h3> Results for ".$attribute.": '".$pnm_input."'</h3>";
        echo "<table border='1'>
                <thead>
                <tr>
                <th> Name </th>
                <th> Term </th>
                <th> Year </th>
                <th> Phone </th>
                <th> Email </th>
                <th> Grade </th>
                <th> GPA </th>
                </tr>
                </thead>";
}
if ($success == 1) {
        while ($row=mysqli_fetch_array($r)) {
                echo "<tr>";
                echo "<td>".$row['name']."</td>";
                echo "<td>".$row['term']."</td>";
                echo "<td>".$row['year']."</td>";
                echo "<td>".$row['phone']."</td>";
                echo "<td>".$row['email']."</td>";
                echo "<td>".$row['grade']."</td>";
                echo "<td>".$row['gpa']."</td>";
                echo "</tr>";
        }
        echo "</table>";
}
mysqli_close($connection);
?>

</body>
</html>
