<?php 
require_once "header.php";


?>
<div class="container top-buffer" style="padding-bottom:20px;">
	<div class="row">
		<div class="col col-md-6 mx-auto">
			<form action="includes/register.php" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<legend>Username</legend>
					<input type="text" name="user" class="form-control" placeholder="Username" required>
					<?php if(isset($_SESSION['username'])){?>
					<small class="form-text text-danger">must contain combination of letters and number!</small>
					<?php 
					unset($_SESSION['username']);	
					} ?>
					
					<?php if(isset($_SESSION['exist'])){?>
					<small class="form-text text-danger">username already exist!</small>
					<?php 
					unset($_SESSION['exist']);	
					} ?>
					
				</div>
				
				<div class="form-group">
					<legend>Password</legend>
					<input type="password" name="pass" class="form-control" placeholder="password" required>
					<?php if(isset($_SESSION['password'])){?>
					<small class="form-text text-danger"> 8~16 Alphanumeric password required!</small>
					<?php 
					unset($_SESSION['password']);	
					} ?>
				</div>
				
				<div class="form-group">
					<legend>Confirm Password</legend>
					<input type="password" name="pass2" class="form-control" placeholder="confirm password" required>
					<?php if(isset($_SESSION['confirm'])){?>
					<small class="form-text text-danger"> passwords don't match!</small>
					<?php 
					unset($_SESSION['confirm']);	
					} ?>
					
				</div>
				
				<div class="form-group">
					<legend>Email</legend>
					<input type="email" name="email" class="form-control" placeholder="email" required>
					<small class="form-text text-muted"> kami tidak akan pernah menyebarluaskan email yang telah anda masukkan</small>
					
					<?php if(isset($_SESSION['exist2'])){?>
					<small class="form-text text-danger">email already exist!</small>
					<?php 
					unset($_SESSION['exist2']);	
					} ?>
				</div>
				
				
				
				<div class="radio">
					<legend>Jenis Kelamin</legend>
					<div class="form-check">
					  <label class="form-check-label">
						<input type="radio" class="form-check-input" name="kelamin"  value="pria" checked required>
						Pria
					  </label>
					</div>
					
					<div class="form-check">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="kelamin"  value="wanita" required>
							Wanita
						</label>
					</div>
				</div>
				
				<div class="form-group">
					<legend>Tanggal Lahir</legend>
					<div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                    <input type="text" name="tgl" class="form-control datetimepicker-input" data-target="#datetimepicker4" placeholder="YYYY-MM-DD" required />
						<div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
							<div class="input-group-text"><i class="fa fa-calendar"></i></div>
						</div>
					</div>
					
				</div>
				
				<div tabindex="1" class="form-group z">
					<legend>Upload Avatar Image*</legend>
					<input type="file" name="avatar" class="form-control">
					<small class="form-text text-muted">*Optional</small>
				</div>
				
				<button type="submit" onclick="$(.z)[0].focus()" class="btn btn-primary">Daftar</button>
				<?php if(isset($_SESSION['pesan'])){?>
					<small class="form-text text-success"> your account has been made! please go to login page to continue</small>
					<?php 
					unset($_SESSION['pesan']);	
					} ?>
			</form>
		</div>
	</div>
</div>

<script>
	
</script>

<?php 
require_once "footer.php";
?>