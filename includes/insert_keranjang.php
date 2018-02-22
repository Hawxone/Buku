<?php

include "config.php";
session_start();
$id=$_GET['id'];
$title=$_GET['title'];
$harga=$_GET['harga'];
$uid=$_GET['uid'];
$image=$_GET['image'];
try{
	$pdo=$conn->prepare("INSERT INTO keranjang(id,uid,title,harga,image) values(:id, :uid, :title, :harga,:image)");
	$insert=array(':id'=>$id,':uid'=>$uid, ':title'=>$title,':harga'=>$harga,':image'=>$image);
	 $pdo->execute($insert);
	 
	 $_SESSION['beli']="$id";
	 header("location:/buku/viewpost.php?bookid=$id");
	 
	}catch(Exception $e){
	 print "koneksi atau query bermasalah" . $e->getMessage() . "</br>";
		die();
 }

?>