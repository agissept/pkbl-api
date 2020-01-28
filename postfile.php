<?php
include 'config.php';

$idPengajuan = $_POST['id'];

$namaFile = $_FILES['file']['name'];
$namaSementara = $_FILES['file']['tmp_name'];

// tentukan lokasi file akan dipindahkan
$dirUpload = "file/".$idPengajuan."/";

// pindahkan file
$terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);

$lokasi = $dirUpload.$namaFile;

if ($terupload) {
    $result = $con->query("INSERT INTO `file`(`id_pengajuan`, `nama`, `lokasi`) VALUES($idPengajuan, '$namaFile', '$lokasi')") or die(mysqli_error($con));
    $result = $con->query("SELECT * FROM file ORDER BY id DESC LIMIT 1") or die(mysqli_error($con));

    echo toJson($result);
} else {
    echo "Upload Gagal!";
}

?>