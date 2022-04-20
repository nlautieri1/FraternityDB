<html>
<body>
        <form action = 'testInsert.php' method = 'post'>
Fraternity Name:
<input type = 'text' name = 'fname' id = fname>
Name:
<input type = 'text' name = 'name' id = name>
Rank:
<input type = 'text' name = 'rank' id = rank>
Grade:
<input type = 'text' name = 'grade' id = grade>
GPA:
<input type = 'text' name = 'gpa' id = gpa>
Phone:
<input type = 'text' name = 'phone' id = phone>
Major:
<input type = 'text' name = 'major' id = major>
sID:
<input type = 'text' name = 'sID' id = sID>
<input type = 'Submit' value = 'Submit'>

<?php
$connection = @mysqli_connect('localhost', 'rpoholsky1', 'rpoholsky1', 'FraternityDB');

$fname = $_POST['fname'];
$name = $_POST['name'];
$rank = $_POST['rank'];
$grade = $_POST['grade'];
$gpa = $_POST['gpa'];
$phone = $_POST['phone'];
$major = $_POST['major'];
$sID = $_POST['sID'];

$sqlquery = "INSERT INTO Member VALUES('$fname', '$name', '$rank', '$grade', '$gpa', '$phone', 'major', '$sID')";
echo $sqlquery;
$rs = mysqli_query($connection, $sqlquery);

if(mysqli_affected_rows($rs) == 1){
        echo "Record inserted succesfully";
}
mysqli_close($connection);

?>

</form>
</body>
</html>