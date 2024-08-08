<?php
session_start(); // Start the session

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'TASKHUB';

// Create connection
$con = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

$current_username = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : 'Guest';
$emaill = isset($_SESSION['email']) ? $_SESSION['email'] : 'Guest';

// Get the current user's ID
$current_user_id = null;
if ($current_username != 'Guest') {
    $stmt = $con->prepare("SELECT user_id FROM users WHERE name = ?");
    $stmt->bind_param("s", $current_username);
    $stmt->execute();
    $stmt->bind_result($current_user_id);
    $stmt->fetch();
    $stmt->close();
}

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
    <link rel="stylesheet" href="cook.css">
    <link rel="stylesheet" href="feat.css">
    <link rel="stylesheet" href="cookstyle.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        #search-box {
            padding: 0px 15px;
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

        .usname {
            font-family: 'Montserrat-SemiBold';
            font-size: 22px;
        }

        .usemail {
            font-family: 'Raleway-Medium';
            font-size: 12px;
            /* font-style:italic; */
        }

        .cooksignsec {
            width: 13vw;
            height: 10vh;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            color: #ddd;
            margin: auto 0px auto auto;
            border: 1px solid #dcdcdc;
            border-radius: 6px;
            position: relative;
            left: -1vw;
            background: #333;
        }

        .signbtnn {
            width: 10vw;
            margin-left: 4vw;
        }

        #ccons {
            width: 13vw;
        }
    </style>
</head>

