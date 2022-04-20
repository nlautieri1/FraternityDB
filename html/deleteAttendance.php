<?php

        $ename = $_POST['ename'];
        $date = $_POST['date'];
        $sID = $_POST['sID'];

 	
		//Database info
        $host = "localhost";
        $username = "	";
        $password = "	";
        $dbname = "	";

        $conn = mysqli_connect($host, $username, $password, $dbname);
        if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
        }

		// Deletes using given input matching the table's key. For Attendance, keys are event name, date and SID
        $query="DELETE FROM Attendance WHERE eventName = '$ename'
		AND date = '$date'
		AND sID = '$sID'
		";

        if (mysqli_query($conn, $query)) {

                echo "Successfully deleted from database.";

        } else {

                echo "Error deleting from database: " . mysqli_error($conn);
        }

        mysqli_close($conn);
?>
