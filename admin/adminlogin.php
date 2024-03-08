<?php  
include($_SERVER['DOCUMENT_ROOT'].'/config.php');
$em="";
if(isset($_POST['Login']))
{
 $username=$_POST['username'];
 $password=$_POST['password'];

 if($username=='' || $password == '')
 {
	$em="Mohon isi semua input";
 }
 else
 {
	$password=sha1($password);
	$result=$mysqli->query("select * from users where username='$username' and password='$password' and privilege='admin' ") or die(mysql_error());;
	if($result->num_rows==1)
	{
	$data=$result->fetch_array(MYSQL_BOTH);
	session_start();
	$_SESSION['isAdminLoggedIn']=1;
	$_SESSION['userid']=$data["ID"];
	$_SESSION['username']=$username;
	$_SESSION['privilege']=$data['privilege'];
	header("Location: admin.php");
	}
	else
	{
	$em="Username/Password salah";
	}
  }
}
include($_SERVER['DOCUMENT_ROOT'].'/header.php');
?>

<b>Admin Login Panel:</b><br/>
<form action="adminlogin.php" method="post">
<table> 
<tr><td>UserName: </td><td><input type="text" name="username" /></td></tr>
<tr><td>Password :</td><td><input type="password" name="password"/></td></tr>
<tr><td><input type="submit" name="Login" value="Login"/></td></tr>
</table>  
</form>

<?php

echo "<span style='color:red'>".$em."</span>";
include($_SERVER['DOCUMENT_ROOT'].'/footer.php'); ?>
