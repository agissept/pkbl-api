<?php 
    include "config.php";

    $status = array(
        'status' => false,
    );

    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = $con->query("SELECT * FROM user WHERE username='$username' and password='$password' ");
    if($login->num_rows>0){
        $status['status'] = true;
    }

    echo json_encode($status);
?>