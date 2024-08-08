<?php
session_start();
session_unset();
session_destroy();
header("Location: mainhome.php"); // Redirect to the login page
exit();
?>
