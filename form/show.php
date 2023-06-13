<?php
    include "conne.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengguna</title>
    <style>
        body{
            font-family: Trebuchet MS, sans-serif;
            margin:auto;
            max-width: max-content;
            font-size: 20px;
            color: #654E92;
        }
        table, th,td{
            border-collapse: collapse;
            border: 2px solid black;
            padding:0.5rem;
        }
    </style>
</head>
<body>
    <h1>Data pengguna</h1>
    <h2><a href="form.php">Tambah Data</a></h2>

    <table>
        <thead>
            <th>Nama Event</th>
            <th>Lokasi</th>
            <th>Tanggal Mulai</th>
            <th>Waktu Mulai</th>
            <th>Tanggal Selesai</th>
            <th>Waktu Selesai</th>
            <th>Durasi</th>
            <th>Prioritas</th>
            <th>Notes</th>
            <th>Quotes</th>
            <th>Upload</th>
            <th>Action</th>
        </thead>

        <tbody>
            <?php
            $sql = "SELECT * FROM events";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    echo "<tr>";
                    echo "<td>".$row["event_name"]."</td>";
                    echo "<td>".$row["location"]."</td>";
                    echo "<td>".$row["start_date"]."</td>";
                    echo "<td>".$row["start_time"]."</td>";
                    echo "<td>".$row["end_date"]."</td>";
                    echo "<td>".$row["end_time"]."</td>";
                    echo "<td>".$row["duration"]."</td>";
                    echo "<td>".$row["priority"]."</td>";
                    echo "<td>".$row["notes"]."</td>";
                    echo "<td>".$row["quotes"]."</td>";
                    echo "<td>".$row["upload"]."</td>";
                    echo "<td><a href='form.php?id=".$row["id"]."'>Ubah</a>&nbsp;<a href='delete.php?id=".$row["id"]."'>Hapus</a></td>";
                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
</body>
</html>