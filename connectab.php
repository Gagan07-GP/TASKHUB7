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
    <link rel="stylesheet" href="connect.css">
    <link rel="stylesheet" href="qanda.css">
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
    </style>
</head>

<body style="background-color: #f5f5f5">
    <!-- <img class="bg" src="homepage.jpg" alt="TASK MANAGAMENT TOOL"> -->
    <header>
        <nav class="nvbr">
            <div class="ttl ttlc">TASKHUB</div>
            <ul class="navlist">
                <a class="navsec" href="feat.php"><li>FEATURES</li></a>
                <a class="navsec" href="Q&A.php"><li>HELP DESK</li></a>
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
                    echo '<div class="signbtn">
                    <a href="Registration.php"><div class="signsec">SIGN UP</div></a></div>';
            }
            ?>
        </nav>
    </header>
    <main>
    <div class="cont">
        <div class="conheading">
            <h2>Connect with Us</h2>
        </div>
        <div class="cont2">
            <div class="about cmm">
                <h3 class="conhd">ABOUT US</h3>
                <h2 id="meet">Meet Our Team</h2>
                <div class="gprk">
                    <div class="conperson" id="gp">
                        <img src="ct4.png" class="conpimg" width="33px" alt="GP">
                        <div class="conpname just">Gagan patil
                            <div class="occu">Student At GP</div>
                        </div>
                        <div class="desc">
                            I am Studying in 5th sem Of Computer Science in Solapur, Collage name Government Polytechni. You can Contact me Through Links i provided.
                        </div>
                    </div>
                    <div class="conperson" id="rk">
                        <img src="rame.jpg" class="conpimg" width="33px" alt="RK">
                        <div class="conpname">Ramesh Kamble
                            <div class="occu">Student At GP</div>
                        </div>
                        <div class="desc">
                            I am Studying in 5th sem Of Computer Science in Solapur, Collage name Government Polytechni. You can Contact me Through Links i provided.
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact cmm">
                <h3 class="conhd">CONTACT US</h3>
                <div class="socials just gprks" id="gps">
                    <div class="socialimgdiv">
                        <a href="#"><img width="30px" src="icon/li.png" class="socialimg"></a>
                        <a href="#"><img width="30px" src="icon/Wh.png" class="socialimg"></a>
                        <a href="#"><img width="30px" src="icon/in.png" class="socialimg"></a>
                        <a href="#"><img width="30px" src="icon/fa.png" class="socialimg"></a>
                    </div>
                    <h3 class="eml">EMAIL : gaganpatil0007@gmail.com</h3>
                    <h3 class="eml">PHONE : 7620449969</h3>
                </div>
                <div class="socials just gprks" id="rks">
                    <div class="socialimgdiv">
                        <a href="#"><img width="30px" src="icon/li.png" class="socialimg"></a>
                        <a href="#"><img width="30px" src="icon/Wh.png" class="socialimg"></a>
                        <a href="#"><img width="30px" src="icon/in.png" class="socialimg"></a>
                        <a href="#"><img width="30px" src="icon/fa.png" class="socialimg"></a>
                    </div>
                    <h3 class="eml">EMAIL : ramesh1817@gmail.com</h3>
                    <h3 class="eml">PHONE : 7666955667</h3>
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