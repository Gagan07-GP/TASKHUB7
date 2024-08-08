<!-- 
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception; -->

<!-- // require 'C:\Users\91762\vendor\phpmailer\phpmailer\src\Exception.php';
// require 'C:\Users\91762\vendor\phpmailer\phpmailer\src\PHPMailer.php';
// require 'C:\Users\91762\vendor\phpmailer\phpmailer\src\SMTP.php'; -->

<?php
require 'C:\Users\91762\vendor\autoload.php';
require 'C:\Users\91762\vendor\phpmailer\phpmailer\src\Exception.php';
require 'C:\Users\91762\vendor\phpmailer\phpmailer\src\PHPMailer.php';
require 'C:\Users\91762\vendor\phpmailer\phpmailer\src\SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Email configuration
$admin_email = "somethingfor97@gmail.com";
$subject = "Task Deadline Notification";

// Connect to the database
$server = "localhost";
$username = "root";
$password = "";
$dbname = "TASKHUB";

$con = mysqli_connect($server, $username, $password, $dbname);

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the current date and time
date_default_timezone_set('Asia/Kolkata');
// $current_datetime = date("Y-m-d H:i:s");
// echo "Current datetime: " . $current_datetime . "<br>";

$current_datetime = date("Y-m-d H:i:s");

// Query to find expired tasks that have not been notified yet
$sql = "SELECT addtask7.task_id, addtask7.taskname, addtask7.deadline, users.email
        FROM addtask7
        INNER JOIN users ON addtask7.user_id = users.user_id
        WHERE addtask7.deadline < '$current_datetime' AND addtask7.not_sent = 0";

$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $task_id = $row['task_id'];
        $task_name = $row['taskname'];
        $deadline = $row['deadline'];
        $user_email = $row['email'];
        
        // Prepare the email content
        $message = "
        <html>
        <head>
        <title>Task Deadline Notification</title>
        </head>
        <body>
        <p>Dear User,</p>
        <p>Your task <strong>$task_name</strong> with deadline <strong>$deadline</strong> has expired.</p>
        <p>Please take necessary actions.</p>
        <p>Regards,<br>TaskHub Team</p>
        </body>
        </html>
        ";
        
        // Initialize PHPMailer and configure SMTP
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'somethingfor97@gmail.com'; // Your Gmail address
            $mail->Password   = 'fokoawniicglljam';  // Your Gmail password or app-specific password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;
            
            //Recipients
            $mail->setFrom($admin_email, 'TaskHub');
            $mail->addAddress($user_email);
            
            //Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $message;
            
            $mail->send();
            echo "Notification sent to $user_email.<br>";
            
            // Update the database to mark notification as sent
            $update_sql = "UPDATE addtask7 SET not_sent = 1 WHERE task_id = $task_id";
            mysqli_query($con, $update_sql);
        } catch (Exception $e) {
            echo "Failed to send notification to $user_email. Mailer Error: {$mail->ErrorInfo}<br>";
        }
    }
} else {
    echo "No expired tasks found.<br>";
}
echo "Current datetime: $current_datetime<br>";

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $task_id = $row['task_id'];
        $task_name = $row['taskname'];
        $deadline = $row['deadline'];
        $user_email = $row['email'];
        
        echo "Found expired task: $task_name with deadline $deadline<br>";

        // Prepare the email content
        // (rest of the code remains unchanged)
    }
} else {
    echo "No expired tasks found.<br>";
}


mysqli_close($con);
?>
