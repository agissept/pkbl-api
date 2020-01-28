<?php
    include 'config.php';
    $user = $_GET['user'];
    $type = $_GET['type'];


    if($type == '' && $user == ''){
        $result = $con->query("SELECT * FROM pengajuan") or die(mysqli_error($con));
    }    
    else if($user == ''){
        $result = $con->query("SELECT * FROM pengajuan WHERE type='$type'")  or die(mysqli_error($con));
    }
    else{
        $result = $con->query("SELECT * FROM pengajuan WHERE AND surveyor='$user' AND type='$type'") or die(mysqli_error($con));
    }
    

    echo toJson($result)
?>