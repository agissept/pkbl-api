<?php 
    include "config.php";

    $nama = $_POST['nama'];
    $dana = $_POST['dana'];
    $wilayah = $_POST['wilayah'];
    $sektor = $_POST['sektor'];


    $insert = $con->query("INSERT INTO `pengajuan_dana`( `nama_pengaju`, `jumlah_dana`, `wilayah`, `sektor`) VALUES ('$nama', $dana, '$wilayah', '$sektor')") or die(mysqli_error($con));


    header("Location: pengajuan.php")
?>