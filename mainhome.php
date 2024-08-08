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
    <link rel="stylesheet" href="mainhm.css">
    <link rel="stylesheet" href="utility.css">
    <link rel="stylesheet" href="foot.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="feat.css">
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
            font-weight: 400;
            font-size: 20px;
        }

        .usemail {
            font-family: 'Raleway-Medium';
            font-size: 10px;
            font-weight: 100;
            /* font-style:italic; */
        }
    </style>
</head>

<body>
    <img class="bg" src="homepage.jpg" alt="TASK MANAGAMENT TOOL">
    <header>
        <nav class="nvbr">
            <div class="ttl">TASKHUB</div>
            <ul class="navlist">
                <a class="navsec" href="feat.php">
                    <li>FEATURES</li>
                </a>
                <a class="navsec" href="connectab.php" id="cons">
                    <li>CONNECT WITH US</li>
                </a>
                <!-- <li class="navsec"><a href="#">WHO WE ARE</a></li> -->
                <a class="navsec" href="feedback.php">USER VOICE</li></a>
                <a class="navsec" href="Q&A.php">
                    <li>HELP DESK</li>
                </a>
            </ul>
            <!-- <div class="signbtn"> -->
            <!-- <div class="cooksignsec signsec" style="flex-direction:column; width:12vw;"> -->
            <?php 
                            if(isset($current_username)){
                                echo '<div class="cooksignsec signsec" style="flex-direction:column; width:12vw;"><div class="usname">'.htmlspecialchars($current_username).'</div>';
                                echo '<div class="usemail">'.htmlspecialchars($emaill).'</div></div>';
                            }
                            else{
                                echo '<div class="signbtn">
                                <a href="Registration.php"><div class="signsec">SIGN UP</div></a></div>';
                            }
                            ?>
            <!-- </div> -->
            <!-- <div class="signsec"><a href="#">SIGN UP</a></div> -->
            <!-- </div> -->
        </nav>
    </header>
    <main>
        <div class="mainhm">
            <h1 id="headhero">Streamline Your Workflow with Taskhub!</h1>
            <h3 id="subhero" class="my2">Stay Organized and Boost Productivity Easily</h3>
            <div id="herotext">
                Discover the power of Taskhub, designed to simplify task management for individuals and small
                teams. Organize your work effortlessly, track progress with ease, and stay focused on what matters most.
                Join thousands who rely on Taskhub to boost productivity and achieve more.
            </div>
        </div>
        <div class="startbtn">
        <?php
            if(isset($current_username)){
            echo '<a class="smt strtl" href="login.php" style="visibility:hidden;">
                <li>LOGIN</li>
            </a>';
            }
            else{
            echo '<a class="smt strtl" href="login.php">
                <li>LOGIN</li>
            </a>';
            }
            // <a class="smt strtl" href="login.php">
            //     <li>LOGIN</li>
            // </a>
            if(isset($current_username)){
            echo '<a class="smt strtm" href="cook.php">
                <li>START MANAGING TASKS!</li>
            </a>';
            }
            else{
            echo '<a class="smt strtm" href="feat.php">
                <li>START MANAGING TASKS!</li>
            </a>';
            }
            ?>
            <!-- <a class="smt strtm" href="feat.php">
                <li>START MANAGING TASKS!</li>
            </a> -->

        </div>
        </div>
        <div class="rehead">
            <h4 class="reviewtitle">Here Are the Reviews of Old users :</h4>
        </div>
        <div class="testc">
            <div class="testm">
                <div class="testmtext">
                    "This task management tool is a game-changer! It's streamlined my workflow and
                    boosted my
                    productivity like never before. The intuitive design makes it a joy to use."
                </div>
                <div class="person" id="manj">
                    <img src="manj.jpg" class="pimg" width="33px" alt="MJ">
                    <div class="pname just">Manjunath Gavandi
                        <div class="occu">Student At GP</div>
                    </div>
                </div>
            </div>
            <div class="testm">
                <div class="testmtext">
                    "Since I started using this tool, staying organized has become effortless. The
                    intuitive
                    interface makes managing my tasks simple and efficient. A must-have for anyone looking to boost
                    their
                    productivity!"
                </div>
                <div class="person" id="sam">
                    <img src="sam.jpg" class="pimg" width="33px" alt="SA">
                    <div class="pname just">Samarth Alandkar
                        <div class="occu">Student At GP</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="testc">
            <div class="testm">
                <div class="testmtext">
                    "An essential tool for anyone juggling multiple tasks. The user-friendly
                    interface and
                    powerful features make it easy to manage everything in one place. It's been a real lifesaver for my
                    busy
                    schedule."
                </div>
                <div class="person" id="sag">
                    <img src="sag.jpg" class="pimg" width="33px" alt="ST">
                    <div class="pname just">Sagar Todkar
                        <div class="occu">Student At GP</div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
        if(isset($current_username)){
                    echo '<div class="lr just"><div class="lg cs"><a class="lgrgb just" href="logout.php">LOGOUT</a></div></div>';
        }
        else{
            echo '';
        }
        ?>
    <footer>
        <div class="foot">
            <ul class="footul firfoot">
                <li class="footsec"><a class="footlink" href="connectab.php">ABOUT US</a></li>
                <li class="footsec"><a class="footlink" href="jb.php">APPLY FOR JOB</a></li>
            </ul>
            <div class="socials just">
                <h5 class="sochead">SOCIAL MEDIA</h5>
                <div class="socialimgdiv">
                    <a
                        href="https://www.linkedin.com/in/gagan-patil-5b274a255?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><img
                            width="30px" src="icon/li.png" class="socialimg"></a>
                    <a href="https://wa.me/7620449969"><img width="30px" src="icon/Wh.png" class="socialimg"></a>
                    <a href="https://github.com/Gagan07-GP"><img width="30px" src="unnamed.png" class="socialimg"></a>
                    <a href="https://www.facebook.com/profile.php?id=100086158813428&mibextid=ZbWKwL"><img width="30px"
                            src="icon/fa.png" class="socialimg"></a>
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