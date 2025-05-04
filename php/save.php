<?php
// ini untuk save
include("config.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_GET['suhu']) && isset($_GET['tds']) && isset($_GET['ph'])&& isset($_GET['tinggi'])){

    // ambil data dari formulir
    
    $su = $_GET['suhu'];
    $td = $_GET['tds'];
    $p = $_GET['ph'];
    $tg = $_GET['tinggi'];

    // echo $nama;

    // buat query
    $sql = "INSERT INTO monitoring (suhu,tds,ph,tinggi) VALUES ($su, $td, $p,$tg )";
    $query = mysqli_query($db, $sql);

}

?>