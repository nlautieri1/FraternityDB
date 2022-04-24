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

if ($attribute == 'firstName') {
        $displayAtt='first name';
        $query="Select * From Member Where firstName Like '%$member_input%'";
} else if ($attribute == 'lastName') {
        $displayAtt='last name';
        $query="Select * From Member Where lastName Like '%$member_input%'";
} else if ($attribute == 'position') {
        $displayAtt='position';
        $query="Select * From Member Where position Like '%$member_input%'";
} else if ($attribute == 'grade') {
        $displayAtt='grade';
        $query="Select * From Member Where grade Like '%$member_input%'";
} else if ($attribute == 'gpa') {
        $displayAtt='gpa';
        $query="Select * From Member Where gpa >= '$member_input'";
} else if ($attribute == 'phone') {
        $displayAtt='phone';
        $query="Select * From Member Where phone Like '%$member_input%'";
} else if ($attribute == 'major') {
        $displayAtt='major';
        $query="Select * From Member Where major Like '%$member_input%'";
} else if ($attribute == 'sID') {
        $displayAtt='student ID';
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
                <th> sID </th>
                <th> First Name </th>
                <th> Last Name </th>
                <th> Position </th>
                <th> Grade </th>
                <th> GPA </th>
                <th> Phone </th>
                <th> Major </th>
                </tr>
                </thead>";
}

if ($success == 1) {
        while ($row=mysqli_fetch_array($r)) {
                echo "<tr>";
                echo "<td>".$row['sID']."</td>";
                echo "<td>".$row['firstName']."</td>";
                echo "<td>".$row['lastName']."</td>";
                echo "<td>".$row['position']."</td>";
                echo "<td>".$row['grade']."</td>";
                echo "<td>".$row['gpa']."</td>";
                echo "<td>".$row['phone']."</td>";
                echo "<td>".$row['major']."</td>";
                echo "</tr>";
        }
        echo "</table>";
}
mysqli_close($connection);
?>

</body>
</html>
