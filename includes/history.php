<?php 

	include "config.php";
	
					$uid=$_GET['uid'];
					$result=$conn->query("SELECT sum(harga) as total FROM keranjang where uid='$uid'");
					$rows=$result->fetch(PDO::FETCH_OBJ);
					
					$total = $rows->total;
					
					
					
					
					
					
					
					
					try{
						
						$pdo=$conn->prepare("INSERT INTO history(tgl_pesan,total,uid) values(curdate(), :total, :uid)");
						$insert=array(':total'=>$total, ':uid'=>$uid);
						 $pdo->execute($insert);
						 
					
					
						 
						}catch(Exception $e){
						 print "koneksi atau query bermasalah" . $e->getMessage() . "</br>";
							die();
					 }
					 
					
					$result=$conn->query("SELECT * FROM history where uid='$uid'");
					while($rows=$result->fetch(PDO::FETCH_OBJ)){
					$invoiceID=$rows->invoiceID;
					$tgl_pesan=$rows->tgl_pesan;
					}
					
					$result=$conn->query("SELECT * FROM keranjang where uid='$uid'");
					while($rows=$result->fetch(PDO::FETCH_OBJ)){
					
						$harga=$rows->harga;
						$bookid=$rows->id;
						$image=$rows->image;
						$title=$rows->title;
					 
						 try{
							
							$pdo=$conn->prepare("INSERT INTO detail_history(invoiceID,id,title,tgl_pesan,expiry,uid,harga,image) values(:invoiceID,:id,:title,:tgl_pesan,curdate() + interval 1 year,:uid,:harga,:image)");
							$insert=array(':invoiceID'=>$invoiceID,':id'=>$bookid,':title'=>$title,':tgl_pesan'=>$tgl_pesan,':uid'=>$uid,':harga'=>$harga,'image'=>$image);
							 $pdo->execute($insert);
							 
						
							 
							 
							}catch(Exception $e){
							 print "koneksi atau query bermasalah" . $e->getMessage() . "</br>";
								die();
						 }
					}
					
					try{
						$pdo=$conn->query("DELETE FROM keranjang WHERE uid='$uid'");
						$pdo->execute($insert);
						 

						 header("location:/buku/index.php");
						 
						}catch(Exception $e){
						 print "koneksi atau query bermasalah" . $e->getMessage() . "</br>";
							die();
					 }
					
?>