<?php 
$page="contact";

require_once "header.php";


 ?>
 
 <div class="container top-buffer" style="padding-bottom:20px;">
	<div class="row">
		<div class="col col-md-8 mx-auto">
			<form action="includes/contact.php" method="POST" >
				<div class="form-group">
					<legend>Nama</legend>
					<input type="text" name="nama" class="form-control" placeholder="nama">
					
				</div>
				
				<div class="form-group">
					<legend>Email</legend>
					<input type="email" name="email" class="form-control" placeholder="email">
					<small class="form-text text-muted"> kami tidak akan pernah menyebarluaskan email yang telah anda masukkan</small>
				</div>
				
				<div class="radio">
					<legend>Jenis Kelamin</legend>
					<div class="form-check">
					  <label class="form-check-label">
						<input type="radio" class="form-check-input" name="kelamin"  value="pria" checked>
						Pria
					  </label>
					</div>
					
					<div class="form-check">
						<label class="form-check-label">
							<input type="radio" class="form-check-input" name="kelamin"  value="wanita">
							Wanita
						</label>
					</div>
				</div>
				
				<div class="form-group">
					<legend>Tanggal Lahir</legend>
					<div class="input-group date" id="datetimepicker4" data-target-input="nearest">
                    <input type="text" name="tgl" class="form-control datetimepicker-input" data-target="#datetimepicker4" placeholder="YYYY-MM-DD"/>
						<div class="input-group-append" data-target="#datetimepicker4" data-toggle="datetimepicker">
							<div class="input-group-text"><i class="fa fa-calendar"></i></div>
						</div>
					</div>
					
				</div>
				
				<div class="form-group">
					<legend>Pesan</legend>
					<textarea name="pesan" class="form-control" rows="3"></textarea>
				 </div>
				 
				 <button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
	</div>
 </div>
 
 <?php require_once "footer.php"; ?>