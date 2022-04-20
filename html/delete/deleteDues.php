<?php

        $sID = $_POST['sID'];
		$term = $_POST['term'];
		$year = $_POST['year'];
	
		//Database info
        $host = "localhost";
        $username = "	";
        $password = "	";
        $dbname = "	";

        $conn = mysqli_connect($host, $username, $password, $dbname);
        if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
        }

		// Deletes using given input matching the table's key. For Dues, keys are sID, term, and year
        $query="DELETE FROM Dues WHERE sID  = '$sID'
		AND term = '$term'
		AND year = '$year'
		";

        if (mysqli_query($conn, $query)) {

                echo "Successfully deleted from database.";

        } else {

                echo "Error deleting from database: " . mysqli_error($conn);
        }

        mysqli_close($conn);
?>
