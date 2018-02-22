<?php
require_once "header.php";

?>


<div class="container top-buffer" style="margin-bottom:20px; height:500px;">

	<div class="row">
		<div class="col col-md-4 mx-auto" >
			<form action="includes/login-check.php" method="POST">
				<div class="form-group">
						<legend>Username</legend>
						<input type="text" name="user" class="form-control" placeholder="Username" required>
						<?php if(isset($_SESSION['pesan'])){?>
						<small class="form-text text-danger">wrong username or password!</small>
						<?php 
					
						} ?>
					</div>
					
					<div class="form-group">
						<legend>Password</legend>
						<input type="password" name="pass" class="form-control" placeholder="Password" required>
						<?php if(isset($_SESSION['pesan'])){?>
						<small class="form-text text-danger">wrong username or password!</small>
						<?php 
						unset($_SESSION['pesan']);	
						} ?>
					</div>
					
					<button type="submit" class="btn btn-primary">Login</button>
			</form>
		</div>
	</div>

</div>


<?php 
require_once "footer.php";
?>