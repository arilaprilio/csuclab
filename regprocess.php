<?php
include($_SERVER['DOCUMENT_ROOT'].'/config.php');
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$About = $_POST['About'];
$em="";
$e = 0;
if($username=='' || $password == '' || $email=='')
{
$em="Mohon isi semua input.";
$e = 1;
}
if(strlen($username) < 3)
{
$em = $em."<br/>"."Nama harus lebih dari 4 karakter huruf";
$e = 1;
header('Location: /register.php?em='.$em);
}
$result= $mysqli->query("select * from users where username='$username'") or die(mysqli_error($mysqli));
if($result->num_rows > 0)
{
$e = 1;
$em = $em."<br/>"."Username yang dipilih sudah di gunakan";
}
if($e ==1)
{
header('Location: /register.php?em='.$em);
}
else
{
$query="INSERT into users(username, password, email, About,avatar,privilege) values ('$username','$password','$email','$About','default.jpg','user')";
$mysqli->query($query) or die(mysqli_error($mysqli));
$mysqli->close();
header('Location: /login.php');
}

?>
