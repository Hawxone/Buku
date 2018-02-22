<?php 

include "config.php";
session_start();

$username=$_POST['user'];
$pass=$_POST['pass'];
$pass2=$_POST['pass2'];
$email=$_POST['email'];
$kelamin=$_POST['kelamin'];
$tgl=$_POST['tgl'];
$avatar=$_FILES['avatar']['name'];



if(preg_match('/^[a-zA-Z0-9]{3,}$/', $username)) {
		if(preg_match('/^[a-zA-Z0-9]{8,16}$/', $pass)) {
			if($pass2 == $pass){
				
				$result=$conn->query("SELECT count(*) FROM users where username='$username'");
					$rows=$result->fetchColumn();
					
					if($rows == 0){
						
						
						$result=$conn->query("SELECT count(*) FROM users where email='$email'");
						$rows=$result->fetchColumn();
						
						if($rows == 0){
							
							
							$target_dir = "../images/avatar/";
				$target_file = $target_dir . basename($_FILES['avatar']['name']);
				$uploadOk = 1;
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
						
						
				 $check = getimagesize($_FILES["avatar"]["tmp_name"]);
						if($check !== false) {
							
							$uploadOk = 1;
						} else {
							
							$uploadOk = 0;
						}
						
						 if ($uploadOk == 1) {
							 
							 
							$ext = substr(strrchr($avatar, "."), 1); 
							
							move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);
							
							if($ext=='jpg' || $ext=='jpeg'){
								$orig_image=imagecreatefromjpeg($target_file);
							}else if($ext=='png'){
								$orig_image=imagecreatefrompng($target_file);
							}
							
							
							$image_info = getimagesize($target_file);
							$width_orig = $image_info[0];
							$height_orig= $image_info[1];
							$width = 500;
							$height = 500;
							$destination_image=imagecreatetruecolor($width, $height);
							imagecopyresampled($destination_image, $orig_image, 0, 0 ,0 ,0, $width, $height, $width_orig, $height_orig);
							imagejpeg($destination_image, $target_file, 100);
						}
				
				
				
				if($avatar==null){
				try{
					$default= "default.png";
					$pass_enc=md5($pass);
					$conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$pdo = $conn->prepare('INSERT INTO users(username, pass, email, kelamin, tgl_lahir, avatar) VALUES( :username, :pass, :email, :kelamin, :tgl_lahir, :avatar)');
						$insert = array(':username'=>$username, ':pass'=>$pass_enc, ':email'=>$email, ':kelamin'=>$kelamin, ':tgl_lahir'=>$tgl, ':avatar'=>$default);
						$pdo->execute($insert);
						
						$_SESSION['pesan']="sukses";
						header("location:/buku/form-register.php");
					
				}catch(PDOexception $e){
					print "insert data gagal: ".$e->getMessage()."<br/>";
						die();
				}
				} else{
					try{
					$pass_enc=md5($pass);
					$conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
						$pdo = $conn->prepare('INSERT INTO users(username, pass, email, kelamin, tgl_lahir, avatar) VALUES( :username, :pass, :email, :kelamin, :tgl_lahir, :avatar)');
						$insert = array(':username'=>$username, ':pass'=>$pass_enc, ':email'=>$email, ':kelamin'=>$kelamin, ':tgl_lahir'=>$tgl, ':avatar'=>$avatar);
						$pdo->execute($insert);
						
						$_SESSION['pesan']="sukses";
						header("location:/buku/form-register.php");
					
				}catch(PDOexception $e){
					print "insert data gagal: ".$e->getMessage()."<br/>";
						die();
				}
					
					
					
				}			
							
							
							
							
						}else{
							
							$_SESSION['exist2']="exist";
							header("location:/buku/form-register.php");
							
							
						
							}
						
						
						
						
					}else{
						
						$_SESSION['exist']="exist";
						header("location:/buku/form-register.php");
					
						}
				
				
				
			}else{
				$_SESSION['confirm']="salah";
				header("location:/buku/form-register.php");
			}
		}else{
			$_SESSION['password']="salah";
			header("location:/buku/form-register.php");
		}	
}else{
	$_SESSION['username']="salah";
	header("location:/buku/form-register.php");
}




?>