<?php
    $servername = "127.0.0.1";
    $database = "calendar";
    $username = "root";
    $password = "";

    // membuat koneksi
    $conn = new mysqli($servername, $username, $password, $database);
    session_start();


    // ambil data dari database
    $sqlgetdata = "SELECT * from events WHERE username =  '".$_SESSION['username']."'";
    $result = $conn->query($sqlgetdata);
    
    //masukin data dalam bentuk array
    $data = array();
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
             $data[] = $row;
        }
    }
    

    //Ubah ekstensi php menjadi JSON
    header('Content-Type: application/json');
    echo json_encode($data);
    
    // tutup Koneksi
    $conn->close();
?>