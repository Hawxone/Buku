<?php

$uid=$_GET['uid'];
$id=$_GET['id'];
include "config.php";

try{
	$pdo=$conn->query("DELETE FROM keranjang WHERE keranjangID='$id'");
	$pdo->execute($insert);
	 

	 header("location:/buku/keranjang.php?uid=$uid");
	 
	}catch(Exception $e){
	 print "koneksi atau query bermasalah" . $e->getMessage() . "</br>";
		die();
 }

 ?>