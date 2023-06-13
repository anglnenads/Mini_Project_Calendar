<?php
// 1. Dapatkan Data Acara dari Database
$servername = "127.0.0.1";
$username ="root";
$password = "";
$database = "calendar";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Mendapatkan tanggal saat ini dan tanggal satu minggu dari sekarang
    $today = date("Y-m-d");
    $nextWeek = date("Y-m-d", strtotime("+1 week"));
    $nextTwoWeeks = date("y-m-d", strtotime("+2 weeks"));

    // Kueri untuk mendapatkan acara dalam minggu ini
    $queryThisWeek = "SELECT * FROM events WHERE start_date >= :tanggalIni AND start_date <= :tanggalDepan";
    $stmtThisWeek = $conn->prepare($queryThisWeek);
    $stmtThisWeek->bindParam(':tanggalIni', $today);
    $stmtThisWeek->bindParam(':tanggalDepan', $nextWeek);
    $stmtThisWeek->execute();

    // Kueri untuk mendapatkan acara dalam minggu depan
    $queryNextWeek = "SELECT * FROM events WHERE start_date > :tanggalDepan AND start_date <= :tanggalMingguDepan";
    $stmtNextWeek = $conn->prepare($queryNextWeek);
    $stmtNextWeek->bindParam(':tanggalDepan', $nextWeek, PDO::PARAM_STR); // Add PDO::PARAM_STR as the third argument
    $stmtNextWeek->bindParam(':tanggalMingguDepan', $nextTwoWeeks, PDO::PARAM_STR); // Add PDO::PARAM_STR as the third argument
    $stmtNextWeek->execute();
    
    // Simpan hasilnya dalam variabel $dataAcara
    $dataAcaraThisWeek = $stmtThisWeek->fetchAll(PDO::FETCH_ASSOC);
    $dataAcaraNextWeek = $stmtNextWeek->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Koneksi gagal: " . $e->getMessage();
    exit;
}

// 2. Kirim Data Acara ke JavaScript
echo '<script>';
echo 'var dataAcaraThisWeek = ' . json_encode($dataAcaraThisWeek) . ';';
echo 'var dataAcaraNextWeek = ' . json_encode($dataAcaraNextWeek) . ';';
echo '</script>';
?>