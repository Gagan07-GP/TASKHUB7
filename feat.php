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
    <style>
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
        .hero {
            width: 100%;
            height: 20vh;
            background: url('path_to_your_image.jpg') no-repeat center center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            /* border: 2px solid gray; */
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


        .hero h1 {
            font-size: 2.5em;
            margin: 0;
            animation: slideInFromLeft 1s ease-in-out;
        }

        .hero p {
            font-size: 1.2em;
            animation: slideInFromRight 1s ease-in-out;
        }
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
                <a class="fnavsec" href="feedback.php">USER VOICE</li></a>
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
        <!-- <div class="fheading">
            <div class="hd">
                <div>
                    <h2 id="hdh">EMPOWER YOUR PRODUCTIVITY<br></h2>
                </div>
                <div class="my1">Discower the essential tools to manage your tasks efficiently</div>
            </div>
        </div> -->
        <section class="hero">
            <div class="hero-content">
                <h1 style="margin-bottom: 20px;">EMPOWER YOUR PRODUCTIVITY</h1>
                <p>Discower the essential tools to manage your tasks efficiently</p>
            </div>
        </section>
        <div class="phm">
            <div class="row1 row">
                <a href="tc.php">

                    <div class="strs mp" id="festrs">
                        <!-- <i class="icon-add-task"></i> -->
                        <div class="ichead just">
                            <div class="icn"><img class="icnimg" src="icon/taskcreation.png" alt="EASY TASK CREATION">
                            </div>
                            <h3 class="feath">Easy Task Creation</h3>
                        </div>
                        <p class="my1 fdesc">Quickly create tasks with our user-friendly interface. Add descriptions,
                            set
                            due
                            dates, and
                            assign tasks to team members effortlessly.</p>
                    </div>
                </a>
                <img class="img mg1" src="easy.png" alt="EASY TASK CREATION IMAGE">
            </div>
            <div class="row2 row">
                <a href="pt.php">
                    <div class="stre mp" id="festre">
                        <div class="ichead just">
                            <div class="icn"><img class="icnimg" src="icon/progtrack.png" alt="EASY TASK CREATION">
                            </div>
                            <h3 class="feath">Progress Tracking</h3>
                        </div>
                        <p class="my1 fdesc">Keep track of your progress with our visual indicators. See what’s done,
                            what’s
                            in
                            progress, and
                            what's pending at a glance.</p>
                    </div>
                </a>
                <img class="img mg2" src="progress.png" alt="Progress Tracking IMAGE">
            </div>
            <div class="row1 row">
                <a href="tp.php">
                    <div class="strs mp" id="festrs">
                        <div class="ichead just">
                            <div class="icn"><img class="icnimg" src="icon/prioritize.png" alt="EASY TASK CREATION">
                            </div>
                            <h3 class="feath">Task Prioritization</h3>
                        </div>
                        <p class="my1 fdesc">Easily prioritize your tasks by setting their importance levels. Focus
                            on what
                            matters most and
                            get things done efficiently.</p>
                    </div>
                </a>
                <img class="img mg1" src="prio.png" alt="Task Prioritization IMAGE">
            </div>
            <div class="row2 row">
                <a href="ddr.php">

                    <div class="stre mp" id="festre">
                        <div class="ichead just">
                            <div class="icn"><img class="icnimg" src="icon/remind.png" alt="EASY TASK CREATION">
                            </div>
                            <h3 class="feath">Due Date Reminders</h3>
                        </div>
                        <p class="my1 fdesc">Never miss a deadline with our due date reminders. Get notified
                            when a task is
                            approaching its
                            due date.</p>
                    </div>
                </a>
                <img class="img mg2" src="due.png" alt="Due Date Reminders IMAGE">
            </div>
            <div class="row1 row">
                <a href="stc.php">
                    <div class="strs mp" id="festrs">
                        <div class="ichead just">
                            <div class="icn"><img class="icnimg" src="icon/taskcat.png" alt="EASY TASK CREATION">
                            </div>
                            <h3 class="feath">Simple Task Categories</h3>
                        </div>
                        <p class="my1 fdesc">Organize your tasks into categories. Easily sort and view tasks
                            by their
                            assigned
                            categories.
                        <p>
                    </div>
                </a>
                <img class="img mg1" src="simple.png" alt="Simple Task Categories IMAGE">
            </div>
            <div class="row2 row">
                <a href="bsf.php">
                    <div class="stre mp" id="festre"">
                        <div class=" ichead just">
                        <div class="icn"><img class="icnimg" src="icon/search.png" alt="EASY TASK CREATION">
                        </div>
                        <h3 class=" feath">Basic Search Functionality</h3>
                    </div>
                    <p class="my1 fdesc">Quickly find tasks using our basic search functionality. Search
                        by task name,
                        description, or due
                        date.</p>
            </div>
            </a>
            <img class="img mg2" src="basic.png" alt="Basic Search Functionality IMAGE">
        </div>
        </div>
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