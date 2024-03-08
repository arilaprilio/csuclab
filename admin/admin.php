<?php 
if(!isset($_SESSION))
{
session_start();
}
 
include($_SERVER['DOCUMENT_ROOT'].'/header.php'); 

?>

Selamat datang di panel admin<br/><br/>
<ul>
<li><b><a href='manageusers.php'>Daftar Users </a></b></li>
<li><b><a href='MessageList.php'> Pesan </a></b></li>
<li><b><a href='logout.php'>Logout</a></b></li>
</ul>
<?php include($_SERVER['DOCUMENT_ROOT'].'/footer.php');  ?>
