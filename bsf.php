<?php
session_start();
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'TASKHUB';
$con = new mysqli($servername, $username, $password, $dbname);
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
$current_username = isset($_SESSION['user_name']) ? $_SESSION['user_name']:null;
$emaill = isset($_SESSION['email']) ? $_SESSION['email']:null;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TASKHUB</title>
    <link rel="stylesheet" href="feat.css">
    <link rel="stylesheet" href="js.js">
    <link rel="stylesheet" href="utility.css">
    <link rel="stylesheet" href="foot.css">
    <link rel="stylesheet" href="fstyles.css">
    <!-- <link rel="stylesheet" href="singfeat.css"> -->
    <style>
        .hero {
            width: 100%;
            height: 25vh;
            background: url('path_to_your_image.jpg') no-repeat center center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-align: center;
            padding: 0;
            margin: 0;
            position: relative;
            bottom: 6vh;
        }

        .hero-content {
            background: rgba(0, 0, 0, 0.5);
            padding: 15px 20px;
            /* Reduced padding for a tighter look */
            border-radius: 10px;
            animation: fadeIn 1s ease-in-out;
            margin: 0;
            /* Remove any margin */
        }

        @font-face {
            font-family: 'Montserrat-SemiBold';
            src: url('Montserrat,Playfair_Display,Raleway/Montserrat/static/Montserrat-SemiBold.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        @font-face {
            font-family: 'Raleway-Medium';
            src: url('Montserrat,Playfair_Display,Raleway/Raleway/static/Raleway-Medium.ttf') format('truetype');
            /* font-weight: normal; */
            font-style: normal;
        }
        .cooksignsec {
            color: #ddd;
        }
        .usname {
            font-family: 'Montserrat-SemiBold';
            font-weight:400;
            font-size: 20px;
        }

        .usemail {
            font-family: 'Raleway-Medium';
            font-size: 10px;
            font-weight:100;
            /* font-style:italic; */
        }
        
        .hero h1 {
            font-size: 2.5em;
            margin: 0;
            animation: slideInFromLeft 1s ease-in-out;
        }

        .hero p {
            font-size: 1.2em;
            animation: slideInFromRight 1s ease-in-out;
        }

        /* Overview Section */
        .overview {
            padding: 50px 20px;
            background-color: #f8f9fa;
        }

        .overview .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .overview h2 {
            text-align: center;
            font-size: 2em;
            margin-bottom: 20px;
            animation: fadeIn 0.8s ease-in-out;
        }

        .overview p {
            text-align: center;
            font-size: 1.1em;
            color: #555;
            margin-bottom: 30px;
        }

        .benefits-list {
            list-style: none;
            padding: 0;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .benefits-list li {
            margin: 10px 20px;
            padding: 10px 0;
            position: relative;
            animation: fadeIn 0.8s ease-in-out;
        }

        .benefits-list .icon {
            font-size: 1.5em;
            color: #808080;
            margin-right: 10px;
            position: absolute;
            left: -30px;
            top: 50%;
            transform: translateY(-50%);
        }

        /* Detailed Explanation Section */
        .details {
            padding: 50px 20px;
            background-color: #ffffff;
        }

        .details .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .details h2 {
            text-align: center;
            font-size: 2em;
            margin-bottom: 20px;
            animation: fadeIn 0.8s ease-in-out;
        }

        .how-to-use-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .how-to-use-list li {
            margin: 15px 0;
            padding: 15px;
            width: 80%;
            background: #f1f1f1;
            border-radius: 10px;
            position: relative;
            animation: fadeIn 0.8s ease-in-out;
        }

        .how-to-use-list .step {
            position: absolute;
            left: -50px;
            top: 50%;
            transform: translateY(-50%);
            background: #666666;
            color: white;
            font-size: 1.5em;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        /* Use Cases Section */
        .use-cases {
            padding: 50px 20px;
            background-color: #f8f9fa;
        }

        .use-cases .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .use-cases h2 {
            text-align: center;
            font-size: 2em;
            margin-bottom: 20px;
            animation: fadeIn 0.8s ease-in-out;
        }

        .use-cases-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .case {
            background: white;
            padding: 20px;
            width: 300px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            animation: fadeIn 0.8s ease-in-out;
        }

        .case .icon {
            font-size: 2em;
            color: #666666;
        }

        .case h3 {
            font-size: 1.5em;
            margin: 10px 0;
        }

        /* Testimonials Section */
        .testimonials {
            padding: 50px 20px;
            background-color: #ffffff;
        }

        .testimonials .container {
            max-width: 800px;
            margin: 0 auto;
        }

        .testimonials h2 {
            text-align: center;
            font-size: 2em;
            margin-bottom: 20px;
            animation: fadeIn 0.8s ease-in-out;
        }

        blockquote {
            font-size: 1.2em;
            line-height: 1.6;
            text-align: center;
            position: relative;
            animation: fadeIn 0.8s ease-in-out;
        }

        blockquote:before {
            content: "“";
            font-size: 4em;
            position: absolute;
            left: 10px;
            top: 0;
            color: #666666;
        }

        blockquote:after {
            content: "”";
            font-size: 4em;
            position: absolute;
            right: 10px;
            bottom: 0;
            color: #666666;
        }

        cite {
            display: block;
            margin-top: 0px;
            font-size: 1em;
            color: #555;
        }

        /* Keyframes for Animations */
        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes slideInFromLeft {
            0% {
                transform: translateX(-100%);
                opacity: 0;
            }

            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes slideInFromRight {
            0% {
                transform: translateX(100%);
                opacity: 0;
            }

            100% {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <header>
        <nav class="fnvbr">
            <div class="fttl">TASKHUB</div>
            <ul class="fnavlist">
                <!-- <li class="navsec"><a href="#">FEATURES</a></li> -->
                <a class="fnavsec" href="connectab.php" id="fcons">
                    <li>CONNECT WITH US</li>
                </a>
                <a class="fnavsec" href="feat.php"><li>FEATURES</li></a>
                <a class="fnavsec" href="Q&A.php">
                    <li>HELP DESK</li>
                </a>
                <a class="fnavsec" href="mainhome.php">
                    <li>HOME</li>
                </a>
            </ul>
            <?php 
                if(isset($current_username)){
                    echo '<div class="cooksignsec fsignsec" style="flex-direction:column; width:12vw;"><div class="usname">'.htmlspecialchars($current_username).'</div>';
                    echo '<div class="usemail">'.htmlspecialchars($emaill).'</div></div>';
                }
                else{
                    echo '<div class="fsignbtn"><a href="Registration.php"><div class="fsignsec">SIGN UP</div></a></div>';
                }
            ?>
        </nav>
    </header>
    <main>
        <!-- Hero Section -->
        <section class="hero">
            <div class="hero-content">
                <h1 style="margin-bottom: 20px;">Basic Search Functionality</h1>
                <p>Our task management tool includes a powerful yet simple search feature that allows you to quickly find specific tasks among your list.</p>
            </div>
        </section>
        
        <!-- Overview Section -->
        <section class="overview">
            <div class="container">
                <h2>Overview</h2>
                <p>Whether you're looking for a task by name, priority, or due date, our search functionality makes it easy.</p>
                <ul class="benefits-list">
                    <li><span class="icon">🔍</span><strong>Instant Results:</strong> Find tasks instantly by typing keywords.</li>
                    <li><span class="icon">🔍</span><strong>Versatile Search:</strong> Search by task name, description, priority, or due date.</li>
                    <li><span class="icon">🔍</span><strong>Time-Saving:</strong> Quickly locate tasks without scrolling through long lists.</li>
                </ul>
            </div>
        </section>
        
        <section class="details">
            <div class="container">
                <h2>How to Use</h2>
                <ol class="how-to-use-list">
                    <li><span class="step">1</span> Access the Search Bar: At the top of the main task management page,
                        you'll find the search bar.</li>
                    <li><span class="step">2</span> Enter Keywords:
                        <ul>
                            <li><strong>Task Name:</strong> Start typing the task name to filter the list.</li>
                            <li><strong>Description:</strong> Use specific words from the task description.</li>
                            <li><strong>Priority or Status:</strong> Search using terms like "High," "Medium," "Low,"
                                "Completed," etc.</li>
                            <li><strong>Due Date:</strong> Enter the due date in the format "YYYY-MM-DD" to find tasks
                                due on that day.</li>
                        </ul>
                    </li>
                    <li><span class="step">3</span> View Results: As you type, matching tasks will appear in the list
                        below.</li>
                </ol>
            </div>
        </section>

        <!-- Use Cases Section -->
        <section class="use-cases">
            <div class="container">
                <h2>Use Cases</h2>
                <div class="use-cases-list">
                    <div class="case">
                        <span class="icon">🔍</span>
                        <h3>Quick Task Retrieval</h3>
                        <p>Instantly find and manage tasks without scrolling.</p>
                    </div>
                    <div class="case">
                        <span class="icon">📁</span>
                        <h3>Project Management</h3>
                        <p>Easily locate tasks related to a specific project or deadline.</p>
                    </div>
                    <div class="case">
                        <span class="icon">⏰</span>
                        <h3>Efficient Planning</h3>
                        <p>Search for tasks by priority to focus on what's most important.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonials Section -->
        <section class="testimonials">
            <div class="container">
                <h2>User Voice</h2>
                <blockquote>
                    "The search functionality saves me so much time, especially when I have a long list of tasks. It's precise and easy to use."
                </blockquote>
                <div class="person just" id="manj">
                    <img src="ct4.png" class="pimg" width="33px" alt="MJ" style="align-self: center; margin-top: 15px;border-radius:15px;">
                    <div class="pname just" style="flex-direction: column; margin-left: 1.5vw; margin-top: 15px;">
                        <cite>Pratik Rathod</cite>
                        <div class="occu"><cite>Student At GP</cite></div>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <?php
        if(isset($current_username)){
                    echo '<div class="lr just"><div class="lg cs"><a class="lgrgb just" href="logout.php">LOGOUT</a></div></div>';
        }
        else{
            echo '<div class="lr just"><div class="lg cs"><a class="lgrgb just" href="login.php">LOGIN</a></div><div class="rg cs"><a class="lgrgb just" href="Registration.php">GET STARTED</a></div></div>';
        }
        ?>
        </main>
    <footer>
        <div class="foot">
            <ul class="footul firfoot">
                <li class="footsec"><a class="footlink" href="connectab.php">ABOUT US</a></li>
                <li class="footsec"><a class="footlink" href="jb.php">APPLY FOR JOB</a></li>
            </ul>
            <div class="socials just">
                <h5 class="sochead">SOCIAL MEDIA</h5>
                <div class="socialimgdiv">
                    <a href="https://www.linkedin.com/in/gagan-patil-5b274a255?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><img width="30px" src="icon/li.png" class="socialimg"></a>
                    <a href="https://wa.me/7620449969"><img width="30px" src="icon/Wh.png" class="socialimg"></a>
                    <a href="https://github.com/Gagan07-GP"><img width="30px" src="unnamed.png" class="socialimg"></a>
                    <a href="https://www.facebook.com/profile.php?id=100086158813428&mibextid=ZbWKwL"><img width="30px" src="icon/fa.png" class="socialimg"></a>
                </div>
            </div>
            <ul class="footul secfoot">
                <li class="footsec"><a class="footlink" href="pp.php">PRIVACY POLICY</a></li>
                <li class="footsec"><a class="footlink" href="connectab.php">CONTACT US</a></li>
                <!-- <li class="footsec"><a class="footlink" href="#">MORE WEBSITES OF TASK MANAGAMENT TOOL</a></li> -->
            </ul>
        </div>
    </footer>
</body>

</html>