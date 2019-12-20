<?php 
    include "config.php";

    $users = $con->query("SELECT * FROM user");

    echo toJson($users);
?>