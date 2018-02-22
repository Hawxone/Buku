<?php
require_once "header.php";
 ?>
 
 <div class="container top-buffer" style="margin-bottom:50px;">
	<div class=" row">
		<div class="col col-md-10 mx-auto">
			<h1 class="text-center">Informasi Akun</h1>
			<hr />
			<div class="row top-buffer">
				
				<?php
				include "includes/config.php";
				
				$uid=$_GET['uid'];
				
				$result=$conn->query("select * from users where uid='$uid'");
				$rows=$result->fetch(PDO::FETCH_OBJ);
				?>
				
				<div class="col col-md-4 mx-auto">
						<img class="profile" src="images/avatar/<?php echo $rows->avatar; ?>">
				</div>
				<div class="col col-md-7 ">
						<b>UserID :</b> <?php echo $rows->uid; ?><br />
						<b>Username :</b> <?php echo $rows->username; ?><br />
						<b>User Email :</b> <?php echo $rows->email; ?><br />
						<b>Birth Date :</b> <?php echo $rows->tgl_lahir; ?><br />
				</div>
				
				
			</div>
		</div>
	</div>
 </div>
 
 <?php
 require_once "footer.php";
 ?>