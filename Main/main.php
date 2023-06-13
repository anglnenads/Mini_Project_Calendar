<?php 
    session_start();
    require_once "../dbconnect.php";

    if (!isset($_SESSION['username']) && !isset($_SESSION['name'])) {
        header("location:../Login/login.php");
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Project</title>
    <link rel="stylesheet" href="main.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="../font/fontawesome-free-6.4.0-web/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

</head>
<body>
    <header>
        <div class="logo">
            <!-- <div id="textlft">
                <span>Kelompok 5</span> -->
            </div>
            <div id="title">
                <p><span id="capital1">C</span><span id="lowerr">alendar</span></p>
                <p id="textleft">Create your plan with our website</p>
            </div>
            <div id="nav">
                <ol>
                    <li>Home</li>
                    <li>Back</li>
                </ol>
            </div>
            <div id="profile">
                <i class="fa-regular fa-circle-user"></i>
                <p><?php echo $_SESSION['name'];?></p>
            </div>
            <div id="logout">
            <i class="fa-solid fa-right-from-bracket"></i>
                <a href="../Main/logout.php"><p>Logout</p></a>
            </div>

        </div>
        <div class="bulan">
                <div id="one">
                <i class="fa-solid fa-caret-left fa-2xl" id="left"></i>
                    <!-- <button id="left"> -->
                        <div class="tanggal">
                        <span id="month">JUNE</span>
                        <span id="year">2023</span>
                        </div> 
                        <i class="fa-solid fa-caret-right fa-2xl" id="right"></i>

                        </div>
                <div id="two">
                <a href="../form/form.php">
                        <i class="fa-solid fa-plus" id="plus"></i>
                        <p>Add Events</p>
                    </a>
                    <!-- <span id="year">2023</span> -->
                </div>

    

        </div>
    </header>

    <main>
        <!-- nama hari -->
        <table class="day">
            <th>Sun</th>
            <th>Mon</th>
            <th>Tue</th>
            <th>Wed</th>
            <th>Thu</th>
            <th>Fri</th>
            <th>Sat</th>
        </table>

        <div class="center">
            <table class="tabel">
                <br>
                <tbody id="daydate">

                </tbody>
            </table>
        </div>

        <div class="priority">
            <table>
                <tr>
                    <th>Low Priority</th>
                    <th class="circle"></th>
                    <th class="circle1"></th>
                    <th class="circle2"></th>
                    <th>High Priority</th>
                </tr>
            </table>
        </div>
        <!-- <div class="foot">
            <p>Priority Range : </p>
            <p>Not to Important</p>
            <p>Important</p>
            <p>Very Important</p>
        </div> -->
    </main>
    <footer>
            <div class="fleft">
                <h4>About Us</h4>
                <p>71210678 - Setya Kristendy C.</p>
                <p>71210725 - Angelene Nadine</p>
                <p>71210784 - Icha Patricia N.</p>
            </div>

            <div class="fmid">
                <div class="sub">
                    <p><span id="capital">C</span><span id="lower">alendar</span></p>
                </div>
                <p id="txt">Create your plan with our website</p>
                <!-- <h4>Calendar</h4> -->
                <p id="under">&copycopyright 2023</p> 
            </div>

            <div class="fright">
                <h4>Contact Us</h4>
                <p><img src="../image/ig.png"><a href="https://instagram.com/_setya.kc?igshid=YmMyMTA2M2Y=">@_setya.kc</a></p>
                <p><img src="../image/ig.png"><a href="https://instagram.com/anglne_nadine?igshid=YmMyMTA2M2Y=">@anglne_nadine</a></p>
                <p><img src="../image/ig.png"><a href="https://instagram.com/ichapatricia63?igshid=YmMyMTA2M2Y=">@ichapatricia63</a></p>
            </div>
    </footer>
</body>
</head>
</html>

<script src ="Read.js?v=<?php echo time() ?>"></script>
<!-- kode untuk refresh ulang -->