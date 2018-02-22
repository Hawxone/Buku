<?php
include "config.php";
session_start();

$id=$_POST['id'];
$komentar=$_POST['komentar'];
$avatar=$_POST['avatar'];
$username=$_POST['username'];

	try{
		$conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$pdo = $conn->prepare('INSERT INTO komentar(id, komentar, username, avatar) VALUES(:id, :komentar, :username, :avatar)');
						$insert = array(':id'=>$id, ':komentar'=>$komentar, ':username'=>$username, ':avatar'=>$avatar);
						$pdo->execute($insert);
						
						$_SESSION['pesan']=$id;
						header("location:/buku/viewpost.php");
	}catch(PDOexception $e){
		print "insert data gagal: ".$e->getMessage()."<br/>";
						die();
		
	}
 ?>