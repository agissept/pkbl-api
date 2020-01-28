<?php
    include 'config.php';

    $id =  $_GET['id'];
    $status_persetujuan = $_POST['status_persetujuan'];
    $penyetuju = $_POST['penyetuju'];
    $alasan = $_POST['alasan'];

    date_default_timezone_set("Asia/Jakarta");
    $date = date('Y-m-d H:i:s');

    if( $status_persetujuan == "true"){
        $result = $con->query("UPDATE pengajuan SET tanggal_penyetujuan = '$date', status_persetujuan = 1, alasan = '$alasan',  penyetuju = '$penyetuju', status = 'Pencairan' WHERE id = '$id'") or die(mysqli_error($con));
    }else{
        $result = $con->query("UPDATE pengajuan SET tanggal_penyetujuan = '$date',  status_persetujuan = 0, alasan = '$alasan',  penyetuju = '$penyetuju', status = 'Ditolak' WHERE id = '$id'") or die(mysqli_error($con));    
    }

    $status = array('status' => false);
    
    if($result){
        $status['status'] = true;
    }

    echo json_encode($status);
?>