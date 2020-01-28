<?php
include 'config.php';
$idPengajuan = $_GET['id'];

$result = "";
if($idPengajuan == ""){
    $result = $con->query("SELECT * FROM file");
}else{
    $result = $con->query("SELECT * FROM file WHERE id_pengajuan = '$idPengajuan'") or die(mysqli_error($con));
}

echo toJson($result);

?>