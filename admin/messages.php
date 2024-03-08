<?php 
if(!isset($_SESSION))
{
session_start();
}
 
include($_SERVER['DOCUMENT_ROOT'].'/header.php'); 
include($_SERVER['DOCUMENT_ROOT'].'/config.php');

if(isset($_REQUEST['msgid']))
{
	$msgid=$_REQUEST['msgid'];

	$result=$mysqli->query("select * from Messages where msgid=".$msgid) or die(mysqli_error($mysqli));
	$row=$result->num_rows;
	if($row>=1)
	{
	echo "</br></br>Message: </br>";
	 
		while($row=$result->num_rows(MYSQL_BOTH))
		{
			echo "Sender: ".$row['name']."<br/>";
			echo "Email: ".$row['email']."<br/>";
			echo "Message: ".$row['msg']."<br/>";
			
		}
	 
	}
	 
}

?>
 </br>
<a href="MessageList.php"> Kembali ke daftar pesan</a>
<?php include($_SERVER['DOCUMENT_ROOT'].'/footer.php');  ?>
