<?php
    session_start();

    $servername = "127.0.0.1";
    $username ="root";
    $password = "";
    $database = "calendar";
    $conn = mysqli_connect($servername, $username, $password, $database);
    setcookie('username', 0);
    setcookie('password', 0);

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
            setcookie('username', $username, time() + (86400 * 30));
            setcookie('password', $password, time() + (86400 * 30));
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
    <title>Mini Project</title>
    <link rel="stylesheet" href="login.css?v=<?php echo time();?>">
</head>
<body>
    <section>
        <img src="../image/logo.png" id="logo">
        <h6 id="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </h6>
        <a href="#scroll" id="btn">Start</a>
        <img src="../image/left-bottom.png" id="star">
        <img src="../image/right-top.png" id="mountain">
        <img src="../image/first.png" id="people">  
    </section>

    <!-- Second section for login -->
    <div id="scroll">
        <img src="../image/logo.png" id="logo1">
        <form action="login.php" method="post">
     	    <h2>Login</h2>

            <input type="text" name="username" placeholder="Username" value="<?php if($_COOKIE['username'] != 0) { echo $_COOKIE['username']; }  ?>"><br>
     	    <input type="password" name="password" placeholder="Password" value="<?php if($_COOKIE['password'] != 0) { echo $_COOKIE['password'];} ?>"><br>

             <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	    <?php } ?>

     	    <button type="submit" name="submit">Login</button>
        </form>
        
    </div>

    <script>
        let logo = document.getElementById('logo');

        window.addEventListener('scroll', function(){
            let value = window.scrollY;
            logo.style.marginTop = value * 1.35 + 'px';
            text.style.marginTop = value * 1.35 + 'px';
            btn.style.marginTop = value * 1.45 + 'px';
            people.style.marginRight = value * 1.05 + 'px';
        })
    </script>

</body>
</html>