<?php
session_start(); // Ensure session is started

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection parameters
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "TASKHUB";

    // Create connection
    $con = mysqli_connect($server, $username, $password, $dbname);

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Sanitize and fetch input values
    $usage_frequency = mysqli_real_escape_string($con, $_POST['usage_frequency']);
    $motivation = mysqli_real_escape_string($con, $_POST['motivation']);
    $most_used_feature = mysqli_real_escape_string($con, $_POST['most_used_feature']);
    $improvement = mysqli_real_escape_string($con, $_POST['improvement']);
    
    // Retrieve user_id from session
    $user_id = $_SESSION['user_id'];

    // Insert data into the database
    $sql = "INSERT INTO feedback7 (user_id, usage_frequency, motivation, most_used_feature, improvement) 
            VALUES ('$user_id', '$usage_frequency', '$motivation', '$most_used_feature', '$improvement')";

    if (mysqli_query($con, $sql)) {
        echo "<script>
                alert('Feedback submitted successfully');
                window.history.back(); // Redirect to the previous page
              </script>";
    } else {
        echo "<script>
                alert('Error: " . mysqli_error($con) . "');
                window.history.back(); // Redirect to the previous page
              </script>";
    }

    // Close connection
    mysqli_close($con);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: #fff;
        }

        .container {
            max-width: 700px;
            width: 100%;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .container header {
            font-size: 1.5rem;
            color: #333;
            font-weight: 500;
            text-align: center;
        }

        .container .form {
            margin-top: 30px;
        }

        .form .input-box {
            width: 100%;
            margin-top: 20px;
        }

        .input-box label {
            color: #333;
        }

        .form .input-box input {
            height: 50px;
            width: 100%;
            outline: none;
            font-size: 1rem;
            color: #707070;
            margin-top: 8px;
            border: 1px solid #ccc;
            border-radius: 6px;
            padding: 0 15px;
        }

        .form .input-box input:focus {
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
        }

        .form button {
            height: 55px;
            width: 100%;
            color: #fff;
            font-size: 1rem;
            font-weight: 400;
            margin-top: 30px;
            border: none;
            cursor: pointer;
            transition: all 0.2s ease;
            background: #333;
        }

        .form button:hover {
            background: #444;
        }

        @media screen and (max-width: 500px) {
            .form .column {
                flex-wrap: wrap;
            }
        }
    </style>
</head>

<body>
    <section class="container">
        <header>Feedback</header>
        <form action="" method="post" class="form">
            <div class="input-box">
                <label>How often do you use our app?</label>
                <input type="text" name="usage_frequency" placeholder="Everyday/once a week/bi-weekly" required>
            </div>

            <div class="input-box">
                <label>What is the motivation to use our app?</label>
                <input type="text" name="motivation" placeholder="What problem does it solve for you?" required>
            </div>

            <div class="input-box">
                <label>What is the most used feature?</label>
                <input type="text" name="most_used_feature" required>
            </div>

            <div class="input-box">
                <label>What would you like to see improved the most?</label>
                <input type="text" name="improvement" required>
            </div>

            <button type="submit">Submit Feedback</button>
        </form>
    </section>
</body>

</html>
