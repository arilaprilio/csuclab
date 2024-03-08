<?php
include('config.php');
$con = mysqli_connect($db_server, $db_user, $db_password, $db_name);
if (mysqli_connect_errno()) {
    die("Connection Failure: " . mysqli_connect_error());
}
?>
