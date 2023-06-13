<?php
include "../dbconnect.php";

$sql = "SELECT * FROM events WHERE id = ".$_GET['id'];
$result = $conn->query($sql);



if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $nama = $row['event_name'];
        $location = $row['location'];
        $start_date = $row['start_date'];
        $start_time = $row['start_time'];
        $end_date = $row['end_date'];
        $end_time = $row['end_time'];
        $priority = $row['priority'];
        $duration = $row['duration'];
        $note = $row['notes'];
        $quotes = $row['quotes'];
        $uploadfile = $row['upload'];
    }
}

include "conne.php";
session_start();

if (count($_POST) != 0) {

    $nama = mysqli_real_escape_string($conn, $_POST["event_name"]);
    $location = mysqli_real_escape_string($conn, $_POST["location"]);
    $start_date = mysqli_real_escape_string($conn, $_POST["start_date"]);
    $start_time = mysqli_real_escape_string($conn, $_POST["start_time"]);
    $end_date = mysqli_real_escape_string($conn, $_POST["end_date"]);
    $end_time = mysqli_real_escape_string($conn, $_POST["end_time"]);
    $priority = mysqli_real_escape_string($conn, $_POST["priority"]);
    $note = mysqli_real_escape_string($conn, $_POST["notes"]);
    $quotes = mysqli_real_escape_string($conn, $_POST["quotes"]);

    $tanggalMulai = new DateTime($start_date.' '.$start_time);
    $tanggalSelesai = new DateTime($end_date.' '.$end_time);

    $duration = $tanggalMulai->diff($tanggalSelesai);

    $hari = $duration->days;
    $jam = $duration->h;
    $menit = $duration->i;
    $detik = $duration->s;

    $durasiString = "$hari days, $jam hours, $menit minutes, $detik seconds";

    $uploadfile = "";

    if (isset($_FILES["upload"]["name"]) && $_FILES["upload"]["name"] !== "") {
        $tmp = $_FILES["upload"]["tmp_name"];
        $uploadfile = "upload/".$_FILES["upload"]["name"];

        if (!move_uploaded_file($tmp, $uploadfile)) {
            echo "<br>Status: Gagal upload";
        }
    }

    $query = "UPDATE events 
        SET event_name = '$nama', 
            location = '$location', 
            start_date = '$start_date',
            start_time = '$start_time', 
            end_date = '$end_date', 
            end_time = '$end_time', 
            duration = '$durasiString', 
            priority = '$priority', 
            notes = '$note', 
            quotes = '$quotes'";
    
    if (!empty($uploadfile)) {
        $query .= ", upload = '$uploadfile'";
    }
    
    $query .= " WHERE id = '".$_GET['id']."';";

    $insert = mysqli_query($conn, $query);

    if ($insert) {
        echo '<script>alert("Successfully update event!"); window.location.href="../Main/main.php";</script>';

    } else {
        echo 'Error: '.mysqli_error($conn);
    }
}
?>


<!DOCTYPE html>
<html lang="en">



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../font/fontawesome-free-6.4.0-web/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <script src="form-edit.js" defer></script>
    <link rel="stylesheet" href="form-edit.css?v=<?php echo time();?>">
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
                    <a href="../Main/main.php">
                        <li>Back</li>
                    </a>
                    
                </ol>
            </div>
            <div id="profile">
                <i class="fa-regular fa-circle-user"></i>
                <p>Angelene Nadine</p>
            </div>
        </div>
        <div class="bulan">
                <div id="one"><span>Add Event</span></div>
                <div id="two"></div>

        </div>
</header>
<main>

    <div class="container">
        <div class="header">
            <h2>Event Details</h2>
        </div>
        <form action="edit-form.php?id=<?php echo $id?>" method="POST" enctype="multipart/form-data" id="form" class="form">
            <div class="form-control">
                <label for="name">Event Name</label>
                <input type="text" name="event_name" placeholder="Enter Event Name" id="name" value="<?php echo $nama ?>"/>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>

            <div class="form-control">
                <label for="location">Event Location</label>
                <input type="text" name="location" placeholder="Enter Events Location" id="location" value="<?php echo $location ?>" />
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>

            <div class="form-control">
                <label for="notes">Notes</label>
                <input type="text" name="notes" placeholder="Enter Notes" id="notes" value="<?php echo $note?>"/>
                <!-- <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small> -->
            </div>
            <div class="form-control">
                <label for="quotes">Quotes of the day</label>
                <input type="text" name="quotes" placeholder="Enter Quotes" id="quotes" value="<?php echo $quotes ?>"/>
                <!-- <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small> -->
            </div>

            <div class="form-control2">
                <label for="Start">Event Start</label>
                    <div id="choose">        
                        <i class="fa-regular fa-calendar"></i>

                        <div class="form-control5">
                            <input type="date" name="start_date" id="start-date" class="event1" value="<?php echo $start_date ?>">
                            <small>Error message</small>
                        </div>
                    </div>

                    <div id="choose1">        
                        <i class="fa-regular fa-clock"></i>
                        <div class="form-control5">
                            <input type="time" name="start_time" id="start-time" class="event1" value="<?php echo $start_time ?>">
                            <small>Error message</small>
                        </div>
                    </div>    
            </div>

            <div class="form-control3">
                <label for="End">Event End</label>
                <div id="choose">        
                    <i class="fa-regular fa-calendar"></i>

                    <div class="form-control5">
                        <input type="date" name="end_date" id="end-date" class="event1" value="<?php echo $end_date ?>">
                        <small>Error message</small>
                    </div>
                </div>
                <div id="choose1">        
                    <i class="fa-regular fa-clock"></i>
                    <div class="form-control5">
                        <input type="time" name="end_time" id="end-time" class="event1" value="<?php echo $end_time?>">
                        <small>Error message</small>
                    </div>
                </div>
            </div>

            <!-- <div class="form-control10">
                <label for="duration">Duration</label>
                <div class="one-line">
                    <div class="form-control11">
                        <input type="text" name="hour" placeholder="hour" id="hour" />
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small>Error message</small>
                    </div>
                    <p>hour</p>
                    <div class="form-control12">
                        <input type="text" name="minute" placeholder="minute" id="minute" />
                        <i class="fas fa-check-circle"></i>
                        <i class="fas fa-exclamation-circle"></i>
                        <small>Error message</small>
                    </div>
                    <p>minute</p>
                    
                    
                </div>
            </div> -->

            <div class="form-control2">
                <label>Priority Level</label>
                <div class="form-control5">
                <div id="radio">
                    <input type="radio" name="priority" value="Low"  <?php if ($priority == 'Low') echo "checked";?>><label style="font-size: 15px;">Low</label><br>
                    <input type="radio" name="priority" value="Medium" <?php if ($priority == 'Medium') echo "checked";?>><label style="font-size: 15px;">Medium</label><br>
                    <input type="radio" name="priority" value="High"  <?php if ($priority == 'High') echo "checked";?> ><label style="font-size: 15px;">High</label>
                </div>
                <small>Error message</small>
                </div>
                
            </div>
            <div class="form-control3">
                <label>Picture</label>
                <input type="file" name="upload" id="file" >
            </div>
        </form>
        <div id="btn-form">
                <!-- <button class="btn btn-warning" type="submit">Add</button>  -->
                    <input type="reset" value="Reset" id="reset-button">
                    <button id="submit">Update</button>
                    <!-- <button type="reset">Reset</button>
                    <button type="submit">Insert</button> -->
                </div>
            <!-- <button>Submit</button> -->
    </div>
</main>
</body>
</head>
</html>



