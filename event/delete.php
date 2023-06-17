<?php 

include "../dbconnect.php";
echo "hello world";
if(isset($_GET)){
    // $sql = "SELECT id FROM events WHERE event_name = ?";
    $id = $_GET['id'];

    session_start();

    $uploadDir = "../form";
    $sql = "SELECT upload FROM events WHERE username = '".$_SESSION["username"]."' AND id = '" .$id."';";
    $result = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($result)) {
        $gambar = $row['upload'];
        // buang huruf pertama
        $gambar = substr($gambar, 1);
        unlink($uploadDir.$gambar);
    }
    



    $deletesql = "Delete from events where username = '".$_SESSION["username"]."' AND id = '" .$id."';";
    mysqli_query($conn, $deletesql);

    // Menghapus file gambar dari folder
    




    // $deletesql = "Delete from events where username = '".$_SESSION["username"]."' AND id = '" .$id."';";

    // mysqli_query($conn, $deletesql);


    header("Location: ../Main/main.php");
    exit();
}


?>