<?php 
    $con = new mysqli('localhost','root','','pkbl');

    function toJson($mysqli_result) {
        $rows = array();
            while($r = mysqli_fetch_assoc($mysqli_result)) {
            $rows[] = $r;
        }
        return json_encode($rows);
    }
?>