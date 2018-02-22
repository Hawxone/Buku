<!DOCTYPE html>
<?php 
session_start();
?>
<html>
	<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Buku.Com - number one choice online learning  </title>
		<link rel="stylesheet" href="css/buku.css" />
		<link rel="stylesheet" href="css/bootstrap.css" />
		<link rel="stylesheet" href="css/font-awesome.css" />
		
		<script src="js/jquery-3.2.1.min.js"></script>
		<script src="js/bootstrap.js"></script>
		<script src="js/moment.js"></script>
		
		  <script type="text/javascript" src="js/tempusdominus-bootstrap-4.min.js"></script>
  <link rel="stylesheet" href="css/tempusdominus-bootstrap-4.min.css" />
  
	</head>
	
	<body>
	
	
	
		<div class="d-none d-lg-block">
		
			<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position:absolute; left:75%;">
				<div class="container-fluid">
					
					
					
					
						<ul	class="navbar-nav ml-auto">
						
							<?php
							if(isset($_SESSION['username'])){ ?>
								<li class="nav-item">
								<a class="nav-link"  href="#" data-toggle="dropdown">Welcome, <?php echo $_SESSION['username']; ?>  <i class="fa fa-caret-down" aria-hidden="true"></i></a>
									<div class="dropdown-menu dropdown-menu-left" style="width:100%; ">
									  <a class="dropdown-item" href="profile.php?uid=<?php echo $_SESSION['uid']; ?>">Akunku</a>
									  <a class="dropdown-item" href="keranjang.php?uid=<?php echo $_SESSION['uid']; ?>">(<?php
										include "includes/config.php";
										$uid2=$_SESSION['uid'];
										$result2=$conn->query("SELECT count(*) as total FROM keranjang where uid='$uid2'");
										$rows2=$result2->fetch(PDO::FETCH_OBJ);

									  echo $rows2->total; ?>) books in rent cart</a>
									  <a class="dropdown-item" href="history_display.php?uid=<?php echo $uid2 ?>">View rent history</a>
							</li>
							<b class="nav-link">|</b>
							<li class="nav-item">
								<a class="nav-link"  href="includes/logout.php">Logout</a>
							</li>
							
								
							<?php }else{ ?>
								
								<li class="nav-item">
								<a class="nav-link"  href="form-login.php">Sign In</a>
							</li>
							
								<b class="nav-link">|</b>
							
							<li class="nav-item">
								<a class="nav-link" href="form-register.php">Buat Akun</a>
							</li>
								
							<?php }
							?>
							
							
						</ul>
					
				</div>
			</nav>
		
			<img style="width:100%; height:400px; display:block; z-index:-5;" src="images/header.png">
		</div>
		<header>
			<nav class="navbar navbar-expand-lg navbar-light bg-faded">
				<div class="container-fluid">
					
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>
					
					<div class="collapse navbar-collapse" id="navbarNavDropdown">
						<ul	class="navbar-nav mx-auto">
							<li class="nav-item <?php if($page=='home'){?> active <?php }?>" >
								<a class="nav-link" style="font-size:20px;" href="index.php">Home<span class="sr-only">(current)</span></a>
							</li>
							
							<li class="nav-item <?php if($page=='products'){?> active <?php }?>">
								<a class="nav-link" style="font-size:20px;" href="products.php">Products</a>
							</li>
							
							<li class="nav-item <?php if($page=='contact'){?> active <?php }?>">
								<a class="nav-link" style="font-size:20px;" style="font-size:20px;" href="form-contact.php">Contact Us</a>
							</li>
							
							<li class="nav-item <?php if($page=='about'){?> active <?php }?>">
								<a class="nav-link" style="font-size:20px;" href="about.php">About Us</a>
							</li>
							
							<div class=" d-lg-none d-xl-none">
							<hr style="border:1px solid grey; "/>
							<?php
							if(isset($_SESSION['username'])){ ?>
								<li class="nav-item">
									<a class="nav-link" style="font-size:20px;" href="includes/logout.php">(<?php echo $_SESSION['username']; ?>) logout</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link" style="font-size:20px;" href="profile.php?uid=<?php echo $_SESSION['uid']; ?>">Akunku</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link" style="font-size:20px;" href="keranjang.php?uid=<?php echo $_SESSION['uid']; ?>">(<?php
										include "includes/config.php";
										$uid2=$_SESSION['uid'];
										$result2=$conn->query("SELECT count(*) as total FROM keranjang where uid='$uid2'");
										$rows2=$result2->fetch(PDO::FETCH_OBJ);

									  echo $rows2->total; ?>) books in rent cart</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link" style="font-size:20px;" href="history_display.php?uid=<?php echo $uid2 ?>">View rent history</a>
								</li>
								
								
							<?php }else{ ?>
								
								<li class="nav-item">
									<a class="nav-link" style="font-size:20px;" href="form-login.php">Sign In</a>
								</li>
								
								<li class="nav-item">
									<a class="nav-link" style="font-size:20px;" href="form-register.php">Buat Akun</a>
								</li>
								
								
							<?php }
							?>
								
							</div>
						</ul>
					</div>
				</div>
			</nav>
		</header>