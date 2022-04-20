<?php

        $ename = $_POST['ename'];
		$date = $_POST['date'];
 	
		//Database info
        $host = "localhost";
        $username = "	";
        $password = "	";
        $dbname = "	";

        $conn = mysqli_connect($host, $username, $password, $dbname);
        if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
        }

		// Deletes using given input matching the table's key. For CS, keys are event name and date
        $query="DELETE FROM Community_Service WHERE eventName = '$ename'
		AND date = '$date'
		";

        if (mysqli_query($conn, $query)) {

                echo "Successfully deleted from database.";

        } else {

                echo "Error deleting from database: " . mysqli_error($conn);
        }

        mysqli_close($conn);
?>
