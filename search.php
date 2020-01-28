<?php
    include 'config.php';
    $query = $_GET['query'];

    if($query == ""){
        $query = "tidak data";
    }

    $result = $con->query("SELECT * FROM pengajuan WHERE 
        nama LIKE '%$query%' OR
        nik LIKE '%$query%' OR
        provinsi LIKE '%$query%' OR
        kota LIKE '%$query%' OR
        kecamatan LIKE '%$query%' OR
        kelurahan LIKE '%$query%' OR
        jalan LIKE '%$query%' OR
        dana LIKE '%$query%' OR
        sektor LIKE '%$query%' OR
        koordinat LIKE '%$query%' OR
        surveyor LIKE '%$query%' OR
        status LIKE '%$query%' OR
        alasan LIKE '%$query%' OR
        penilai LIKE '%$query%' OR
        penyetuju LIKE '%$query%' OR
        penilaian LIKE '%$query%'
    ") or die(mysqli_error($con));
    

    echo toJson($result)
?>