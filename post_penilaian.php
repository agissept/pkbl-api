<?php
    include 'config.php';

    $id =  $_GET['id'];
    $penilaian = $_POST['penilaian'];
    $penilai = $_POST['penilai'];

    date_default_timezone_set("Asia/Jakarta");
    $date = date('Y-m-d H:i:s');

    $result = $con->query("UPDATE pengajuan SET tanggal_penilaian = '$date', penilaian = '$penilaian', penilai= '$penilai', status = 'Persetujuan' WHERE id = '$id'") or die(mysqli_error($con));

    $status = array('status' => false);

    if($result){
        $status['status'] = true;
    }

    echo json_encode($status);
?>