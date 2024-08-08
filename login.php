<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "TASKHUB");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $sql = "SELECT * FROM `users` WHERE email='$username'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['email'] = $user['email'];
            $redirect_url = isset($_SESSION['redirect_url']) ? $_SESSION['redirect_url'] : 'cook.php';
            unset($_SESSION['redirect_url']);
            header("Location: $redirect_url");
            exit();
        } else {
            $message = "Password incorrect. Please try again.";
        }
    } else {
        $message = "Email not registered. Please register first.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: "Poppins", sans-serif; }
        body { min-height: 100vh; display: flex; align-items: center; justify-content: center; padding: 20px; background: #f7f7f7; }
        .wrapper { max-width: 400px; width: 100%; padding: 25px; border-radius: 8px; background: #fff; box-shadow: 0 0 15px rgba(0, 0, 0, 0.1); }
        .wrapper h1 { font-size: 1.5rem; color: #333; font-weight: 500; text-align: center; }
        .input-box { width: 100%; margin-top: 20px; }
        .input-box input { height: 50px; width: 100%; outline: none; font-size: 1rem; color: #707070; margin-top: 8px; border: 1px solid #ddd; border-radius: 6px; padding: 0 15px; }
        .input-box input:focus { box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1); }
        .lgl { display: flex; height: 77px; justify-content: center; align-items: center; text-align: center; flex-direction: column; }
        .bgl { height: 49px; width: 100%; color: #fff; font-size: 1.5rem; font-weight: 400; border: none; margin-top: 15px; cursor: pointer; display: flex; justify-content: center; align-items: center; transition: all 0.2s ease; background: #333; border-radius: 9px; }
        .bgl:hover { background: #444; }
        .f-pass { color: #707070; font-size: 1rem; font-weight: 400; text-align: center; margin-top: 15px; display: block; }
        .alert { margin-top: 15px; }
        .register { color: #333; font-size: 1rem; font-weight: 400; text-align: center; margin-top: 20px; }
        .register a { color: #007bff; text-decoration: none; }
        .register a:hover { text-decoration: underline; }
        #akp{color:#333; font-weight:700;}
    </style>
</head>
<body>
    <div class="wrapper">
        <h1>Login</h1>
        <form action="" method="post">
            <div class="input-box">
                <input type="text" placeholder="Enter email" name="email" required>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Enter Password" name="password" required>
            </div>
            <div class="lgl">
                <button type="submit" class="bgl">Login</button>
            </div>
            <a href="FORGOT-PASS.php" class="f-pass">Forgot password?</a>
            <?php if ($message) { ?>
                <div class="alert alert-danger"><?php echo $message; ?></div>
            <?php } ?>
        </form>
        <div class="register">
            New here? <a id="akp" href="registration.php">Create an account</a>
        </div>
    </div>
</body>
</html>
