<?php
    include 'config.php';

    $groupBy = $_GET['groupBy'];
    $bulan = $_GET['bulan'];
    $tahun = $_GET['tahun'];
    $type = $_GET['type'];

    switch ($bulan) {
        case 'Januari':
            $bulan = 1;
            break;
        case 'Februari':
            $bulan = 2;
            break;
        case 'Maret':
            $bulan = 3;
            break;
        case 'April':
            $bulan = 4;
            break;
        case 'Mei':
            $bulan = 5;
            break;
        case 'Juni':
            $bulan = 6;
            break;
        case 'Juli':
            $bulan = 7;
            break;
        case 'Agustus':
            $bulan = 8;
            break;
        case 'September':
            $bulan = 9;
            break;
        case 'Oktober':
            $bulan = 10;
            break;
        case 'November':
            $bulan = 11;
            break;
        case 'Desember':
            $bulan = 12;
            break;
        default:
            $bulan = 12;
        break;
    };

    if($groupBy == 'bulan'){
        $result = $con->query("SELECT sum(dana) as dana, type, provinsi, sektor, time FROM pengajuan WHERE YEAR(time) = '$tahun' GROUP BY MONTH(time)");
    }elseif($groupBy == 'tahun'){
        $result = $con->query("SELECT sum(dana) as dana, type, provinsi, sektor, time FROM pengajuan GROUP BY YEAR(time)");   
    }
    else{
        $result = $con->query("SELECT sum(dana) as dana, type, provinsi, sektor, time FROM pengajuan WHERE MONTH(time) = $bulan AND YEAR(time) = $tahun AND type = '$type' GROUP BY $groupBy") or die(mysqli_error($con));
    }
    
    echo toJson($result);
?>