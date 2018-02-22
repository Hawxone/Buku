<?php 
require_once "header.php";
?>

	<div class="container top-buffer" style="margin-bottom:50px;">
		<div class="row">
			<div class="col col-md-12">
			<h1 class="text-center">Detail Order</h1>
			<hr />
			
			<?php
					include "includes/config.php";
					$invoice=$_GET['invoice'];
					$result=$conn->query("SELECT * FROM detail_history where invoiceID='$invoice'");
					$rows=$result->fetch(PDO::FETCH_OBJ)
					?>
			
			
			<b>Kode Invoice No :</b> <?php echo $rows->invoiceID; ?><br/>
			<b>Tanggal Order   :</b><?php echo $rows->tgl_pesan; ?>
				<table class="table top-buffer">
					<thead class="thead-light text-center">
						<tr>
							<th>Kode Buku</th>
							<th>Cover Buku</th>
							<th>Judul Buku</th>
							<th>Link Download</th>
							<th>Expire Date</th>
							<th>Harga Buku</th>
						</tr>
					</thead>
					<tbody class="text-center">
					
					<?php
					include "includes/config.php";
					$invoice=$_GET['invoice'];
					$result=$conn->query("SELECT * FROM detail_history where invoiceID='$invoice'");
					while($rows=$result->fetch(PDO::FETCH_OBJ)){
					?>
					
						<tr>
							<td><?php echo $rows->id; ?></td>
							<td><img src="images/books/<?php echo $rows->image;  ?>"/></td>
							<td><?php echo $rows->title; ?></td>
							<td><?php 
								$result2=$conn->query("SELECT * FROM detail_history WHERE tgl_pesan > DATE_SUB(NOW(), INTERVAL 1 YEAR) and invoiceID='$invoice'");
									$rows2=$result2->fetchColumn();
								
								if($rows2==0){
									echo "expired";
								}else{ ?>
									<a href="images/books/<?php echo $rows->image; ?>" download>Download</a>
								<?php } ?>
							</td>
							<td><?php echo $rows->expiry; ?></td>
							<td>Rp.<?php echo number_format($rows->harga); ?>,-</td>
						</tr>
					<?php } ?>
						<tr class="table-dark text-dark">
							<?php 
								$result=$conn->query("SELECT sum(harga) as total FROM detail_history where invoiceID='$invoice'");
								$rows=$result->fetch(PDO::FETCH_OBJ)
							?>
							<td colspan="6">Total : Rp. <?php echo number_format($rows->total); ?>,-</td>
							
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>

<?php
require_once "footer.php";
?>