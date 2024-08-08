<?php
session_start();

$con = mysqli_connect("localhost", "root", "", "TASKHUB");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : NULL;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $taskname = $_POST['taskname'];
    $priority = $_POST['priority'];
    $phase = $_POST['phase'];
    $deadline = $_POST['deadline'];
    $focus = $_POST['focus'];
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'TASKHUB';
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql = "INSERT INTO `addtask7` (`user_id`,`taskname`, `priority`, `phase`, `deadline`, `focus`) VALUES ('$user_id','$taskname', '$priority', '$phase', '$deadline', '$focus')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo '<div class="alert alert-success alert-dismissible fade show smhi" role="alert">
                <strong>Success!</strong> Task has been added successfully!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
        echo '<script>
                setTimeout(function(){
                    window.location.href = "cook.php";
                }, 2000); // 2 seconds delay before redirect
              </script>';
    } else {
        echo '<div class="alert alert-danger alert-dismissible fade show smhi" role="alert">
                <strong>Error!</strong> There has been a technical issue. Our team is working on it, thanks for your patience!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="utility.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: #f7f7f7; /* Light gray background for consistency */
            font-family: Arial, sans-serif; /* Ensure consistent font style */
        }

        .container {
            max-width: 600px;
            width: 100%;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .container header {
            font-size: 1.75rem;
            color: #333;
            font-weight: 500;
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            color: #555;
            font-weight: bold;
            margin-bottom: 0.5rem;
        }

        .form-control, .form-select {
            height: 45px;
            border-radius: 6px;
            border: 1px solid #ccc;
            padding: 0 15px;
            box-shadow: none;
        }

        .form-control:focus, .form-select:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
        }

        .btn-primary {
            background: #333;
            border: none;
            height: 45px;
            border-radius: 6px;
            width: 100%;
            transition: background 0.3s ease;
        }

        .btn-primary:hover {
            background: #666;
        }

        .form-check-label {
            margin-left: 0.5rem;
            font-weight: normal;
        }

        .alert {
            max-width: 500px;
            margin: 0 auto;
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 9999;
        }
        .form-check-input:checked {
    background-color: #495057;
    border-color: #000;
}
    </style>
</head>

<body class="just">
<div class="container">
        <header>Task Creation</header>
        <form action="/PROJECT/addt.php" method="post">
            <div class="form-group">
                <label for="taskname" class="form-label">Task Name</label>
                <input type="text" class="form-control" name="taskname" id="taskname" placeholder="Enter task name">
            </div>
            <div class="form-group">
                <label for="priority" class="form-label">Priority</label>
                <select id="priority" name="priority" class="form-select">
                    <option selected>Medium</option>
                    <option value="High">High</option>
                    <option value="Low">Low</option>
                </select>
            </div>
            <div class="form-group">
                <label for="phase" class="form-label">Phase</label>
                <select id="phase" name="phase" class="form-select">
                    <option selected>On Deck</option>
                    <option value="In Flow">In Flow</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>
            <div class="form-group">
                <label for="deadline" class="form-label">Deadline</label>
                <input type="datetime-local" class="form-control" id="deadline" name="deadline">
            </div>
            <div class="form-group">
                <label class="form-label">Focus</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="focus" id="Red" value="Red">
                    <label class="form-check-label" for="Red">Red</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="focus" id="Green" value="Green" checked>
                    <label class="form-check-label" for="Green">Green</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="focus" id="Blue" value="Blue">
                    <label class="form-check-label" for="Blue">Blue</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Save Task</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js">
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
    var sbutton = document.getElementById("sbtnadd");
    sbutton.addEventListener("click", function () {
        // Remove or comment out the native alert if it's no longer needed
        // alert("Task has been Saved Successfully!");
    });
});
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>