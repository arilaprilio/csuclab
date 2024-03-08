<?php 
include('lib/loginverify.php');
include('header.php'); 
include('config.php');

if(isset($_GET['id']))
{
	if (class_exists('PDO')) //Using PDO to prevent SQL Injection
	{
	$db = new PDO("mysql:host=localhost;dbname=$db_name;",$db_user,$db_password);

		$id = intval($_GET['id']); //Validating Input to Prevent SQLi 
		//Prepared Statement to Prevent SQLi : 
		$statement = $db->prepare("select * from users where id = :id");
		$statement->execute(array(':id' => $id));
		$row = $statement->fetch();  
		//Display Details
		echo "UserName : ".$row['username']."<br>";
		echo "Email : ".$row['email']."<br>";
		echo "About : ".$row['about'];
	 
	}
	else //If there is no PDO installed 
	// This code is  vulnerable to SQL Injection
	{
		$id=$_GET['id'];
		$result = $mysqli->query("select * from users where id='$id'");
		if($result->num_rows > 0)
		{
		$row = $result->fetch_array(MYSQLI_BOTH);
		echo "UserName : ".$row['username']."<br>";
		echo "Email : ".$row['email']."<br>";
		echo "About : ".$row['about']."<br>";
		}
	}
}

echo "<br/><br><img src='vulnerability/avatar/".$_SESSION['avatar']."' alt='[Tidak ada foto profil]'/> - <a href='vulnerability/ubahprofile.php'>Ubah foto profil</a><br/>";
?>
</br></br>
<a href="vulnerability/csrf/changeinfo.php"> Ubah tentang dirimu</a></br></br>
<a href="vulnerability/csrf/change-email.php"> Ubah Email</a>

<?php include('footer.php');  ?>
