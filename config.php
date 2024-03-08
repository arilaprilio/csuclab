<?php

$db_name = "csuclab";
$db_user = "anon";
$db_password = "anon";
$db_server = "localhost";

$conn = new mysqli($db_server, $db_user, $db_password);

$sql = "SHOW DATABASES LIKE '$db_name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $mysqli = new mysqli($db_server, $db_user, $db_password, $db_name);
} else {
    $conn->query("CREATE DATABASE ".$db_name."") or die(mysqli_error($conn));
    $mysqli = new mysqli($db_server, $db_user, $db_password, $db_name);
}
?>