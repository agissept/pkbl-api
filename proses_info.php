<?php
    include 'config.php';

    $title =  $_POST['title'];
    $description = $_POST['description'];
    
    $result = $con->query("INSERT INTO `info`( `title`, `description`) VALUES ('$title', '$description')") or die(mysqli_error($con));

    $status = array('status' => false);
    
    if($result){
        $status['status'] = true;
    }

    echo json_encode($status);
?>