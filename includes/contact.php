<?php
session_start();
include 'config.php';

$nama=$_POST['nama'];
$email=$_POST['email'];
$kelamin=$_POST['kelamin'];
$tgl=$_POST['tgl'];
$pesan=$_POST['pesan'];


	try{
			$conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$pdo = $conn->prepare('INSERT INTO pesan(nama, email, kelamin, tgl_lahir, pesan) VALUES( :nama, :email, :kelamin, :tgl_lahir, :pesan)');
			$insert = array(':nama'=>$nama, ':email'=>$email, ':kelamin'=>$kelamin, ':tgl_lahir'=>$tgl, ':pesan'=>$pesan);
			$pdo->execute($insert);
			
			$_SESSION['pesan']="sukses";
			header("location:/buku/form-contact.php");
			
		}catch(PDOexception $e){
			print "insert data gagal: ".$e->getMessage()."<br/>";
			die();
			
		}

?>