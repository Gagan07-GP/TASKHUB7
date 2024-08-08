<?php
// Database connection
$server = "localhost";
$username = "root";
$password = "";
$dbname = "TASKHUB";

$con = mysqli_connect($server, $username, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
date_default_timezone_set('Asia/Kolkata');
// Get the current date and time
$current_datetime = date("Y-m-d H:i:s");

// Update the phase to 'Completed' for tasks whose deadline has passed
$sql = "UPDATE `addtask7` 
        SET `phase` = 'Completed' 
        WHERE `deadline` < '$current_datetime' AND `phase` != 'Completed'";

if (mysqli_query($con, $sql)) {
    echo "Tasks updated successfully.";
} else {
    echo "Error updating tasks: " . mysqli_error($con);
}

mysqli_close($con);
?>
