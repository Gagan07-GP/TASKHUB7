<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "TASKHUB";

    $con = mysqli_connect($server, $username, $password, $dbname);

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if the email already exists
    $check_sql = "SELECT * FROM `users` WHERE `email` = '$email'";
    $check_result = mysqli_query($con, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        // Email already exists
        echo "<script>
                alert('Error: Email is already registered.');
                window.location.href = 'login.php'; // Redirect to the login page
              </script>";
    } else {
        // Email does not exist, proceed with registration
        $sql = "INSERT INTO `users`(`name`, `email`, `password`) VALUES ('$name', '$email', '$hashed_password')";

        if (mysqli_query($con, $sql)) {
            $user_id = mysqli_insert_id($con);
            $_SESSION['user_name'] = $name ;// Add this line to store the user's name
            $_SESSION['user_id'] = $user_id;
            $_SESSION['email'] = $email;
            echo "<script>alert('Registration successful');</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($con) . "');</script>";
        }
    }

    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Form</title>

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
            position: relative;
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

        .form :where(.input-box input, .select-box) {
            position: relative;
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

        .input-box input:focus {
            box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
        }

        .form .column {
            display: flex;
            column-gap: 15px;
        }

        .form .gender-box {
            margin-top: 20px;
        }

        .gender-box h3 {
            color: #333;
            font-size: 1rem;
            font-weight: 400;
            margin-bottom: 8px;
        }

        .form :where(.gender-option, .gender) {
            display: flex;
            align-items: center;
            column-gap: 50px;
            flex-wrap: wrap;
        }

        .form .gender {
            column-gap: 5px;
        }

        .gender input {
            accent-color: #333;
        }

        .form :where(.gender input, .gender label) {
            cursor: pointer;
        }

        .gender label {
            color: #333;
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

        .form .message {
            margin-top: 20px;
            text-align: center;
        }

        .form .message a {
            color: #333;
            text-decoration: none;
            font-weight: 500;
        }

        .form .message a:hover {
            text-decoration: underline;
        }

        @media screen and (max-width: 500px) {
            .form .column {
                flex-wrap: wrap;
            }

            .form :where(.gender-option, .gender) {
                row-gap: 15px;
            }
        }
    </style>
</head>

<body>
    <section class="container">
        <header>Registration Form</header>
        <form action="" method="post" class="form">
            <div class="input-box">
                <label>Full Name</label>
                <input type="text" placeholder="Enter full name" name="name" required>
            </div>

            <div class="input-box">
                <label>Email Address</label>
                <input type="email" placeholder="Enter email address" name="email" required>
            </div>

            <div class="input-box">
                <label>Password</label>
                <input type="password" placeholder="Enter Password" name="password" required>
            </div>

            <button type="submit">Submit</button>

            <div class="message">
                <p>Already registered? <a href="login.php">Go to Login</a></p>
            </div>
        </form>
    </section>
</body>

</html>
