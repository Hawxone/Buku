<?php 
require_once "header.php";
?>
	<div class="container top-buffer" style="margin-bottom:50px;">
		<div class="row">
			<div class="col col-md-5 mx-auto">
			<h1 class="text-center">Billing Info</h1>
			<hr />
				<div class="text-center">
				
				<?php
					$uid=$_GET['invoice'];
					$result=$conn->query("SELECT sum(harga) as total FROM keranjang where uid='$uid'");
					$rows=$result->fetch(PDO::FETCH_OBJ);
				?>
				
					<b>Total Pemesanan :</b> Rp. <?php echo number_format($rows->total);  ?>,-<br /><br />	
					<b>Konfirmasi Sekarang?</b><a href="includes/history.php?uid=<?php echo $uid; ?>"><button class="btn btn-primary" style="margin-right:5px;margin-left:5px;">Ya</button></a><a href="keranjang.php?uid=<?php echo $uid; ?>"><button class="btn btn-primary">Tidak</button></a>
				</div>
			</div>
		</div>
	</div>

<?php
require_once "footer.php"; 
?>