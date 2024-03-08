<?php
include 'header.php';
include 'config.php';

if(isset($_POST['install'])) {
	if($_POST['install']==1) {
		//Database creation

		$mysqli->query("DROP DATABASE IF EXISTS $db_name") or die("Can't drop database".mysqli_error($mysqli));
		$mysqli->query("CREATE DATABASE $db_name") or die("creating database fails".mysqli_error($mysqli));

		//User Table creation
		$mysqli->query("USE $db_name") or die("Gagal memilih database : ".mysqli_error($mysqli));
		$sql="Create table users(ID int NOT NULL AUTO_INCREMENT, username varchar(30),email varchar(60), password varchar(40), about varchar(50),privilege varchar(20),avatar TEXT,primary key (id))";
		$mysqli->query($sql) or die("Gagal menyimpan tabel user : ".mysqli_error($mysqli));
		
		$hashedpassword=sha1("pass");
		$mysqli->query("INSERT into users(username, password, email,About,avatar, privilege) values ('admin','$hashedpassword','admin@localhost','I am the admin of this page','default.jpg','admin')") or die("Gagal menyimpan data user : ".mysqli_error($mysqli));;

		//Posts table creation
		$mysqli->query("create table posts(postid int NOT NULL AUTO_INCREMENT, content TEXT,title varchar(100), user varchar(30), primary key (postid))") or die("Gagal membuat tabel posts : ".mysqli_error($mysqli));
		$mysqli->query("INSERT into posts(content,title, user) values ('Feel free to ask any questions about BTS Lab','First Post', 'admin')") or die("Gagal menyimpan data posts : ".mysqli_error($mysqli));
		$mysqli->query("create table tdata(id int, page varchar(30))") or die("Gagal membuat Tabel<br/>".mysqli_error($mysqli));
		$mysqli->query("Insert into tdata values(1,'ext1.html')");
		$mysqli->query("Insert into tdata values(2,'ext2.html')");
		
		//Messages Table Creation
		$sql="Create table Messages(msgid int NOT NULL AUTO_INCREMENT,name varchar(30),email varchar(60), msg varchar(500),primary key (msgid))";
		$mysqli->query($sql) or die("Gagal membuat tabel Messages".mysqli_error($mysqli));
		$mysqli->query("INSERT into Messages(name,email, msg) values ('TestUser','Test@localhost', 'Hi admin, bagaimana kabarmu ?')") or die("Failed to insert Messages".mysqli_error($mysqli));
		echo "<script>alert('Sukses melakukan instalasi website !')</script> ";
		$mysqli->close();
	}
}

?>


<p>
<form action="setup.php" method="post">
<input type="hidden" value="1" name="install"/>
Klik disini untuk melakukan install : <input type="submit" value=" Setup " name="setup" style="background: transparent; color: #fff; border-color: #fff; cursor: pointer;" />
</form>
</p>

<br/>
Note:<br/><b style="color:red">Jika database sudah ada sebelumnya, maka akan terhapus</b>

<?php include($_SERVER['DOCUMENT_ROOT'].'/footer.php'); ?>
