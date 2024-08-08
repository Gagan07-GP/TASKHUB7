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
            font-family: 'PlayfairDisplay-Medium';
            src: url('Montserrat,Playfair_Display,Raleway/Playfair_Display/static/PlayfairDisplay-Medium.ttf') format('truetype');
            /* font-weight: normal; */
            font-style: normal;
        }

        .cn {
            flex-direction: column;
            height: 20vh;
            width: 47vw;
            margin: 13vh;
            margin-top: 13vh;
            margin-bottom: 13vh;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 6vh;
            margin-bottom: 20.3vh;
        }

        .we {
            font-family: 'PlayfairDisplay-Medium';
            font-style: italic;
            font-weight: 400;
            font-size: 3vh;
            border-radius: 5px;l
            /* background-color: #f8f9fa; */
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
    </style>
</head>

<body>
    <header>
        <nav class="nvbr">
            <div class="ttl ttlc">TASKHUB</div>
            <ul class="navlist">
                <a class="navsec" href="feat.php">
                    <li>FEATURES</li>
                </a>
                <a class="navsec" href="connectab.php" id="cons"><li>CONNECT WITH US</li></a>
                <!-- <li class="navsec"><a href="#">WHO WE ARE</a></li> -->
                <a class="navsec" href="feedback.php">USER VOICE</li></a>
                <a class="navsec" href="mainhome.php"><li>HOME</li></a>
            </ul>
            <?php 
                if(isset($current_username)){
                    echo '<div class="cooksignsec signsec" style="flex-direction:column; width:12vw;"><div class="usname">'.htmlspecialchars($current_username).'</div>';
                    echo '<div class="usemail">'.htmlspecialchars($emaill).'</div></div>';
                }
                else{
                    echo '<div class="signbtn"><a href="Registration.php"><div class="signsec">SIGN UP</div></a></div>';
                }
            ?>
        </nav>
    </header>
    <main class="just" style="width: 100%;">
        <div class="cn just">
            <div class="we">
                WE ARE CURRENTLY NOT ACCEPTING ANY JOB REQUESTS....
            </div>
            <div class="we">
                Do Checkout This page Everyday, We will Update News about Job Here.
            </div>
        </div>
    </main>
    <?php
        if(isset($current_username)){
                    echo '<div class="lr just"><div class="lg cs"><a class="lgrgb just" href="logout.php">LOGOUT</a></div></div>';
        }
        else{
            echo '<div class="lr just"><div class="lg cs"><a class="lgrgb just" href="login.php">LOGIN</a></div><div class="rg cs"><a class="lgrgb just" href="Registration.php">GET STARTED</a></div></div>';
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