<body>
    <header>
        <nav class="nvbr">
            <div class="ttl">TASKHUB</div>
            <ul class="navlist">
                <a class="navsec" href="feat.php">
                    <li>FEATURES</li>
                </a>
                <a class="navsec" href="connectab.php" id="ccons">
                    <li>CONNECT WITH US</li>
                </a>
                <a class="navsec" href="feedback.php">
                    <li>USER VOICE</li>
                </a>
                <a class="navsec" href="Q&A.php">
                    <li>HELP DESK</li>
                </a>

                <div class="signbtnn">
                    <div class="cooksignsec">
                        <?php 
                            if(isset($current_username)){
                                echo '<div class="usname">'.htmlspecialchars($current_username).'</div>';
                                echo '<div class="usemail">'.htmlspecialchars($emaill).'</div>';
                            }
                            else{
                                echo '<a href="Registration.php"><div class="signsec">SIGN UP</div></a>';
                            }
                            ?>
                    </div>
                </div>
            </ul>
        </nav>
    </header>
    <main class="maintask">
        <div class="taskprio">
            <div class="priohdtext">PRIORITY</div>
            <div class="boxprio" id="h">
                <div class="count" id="hpr">
                    <?php
                    $sql = "SELECT COUNT(*) AS hgh FROM addtask7 WHERE priority='High' AND user_id=?";
                    $stmt = $con->prepare($sql);
                    $stmt->bind_param("i", $current_user_id);
                    $stmt->execute();
                    $stmt->bind_result($high_count);
                    $stmt->fetch();
                    echo $high_count;
                    $stmt->close();
                    ?>
                </div>
            </div>
            <div class="boxprio" id="m">
                <div class="count" id="mpr" style="font-size: 20px;">
                    <?php
                    $sql = "SELECT COUNT(*) AS mdm FROM addtask7 WHERE priority='Medium' AND user_id=?";
                    $stmt = $con->prepare($sql);
                    $stmt->bind_param("i", $current_user_id);
                    $stmt->execute();
                    $stmt->bind_result($medium_count);
                    $stmt->fetch();
                    echo $medium_count;
                    $stmt->close();
                    ?>
                </div>
            </div>
            <div class="boxprio" id="l">
                <div class="count" id="lpr" style="font-size: 20px;">
                    <?php
                    $sql = "SELECT COUNT(*) AS lwl FROM addtask7 WHERE priority='Low' AND user_id=?";
                    $stmt = $con->prepare($sql);
                    $stmt->bind_param("i", $current_user_id);
                    $stmt->execute();
                    $stmt->bind_result($low_count);
                    $stmt->fetch();
                    echo $low_count;
                    $stmt->close();
                    ?>
                </div>
            </div>
        </div>
        <div class="maincont">
            <div class="containhd just">
                <div id="taskhd" class="just">Welcome to TASKHUB,
                    <?php echo htmlspecialchars($current_username); ?>
                </div>
                <div id="tasksubhd" class="just">Get started by adding new tasks or searching for existing ones. Keep
                    your tasks up-to-date and stay on top of your work.</div>
            </div>
            <div class="taskcontainer addcontain">
                <a href="addt.php">
                    <div class="tasksection" id="addt">
                        <div class="img">
                            <img id="addimg" src="addtask.webp" alt="ADD TASK" width="45px">
                        </div>
                        <div class="addtask">ADD NEW TASK</div>
                    </div>
                </a>
                <div class="tasksection just" id="ssec">
                    <div>
                        <input type="text" id="search-box" placeholder="Enter your Task Name to Search">
                    </div>
                    <div class="btn">
                        <button type="submit" id="bntn"><img id="imgs" src="search.png" alt="SEARCH"
                                class="btn-img"></button>
                    </div>
                </div>
                <table class="tbtask">
                    <thead>
                        <tr class="trmg">
                            <th style="width: 40vw;">TASK NAME</th>
                            <th style="width: 5vw;">PRIORITY</th>
                            <th style="width: 5vw;">PHASE</th>
                            <th style="width: 5vw;">DEADLINE</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($current_user_id) {
                            $sql = "SELECT * FROM addtask7 WHERE user_id=?";
                            $stmt = $con->prepare($sql);
                            $stmt->bind_param("i", $current_user_id);
                            $stmt->execute();
                            $result = $stmt->get_result();
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $backgroundColor = '';
                                    $borderRadius = '';
                                    if ($row['focus'] == 'Red') {
                                        $backgroundColor = 'linear-gradient(135deg, #FEC5C0, #F76C6C)';
                                        $borderRadius = 'border-radius: 10px;';
                                    } elseif ($row['focus'] == 'Green') {
                                        $backgroundColor = 'linear-gradient(135deg, #A8D5BA, #D0F0C0)';
                                        $borderRadius = 'border-radius: 10px;';
                                    } elseif ($row['focus'] == 'Blue') {
                                        $backgroundColor = 'linear-gradient(135deg, #D0E4F7, #8AB6D6)';
                                        $borderRadius = 'border-radius: 10px;';
                                    }
                                    $progress = ($row['phase'] == 'On Deck') ? 10 : (($row['phase'] == 'In Flow') ? 50 : 100);
                                    
                                    echo "<tr class='card' style='background: {$backgroundColor}; {$borderRadius} padding: 5px 10px; height: 40px; font-family: Arial, sans-serif; font-size: 16px; font-weight: bold; color: #333; text-align:center;'>";
                                    echo "<td>{$row['taskname']}</td>";
                                    echo "<td>{$row['priority']}</td>";
                                    echo "<td>{$row['phase']}</td>";
                                    echo "<td>{$row['deadline']}</td>";
                                    echo "</tr>";
                                    echo "<tr>";
                                    echo "<td colspan='4'>";
                                    echo "<div class='progress-bar'>";
                                    echo "<div class='progress' style='width: $progress%; background-color: #5e5e5e; height: 10px;'>";
                                    echo "</div>";
                                    echo "</div>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='4' style='text-align:center; color: #333; font-style: normal; font-family: 'Montserrat-SemiBold'; font-weight: 100;'>START ADDING TASKS...</td></tr>";
                            }
                            $stmt->close();
                        } else {
                            echo "<tr><td colspan='4' style='text-align:center; color: #333; font-style: normal; font-family:`Montserrat-SemiBold`; font-weight: 100; font-size:20px;'>You need to <a href='login.php' style='color: #333; font-weight:700;'>log in</a> to view your tasks</td></tr>";
                        }
                        
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="taskstatus">
            <div class="stathdtext">STATUS</div>
            <div id="done" class="boxstat">
                <div class="count" id="yes" style="font-size: 20px;">
                    <?php
                    $sql = "SELECT COUNT(*) AS comp FROM addtask7 WHERE phase='Completed' AND user_id=?";
                    $stmt = $con->prepare($sql);
                    $stmt->bind_param("i", $current_user_id);
                    $stmt->execute();
                    $stmt->bind_result($completed_count);
                    $stmt->fetch();
                    echo $completed_count;
                    $stmt->close();
                    ?>
                </div>
            </div>
            <div id="ip" class="boxstat">
                <div class="count" id="prog" style="font-size: 20px;">
                    <?php
                    $sql = "SELECT COUNT(*) AS ip FROM addtask7 WHERE phase='In Flow' AND user_id=?";
                    $stmt = $con->prepare($sql);
                    $stmt->bind_param("i", $current_user_id);
                    $stmt->execute();
                    $stmt->bind_result($in_progress_count);
                    $stmt->fetch();
                    echo $in_progress_count;
                    $stmt->close();
                    ?>
                </div>
            </div>
            <div id="nc" class="boxstat">
                <div class="count" id="not" style="font-size: 20px;">
                    <?php
                    $sql = "SELECT COUNT(*) AS notcomp FROM addtask7 WHERE phase='On Deck' AND user_id=?";
                    $stmt = $con->prepare($sql);
                    $stmt->bind_param("i", $current_user_id);
                    $stmt->execute();
                    $stmt->bind_result($not_completed_count);
                    $stmt->fetch();
                    echo $not_completed_count;
                    $stmt->close();
                    ?>
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
    <!-- <script>
        function searchTasks() {
            const input = document.getElementById('search-box').value.toUpperCase();
            const rows = document.getElementsByClassName('card');
            for (let i = 0; i < rows.length; i++) {
                const row = rows[i];
                const cells = row.getElementsByTagName('td');
                let match = false;
                for (let j = 0; j < cells.length; j++) {
                    const text = cells[j].textContent.toUpperCase();
                    if (text.indexOf(input) > -1) {
                        match = true;
                        break;
                    }
                }
                row.style.disaddtask7 = match ? '' : 'none';
            }
        }
    </script> -->
    <script>
        // Function to handle search
        function searchTasks() {
            const input = document.getElementById('search-box').value.trim().toUpperCase();
            const cards = document.getElementsByClassName('card');
            const progressBars = document.getElementsByClassName('progress-bar');

            // Loop through each card
            for (let i = 0; i < cards.length; i++) {
                const card = cards[i];
                const taskName = card.textContent.toUpperCase();
                const progressBar = progressBars[i];

                // Check if the input matches the task name
                if (taskName.includes(input)) {
                    card.style.display = '';
                    progressBar.style.display = ''; // Show the progress bar
                } else {
                    // card.style.display = 'No tasks are Present';
                    card.style.display = 'none';
                    progressBar.style.display = 'none'; // Hide the progress bar
                }
            }
        }

        // Attach click event listener to the search button
        document.getElementById('bntn').addEventListener('click', searchTasks);
    </script>
    <!-- <script>
        // Function to handle search
        function searchTasks() {
            const input = document.getElementById('search-box').value.trim().toUpperCase();
            const cards = document.getElementsByClassName('card');

            // Loop through each card
            for (let i = 0; i < cards.length; i++) {
                const card = cards[i];
                const taskName = card.textContent.toUpperCase();

                // Check if the input matches the task name
                if (taskName.includes(input)) {
                    card.style.display = '';
                } else {
                    card.style.display = 'none';
                }
            }
        }

        // Attach click event listener to the search button
        document.getElementById('bntn').addEventListener('click', searchTasks);
    </script> -->

</body>

</html>