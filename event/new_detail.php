<?php 
include "../dbconnect.php";
// include "/connect.php";


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
    <title>Document</title>
    <link rel="stylesheet" href="detail.css?v=<?php echo time();?>">
    <link rel="stylesheet" href="../font/fontawesome-free-6.4.0-web/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="script1.js" defer></script>
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
                <p>Angelene Nadine</p>
            </div>
        </div>
        <div class="bulan">
                <div id="one"><span></span></div>
                <div id="two">
                    <a href="../form/edit-form.php?id=<?php echo $id; ?>">
                        <div class="edit">
                            <i class="fa-solid fa-pen"></i><br>
                            <p>Edit</p>
                        </div>
                    </a>
                    <a href="./delete.php?id=<?php echo $id ?>">
                        <div class="delete">
                            <i class="fa-solid fa-trash"></i>
                            <p>Delete</p>
                        </div>
                    </a>
                </div>
        </div>
    </header>
    <main>
        <div class="container">
            <left id="left">
                <div class="Title">Upcoming Event</div>
            <div class="konten1">
                <div class="weeksub"><span class="week">This week</span></div>
                <!-- <span class="week">This week</span> -->
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
                        <td><?php echo $start_date. " " .$start_time;?></td>
                    </tr>
    
                    <tr>
                        <td><i class="fa-solid fa-flag-checkered"></i></td>
                        <td>End</td>
                        <!-- <td>14 Feb 2023 : 10.00 PM</td> -->
                        <td><?php echo $end_date. " " .$end_time;?></td>
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
  
</body>
</html>
