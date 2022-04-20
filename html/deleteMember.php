<?php

        $id = $_POST['id'];
 	
		//Database info
        $host = "localhost";
        $username = "	";
        $password = "	";
        $dbname = "	";

        $conn = mysqli_connect($host, $username, $password, $dbname);
        if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
        }

		// Deletes using given input matching the table's key. For Members, key is sID
        $query="DELETE FROM Member WHERE sID  = '$id'";

        if (mysqli_query($conn, $query)) {

                echo "Successfully deleted from database.";

        } else {

                echo "Error deleting from database: " . mysqli_error($conn);
        }

        mysqli_close($conn);
?>
