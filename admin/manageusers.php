<?php 
include($_SERVER['DOCUMENT_ROOT'].'/header.php');
 
include($_SERVER['DOCUMENT_ROOT'].'/config.php');

if(isset($_POST['delete']))
{
$mysqli->query("Delete from users where username='".$_POST['user']."'");
}

?>
	
<form action="manageusers.php" method="POST">		

<?php
$result = $mysqli->query("select * from users where privilege='user'") or die(mysqli_error($mysqli));
$row = $result->num_rows;
if($row > 0)
{
echo "</br></br>Kumpulan user yang terdaftar : </br>";
while($row = $result->fetch_array(MYSQLI_BOTH))
{

echo "<input type='radio' name='user' value='{$row['username']}'/> ".$row['username']."<br/>";
}
}
else
{
echo "Tidak ditemukan user, mohon daftar terlebih dahulu.";
}
?>
<br/>
<input type="submit" value="Delete" name="delete"/>

</form>
<br/>
<a href="admin.php"> Back to Admin Panel</a>
<?php include($_SERVER['DOCUMENT_ROOT'].'/footer.php');  ?>
