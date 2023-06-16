<?php 
include "../dbconnect.php";

    session_start();
    if (!isset($_SESSION['username']) && !isset($_SESSION['name'])) {
        header("location:../Login/login.php");
    }


$sql = "Select * from events WHERE id = ". $_GET['id'];
$result = $conn->query($sql);

if ($result-> num_rows > 0){
    while ($row = $result -> fetch_assoc()){
        $id = $row['id'];
        $nama = $row['event_name'];
        $location = $row['location'];
        $start_date = $row['start_date'];
        $start_time = $row['start_time'];
        $end_date = $row['end_date'];
        $end_time = $row['end_time'];
        $priority = $row['priority']; 
        $duration = $row['duration'];
        $note = $row["notes"];
        $quotes = $row["quotes"];
        $uploadfile = $row["upload"];
        
        $format_date_start = date("d F Y", strtotime($start_date));
        $format_time_start = date("h:i A", strtotime($start_time));

        $format_date_end = date("d F Y", strtotime($end_date));
        $format_time_end = date("h:i A", strtotime($end_time));

    }
}

?>
<script>
    var id = <?php echo $_GET['id']?>
</script>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Project</title>
    <link rel="stylesheet" href="detail.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="../font/fontawesome-free-6.4.0-web/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet"> 
    
</head>
<body>
    <header>
        <div class="logo">
            </div>
            <div id="title">
                <p><span id="capital1">C</span><span id="lowerr">alendar</span></p>
                <p id="textleft">Create your plan with our website</p>
            </div>
            <div id="nav">
                <ol>
                    <a href="../Main/main.php">
                        <li>Home</li>
                    </a>
                    <a href="../Main/main.php">
                        <li>Back</li>
                    </a>
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
                <div id="one"><span></span></div>
                <div id="two">
    
                        <div class="edit">
                            <i class="fa-solid fa-pen"></i><br>
                            <p>Edit</p>
                        </div>

                    
                        <div class="delete">
                            <i class="fa-solid fa-trash"></i>
                            <p>Delete</p>
                        </div>
                    
                </div>
        </div>
    </header>
    <main>
        <div class="container">
            <left id="left">
                <div class="Title">Upcoming Event</div>
            <div class="konten1">
                <div class="weeksub"><span class="week">This week</span></div>
                <table id="thisweek">
                    <!-- <tr>
                        <td class="circle18"></td>
                        <td>Hangout with crush</td>
                    </tr> -->
                </table>
                <!-- <ul id="daftar-acara"></ul> -->
            </div>
            <!-- <div class="konten2">
                <span class="week">Next Week</span>
                <table>
                    <tr>
                        <td class="circle13"></td>
                        <td>Holy Communion</td>
                    </tr>
                    <tr>
                        <td class="circle13"></td>
                        <td>Meet up for Mini Project</td>
                    </tr>
                </table>
            </div> -->
    
            <div class="konten3">
            <div class="weeksub"><span class="week">Next week</span></div>
                <table id="nextweek">
                    <!-- <tr>
                        <td class="circle12"></td>
                        <td>Valentine's Dinner</td>
                    </tr> -->
                   
                </table>
            </div>
            </left>
            <middle id="middle">
                <table class="eve">
                    <tr>
                        <th class="head" colspan="3">Event Details</th>
                    </tr>
    
                    <tr>
                        <td><i class="ri-map-pin-3-fill"></i></td>
                        <td>Event</td>
                        <td><?php echo $nama;?></td>
                    </tr>
    
                    <tr>
                        <td><i class="fa-solid fa-flag-checkered"></i></td>
                        <td>Start</td>
                        <!-- <td>14 Feb 2023 : 7.00 PM</td> -->
                        <td id="tanggalMulai"><?php echo $format_date_start. "  " .$format_time_start;?></td>
                    </tr>
    
                    <tr>
                        <td><i class="fa-solid fa-flag-checkered"></i></td>
                        <td>End</td>
                        <!-- <td>14 Feb 2023 : 10.00 PM</td> -->
                        <td><?php echo $format_date_end. "  " .$format_time_end;?></td>
                    </tr>
    
                    <tr>
                        <td><i class="ri-timer-fill"></i></td>
                        <td>Duration</td>
                        <td><?php echo $duration?></td>
                    </tr>
    
                    <tr>
                        <td><i class="ri-map-pin-2-fill"></i></td>
                        <td>Location</td>
                        <td><?php echo $location;?></td>
                    </tr>
    
                    <tr>
                        <td><i class="ri-survey-fill"></i></td>
                        <td>Priority</td>
                        <!-- <td id="bold">Important</td> -->
                        <td id="bold"><?php echo $priority;?></td>
                        <!-- <td class=circle2>Important</td> -->
                    </tr>
                </table>
                <table class="desc">
                    <tr>
                        <!-- <td>1</td>
                        <td>2</td>
                        <td rowspan="2">3</td> -->
                        
                        <td><i class="fa-solid fa-clipboard"></i></td>
                        <td id="tion"><p>Notes</p></td>
                        
                        <td rowspan="2">
                            <?php if (!empty($uploadfile)) : ?>
                                <img src="../form/<?php echo $uploadfile; ?>">
                            <?php else : ?>
                                <p>-</p>
                            <?php endif; ?>
                        </td>
                    </tr>
    
                    <tr>
                        
                        <td>
                            <span><?php echo $note;?></span>
                        </td>
                    </tr>
                </table>
            </middle>
            <right id="right">
                <div class="list">
                    <div class="todo-app">
                        <p class="huruf">Daily To-Do List</p> 
                            <div class="row">
                                <input type="text" id="input-box" placeholder="Add your text">
                                <button onclick="addTask()">Add</button>
                            </div>
                            <div class="second">
                                <ul id="list-container">
                                <!-- <li class="checked">Task 1</li>
                                <li>Task 2</li>
                                <li>Task 3</li> -->
                                </ul>
                            </div>
                            <!-- <div class="bawah"></div> -->
                            <div class="quotes">
                                <div class="Title">Quotes of the Day</div>
                                <p><?php echo $quotes;?></p>
                            </div>
                    </div>
                </div>
            </right>
        </div>
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
</html>
<script src="script1.js" defer></script>