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
$dues_input=$_POST['dues_input'];
$attribute=$_POST['attribute'];

if ($attribute == 'sID') {
        $query="Select * From Dues Where sID = '$dues_input'";
} else if ($attribute == 'term') {
        $query="Select * From Dues Where term Like '%$dues_input%'";
} else if ($attribute == 'year') {
        $query="Select * From Dues Where year Like '%$dues_input%'";
} else if ($attribute == 'owed') {
        $query="Select * From Dues Where owed >= '$dues_input'";
} else if ($attribute == 'currentDues') {
        $query="Select * From Dues Where currentDues Like '%$dues_input%'";
} else if ($attribute == 'paidOff') {
        if (($dues_input == 'Yes') || ($dues_input == 'yes')) {
                $new_input=1;
                $query="Select * From Dues Where paidOff Like '%$new_input%'";
        } else if (($dues_input == 'No') || ($dues_input == 'no')) {
                $new_input=0;
                $query="Select * From Dues Where paidOff Like '%$new_input%'";
        } else {
                $query="Select * From Dues Where paidOff Like '%$dues_input%'";
        }
}

$r=mysqli_query($connection, $query);
$success=1;
if (($dues_input == "") || (mysqli_num_rows($r) == 0)) {
        $success=0;
        echo "<h3> No results for ".$attribute.": '".$dues_input."'</h3>";
} else if ((mysqli_num_rows($r)) != 0) {
        echo "<h3> Results for ".$attribute.": '".$dues_input."'</h3>";
        echo "<table border='1'>
                <thead>
                <tr>
                <th> sID </th>
                <th> Term </th>
                <th> Year </th>
                <th> Owed </th>
                <th> Current Dues </th>
                <th> Paid Off </th>
                </tr>
                </thead>";
}

if ($success == 1) {
        while ($row=mysqli_fetch_array($r)) {
                echo "<tr>";
                echo "<td>".$row['sID']."</td>";
                echo "<td>".$row['term']."</td>";
                echo "<td>".$row['year']."</td>";
                echo "<td>".$row['owed']."</td>";
                echo "<td>".$row['currentDues']."</td>";
                if($row['paidOff'] == 1)
                        echo "<td> Yes </td>";
                else if($row['paidOff'] == 0)
                        echo "<td> No </td>";
                echo "</tr>";
        }
        echo "</table>";
}
mysqli_close($connection);
?>

</body>
</html>
