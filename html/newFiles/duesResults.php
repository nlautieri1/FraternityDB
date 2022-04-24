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
        $displayAtt='sID';
        $query="Select sID, firstName, lastName, term, year, currentDues, owed, paidOff From Dues natural join Member where sID = '$dues_input'";
} else if ($attribute == 'firstName') {
        $displayAtt='first name';
        $query="Select sID, firstName, lastName, term, year, currentDues, owed, paidOff From Dues natural join Member where firstName Like '%$dues_input%'";
} else if ($attribute == 'lastName') {
        $displayAtt='last name';
        $query="Select sID, firstName, lastName, term, year, currentDues, owed, paidOff From Dues natural join Member where lastName Like '%$dues_input%'";
} else if ($attribute == 'term') {
        $displayAtt='term';
        $query="Select sID, firstName, lastName, term, year, currentDues, owed, paidOff From Dues natural join Member where term Like '%$dues_input%'";
} else if ($attribute == 'year') {
        $displayAtt='year';
        $query="Select sID, firstName, lastName, term, year, currentDues, owed, paidOff From Dues natural join Member where year Like '%$dues_input%'";
} else if ($attribute == 'owed') {
        $displayAtt='total owed';
        $query="Select sID, firstName, lastName, term, year, currentDues, owed, paidOff From Dues natural join Member where owed >= '$dues_input'";
} else if ($attribute == 'currentDues') {
        $displayAtt='current dues';
        $query="Select sID, firstName, lastName, term, year, currentDues, owed, paidOff From Dues natural join Member where currentDues Like '%$dues_input%'";
} else if ($attribute == 'paidOff') {
        $displayAtt='dues paid';
        $new_input=1;
        if (($dues_input == 'Yes') || ($dues_input == 'yes') || ($dues_input == 'y') || ($dues_input == 'Y')) {
                $query="Select sID, firstName, lastName, term, year, currentDues, owed, paidOff From Dues natural join Member where paidOff = '$new_input'";
        } else if (($dues_input == 'No') || ($dues_input == 'no') || ($dues_input == 'n') || ($dues_input == 'N')) {
                $query="Select sID, firstName, lastName, term, year, currentDues, owed, paidOff From Dues natural join Member where paidOff = 0";
        } else {
                $query="";
        }
}

$r=mysqli_query($connection, $query);
$success=1;
if (($dues_input == "") || (mysqli_num_rows($r) == 0)) {
        $success=0;
        echo "<h3> No results for ".$displayAtt.": '".$dues_input."'</h3>";
} else if ((mysqli_num_rows($r)) != 0) {
        echo "<h3> Results for ".$displayAtt.": '".$dues_input."'</h3>";
        echo "<table border='1'>
                <thead>
                <tr>
                <th> sID </th>
                <th> First Name </th>
                <th> Last Name </th>
                <th> Term </th>
                <th> Year </th>
                <th> Total Owed </th>
                <th> Current Dues </th>
                <th> Dues Paid (Y/N) </th>
                </tr>
                </thead>";
}

if ($success == 1) {
        while ($row=mysqli_fetch_array($r)) {
                echo "<tr>";
                echo "<td>".$row['sID']."</td>";
                echo "<td>".$row['firstName']."</td>";
                echo "<td>".$row['lastName']."</td>";
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

