<?php
    include 'config.php';

    $id =  $_GET['id'];
    $bendahara = $_POST['bendahara'];


    date_default_timezone_set("Asia/Jakarta");
    $date = date('Y-m-d H:i:s');
    $result = $con->query("UPDATE pengajuan SET tanggal_pencairan = '$date', bendahara = '$bendahara', status = 'Selesai' WHERE id = '$id'") or die(mysqli_error($con));

    $status = array('status' => false);
    
    if($result){
        $status['status'] = true;
    }

    echo json_encode($status);
?>