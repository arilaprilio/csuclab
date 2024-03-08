<?php include('header.php'); 
if(isset($_SESSION['isLoggedIn'])) { 
echo "<b>Selamat datang ".$_SESSION['username']." ! </b>";
}
?>
CSUC Pentesting Lab adalah sebuah open source kerentanan aplikasi website. Bisa digunakan untuk belajar tentang berbagai macam tipe kerentanan dalam website.   
<br/><br/>
Untuk saat ini, website memungkinkan untuk mempelajari jenis kerentanan berikut:
<ul>
<li>SQL Injection</li>
<li>XSS</li>
<li>CSRF</li>
<li>Clickjacking</li>
<li>SSRF</li>
<li>File Inclusion</li>
<li>Code Execution</li>
<li>Insecure Direct Object Reference</li>
<li>Unrestricted File Upload vulnerability</li>
<li>Open URL Redirection</li>
<li>Server Side Includes(SSI) Injection</li>
</ul>
<br/>
-------------<br/>
Admin Credentials:<br/>
Username: admin<br/>
Password : pass<br/><br/>
<a href='admin/adminlogin.php'> Go to Admin Page &gt;&gt;</a>

<?php include('footer.php'); ?>
