<?php 
if(!isset($_SESSION))
{
session_start();
}
 
include($_SERVER['DOCUMENT_ROOT'].'/header.php'); 
include($_SERVER['DOCUMENT_ROOT'].'/config.php');
if(isset($_REQUEST['action']) && $_REQUEST['action']='delete')
{
$mysqli->query("Delete from Messages;");
}
$result=$mysqli->query("select * from Messages;") or die(mysqli_error($mysqli));
$row=$result->num_rows;
if($row>=1)
{
echo "<div style='text-align: right; '> <a href='?action=delete' >Hapus semua pesan</a></div> ";
echo "</br></br>Pesan: </br>";
echo "<ol>";
	while($row=$result->fetch_array(MYSQL_BOTH))
	{
		$title=substr($row['msg'],0,14);
		$msgid=$row['msgid'];
		echo "<li>";
		echo "<a href='messages.php?msgid=$msgid'>$title ..</a>";
		echo "</li>";
	}
echo "</ol>";
}
else
{
echo "Tidak ada pesan ditemukan";
}

?>
 </br>
<a href="admin.php"> Kembali ke Admin Panel</a>
<?php include($_SERVER['DOCUMENT_ROOT'].'/footer.php');  ?>
