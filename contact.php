<?php  
include($_SERVER['DOCUMENT_ROOT'].'/config.php');
 
if(isset($_REQUEST['action']))
{
if($_REQUEST['msg']!="" && $_REQUEST['name']!="")
{
$name=$_REQUEST['name'];
$email=$_REQUEST['email'];
$msg=$_REQUEST['msg'];
		
$mysqli->query("insert into Messages (name,email,msg) values ('".$name."','".$email."','".$msg."')") or die(mysqli_error($mysqli));
	 
	 
	
	$em="Terima kasih sudah menghubungi kami.";
}
else
{
$em="Please Enter Name & Message";
}
}
include('header.php');
echo "<span style='color:red'>".$em."</span>";

?>
<br/><br/>
<form action="" method="POST">
<table> 
<tr><td>Name: </td><td><input type="text" name="name" /></td></tr>
<tr><td>Email (optional) : </td><td><input type="text" name="email" /></td></tr>
<tr><td>Pesan :</td><td><textarea name="msg"></textarea></td></tr>
<tr><td><input type="submit" name="action" value="send"/></td></tr>
</table>  
</form>

<?php

include('footer.php'); ?>
