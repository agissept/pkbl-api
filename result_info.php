<?php
include 'config.php';

$result = $con->query("SELECT * FROM info");

echo toJson($result);

?>