<?php
    session_start();
    // $HOST = "127.0.0.1";
    // $PASSWORD = "";
    // $USER = "root";
    // $DB = "calendar";
    
    // $conn = mysqli_connect($HOST, $USER, $PASSWORD, $DB);

    $servername = "127.0.0.1";
    $username ="root";
    $password = "";
    $database = "calendar";
    $conn = mysqli_connect($servername, $username, $password, $database);


    if (isset($_SESSION['username'])) {
        header("location:../Main/main.php");
    }
    if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";

        $result = mysqli_query($conn, $sql);
        if ($row = mysqli_fetch_assoc($result)) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name'];
            header("location:../Main/main.php");
        }
        else { 
            header("Location: login.php?error=Incorrect Username or Password");
        }
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css?v=<?php echo time();?>">
</head>
<body>
    <section>
        <img src="../image/logo.png" id="logo">
        <!-- <img src="../image/right-top.png" id="star1"> -->
        <h6 id="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </h6>
        <a href="#scroll" id="btn">Start</a>
        <img src="../image/left-bottom.png" id="star">
        <img src="../image/right-top.png" id="mountain">
        <img src="../image/first.png" id="people">  
    </section>

    <!-- <div class="sec" id="scroll">
        <img src="image/aurora.png" id="aurora">
        <h2 id="txt">Are you a ?</h2>
        <img src="image/user.png" id="user">
        <img src="image/admin.png" id="admin">
        <p id="lefttxt">User</p>
        <p id="righttxt">Admin</p>
    </div> -->

    <div id="scroll">
        <img src="../image/logo.png" id="logo1">
        <form action="login.php" method="post">
     	    <h2>Login</h2>

            
     	    <!-- <label>Username</label> -->
     	    <input type="text" name="username" placeholder="Username"><br>

     	    <!-- <label>Password</label> -->
     	    <input type="password" name="password" placeholder="Password"><br>

             <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	    <?php } ?>

     	    <button type="submit" name="submit">Login</button>
        </form>
        <!-- <img src="../image/aurora.png" id="aurora">

        <span id="option">Are you a?</span>
        <a href="../user/home.html">
            <div class="card1">
                <div class="wrapper">
                    <img src="../image/user.png" id="coveruser" height="50px">
                </div>
                <img src="../image/user txt.png" id="title" height="50px">
                <img src="../image/user cha.png" id="user-cha" height="50px">
            </div>
        </a>

        <a href="../adminn/login.html">
            <div class="card2">
                <div class="wrapper">
                    <img src="../image/admin.png" id="coveradmin" height="50px">
                </div>
                <img src="../image/admin txt.png" id="title" height="50px">
                <img src="../image/admin-cha.png" id="user-cha" height="50px">
            </div>
        </a> -->
        <!-- <h2 id="txt">Are you a ?</h2>
        <img src="image/user.png" id="user">
        <img src="image/admin.png" id="admin">
        <p id="lefttxt">User</p>
        <p id="righttxt">Admin</p> -->
    </div>

    <script>
        let logo = document.getElementById('logo');

        window.addEventListener('scroll', function(){
            let value = window.scrollY;
            // star.style.marginLeft = value * 1.05 + 'px';
            logo.style.marginTop = value * 1.35 + 'px';
            text.style.marginTop = value * 1.35 + 'px';
            btn.style.marginTop = value * 1.45 + 'px';
            // mountain.style.marginTop = value * 1.35 + 'px';
            people.style.marginRight = value * 1.05 + 'px';
        })
    </script>

    <!-- // <script>
        let logo = document.getElementById('logo');


        window.addEventListener('scroll', function(){
            let value = window.scrollX;
            logo.style.top = value * 1.35 + 'px';
            star.style.top = value * 1.35 + 'px';
            text.style.marginTop = value * 1.05 + 'px';

            mountainn.style.top = value * 0.5 + 'px';
            btn.style.marginTop = value * 1 + 'px';
            header.style.marginTop = value * 0.5 + 'px';
        })
    </script> -->

</body>
</html>