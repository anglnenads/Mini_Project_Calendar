<?php
    $servername = "127.0.0.1";
    $database = "calendar";
    $username = "root";
    $password = "";

    // membuat koneksi
    $conn = new mysqli($servername, $username, $password, $database);
    session_start();

    $username = $_SESSION['username'];
    $year = $_GET['year'];
    $month = $_GET['month'];


    // ambil data dari database
    $sqlgetdata = "SELECT event_name, start_date, end_date,priority,id 
               FROM events 
               WHERE username = '" . $username . "' 
               AND YEAR(end_date) = " . $year . " 
               AND MONTH(end_date) = " . $month . " 
               AND MONTH(start_date) = MONTH(DATE_SUB(end_date, INTERVAL 1 MONTH)) 
               ORDER BY start_date;";
    $result = $conn->query($sqlgetdata);
    
    //masukin data dalam bentuk array
    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
             $data[] = $row;
        }
    }

    $sqlgetdata2 = "SELECT event_name, start_date, end_date,priority,id 
                    FROM events 
                    WHERE username = '" . $username . "' 
                    AND YEAR(start_date) = " . $year . " 
                    AND MONTH(start_date) = " . $month . "  
                    ORDER BY start_date;";

   // $sqlgetdata2 = "SELECT id,event_name,start_time,end_time   from events WHERE username =  '".$_SESSION['username']."' AND YEAR(start_time) = '".$_GET['year']."' AND MONTH(start_time) = '".$_GET['month']."'";
    $result2 = $conn->query($sqlgetdata2);
    if ($result2->num_rows > 0) {
        while ($row = $result2->fetch_assoc()) {
             $data[] = $row;
        }
    }


    

    //Ubah ekstensi php menjadi JSON
    header('Content-Type: application/json');
    echo json_encode($data);
    
    // tutup Koneksi
    $conn->close();
?>