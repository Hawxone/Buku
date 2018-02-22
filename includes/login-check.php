<?php
include "config.php";
session_start();
$username=$_POST['user'];
$pass= md5($_POST['pass']);
				
					$result=$conn->query("SELECT count(*) FROM users where username='$username' and pass='$pass'");
					$rows=$result->fetchColumn();
					
					
					if($rows == 0){
						$_SESSION['pesan']="salah";
						header("location:/buku/form-login.php");
					}else{
						$pass_enc= md5($pass);
						$result=$conn->query("SELECT * FROM users where username='$username' and pass='$pass'");
						$rows=$result->fetch(PDO::FETCH_OBJ);
						$avatar=$rows->avatar;
						$uid=$rows->uid;
						$_SESSION['username']=$username;
						$_SESSION['avatar']=$avatar;
						$_SESSION['uid']=$uid;
						header("location:/buku/index.php");
						
					}

?>