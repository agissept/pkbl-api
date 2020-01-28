<?php 
    include "config.php";


    $username = $_POST['username'];
    $password = $_POST['password'];

    $login = $con->query("SELECT * FROM user WHERE username='$username' and password='$password' ");
    if($login->num_rows>0){
        $json = json_decode(toJson($login))[0];
        $json->status = true;
    
    }else{
        $json = array('status' => false);
    }

    echo json_encode($json);
?>