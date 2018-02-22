<?php 
$uid=$_GET['uid'];
include "config.php";

try{
	$pdo=$conn->query("DELETE FROM keranjang WHERE uid='$uid'");
	$pdo->execute($insert);
	 

	 header("location:/buku/keranjang.php?uid=$uid");
	 
	}catch(Exception $e){
	 print "koneksi atau query bermasalah" . $e->getMessage() . "</br>";
		die();
 }
?>