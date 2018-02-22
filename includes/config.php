<?php 

		try{
		$conn=new PDO('mysql:host=localhost;dbname=buku',"root","");
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
	}catch(Exception $e){
		print "koneksi atau query bermasalah" . $e->getMessage() . "</br>";
		die();
	}


?>