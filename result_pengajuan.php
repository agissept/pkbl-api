<?php
    include 'config.php';

    $orderBy = $_GET['orderBy'];

    $result = '';

    if($orderBy == 'sektor'){
        $result = $con->query("SELECT sum(dana) as dana, type, wilayah, sektor, time FROM pengajuan_dana GROUP BY sektor");
    }else if($orderBy == 'wilayah'){
        $result = $con->query("SELECT sum(dana) as dana, type, wilayah, sektor, time FROM pengajuan_dana GROUP BY wilayah");
    }else{
        $result = $con->query("SELECT sum(dana) as dana, type, wilayah, sektor, time  FROM pengajuan_dana GROUP BY YEAR(time), MONTH(time)") or die(mysqli_error($con));
    }

    echo toJson($result);
?>