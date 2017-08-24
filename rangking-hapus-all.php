<?php
$server		= "localhost";
$username	= "root";
$password	= "";
$database	= "spk_saw";

//koneksi dan memilih database di server
mysql_connect($server,$username,$password) or die("Gagal");
mysql_select_db($database) or die("Database tidak ditemukan");

    session_start();
    mysql_query("DELETE FROM rangking");
    header('location:rangking.php');

    $_SESSION['pesan'] = 'Data Anda Berhasil Direset !';
?>