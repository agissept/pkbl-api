<?php 
    include "config.php";

    $nama = $_POST['nama'];
    $nik = $_POST['nik'];
    $dana = $_POST['dana'];
    $sektor = $_POST['sektor'];
    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];
    $kecamatan = $_POST['kecamatan'];
    $kelurahan = $_POST['kelurahan'];
    $jalan = $_POST['jalan'];
    $surveyor = $_POST['surveyor'];
    $type = $_POST['type'];
    $instansi = $_POST['instansi'];
    $time = $_POST['time'];


    $insert = $con->query("INSERT INTO `pengajuan`( `nama`, `nik`, `instansi`, `dana`, `sektor`, `provinsi`, `kota`, `kecamatan`, `kelurahan`, `jalan`, `surveyor`, `type` , `time`) VALUES ('$nama', '$nik','$instansi', $dana, '$sektor', '$provinsi', '$kota', '$kecamatan', '$kelurahan', '$jalan', '$surveyor', '$type', '$time')") or die(mysqli_error($con));
    $result = $con->query("SELECT * FROM pengajuan ORDER BY id DESC LIMIT 1") or die(mysqli_error($con));
    $idFile = "";
    foreach($result as $id){
        $idFile = $id['id'];
    }

    mkdir("file/{$idFile}", 0777, true);

    header("Location: pengajuan.php")
?>