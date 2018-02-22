<?php
require_once "header.php";
include "includes/config.php";



 ?>
 
 <div class="container top-buffer" style="margin-bottom:50px;">
	<div class="row">
		<div class="col col-md-8 mx-auto">
		<h1 class="text-center">Rent History</h1>
			<hr />
			<table class="table top-buffer">
				<thead class="thead-light text-center">
					<tr>
						<th>Kode Order</th>
						<th>Tanggal Order</th>
						<th>Total Sewa</th>
					</tr>
				</thead>
				<tbody class="text-center">
				<?php 
				$uid=$_GET['uid'];
				$result = $conn->query("SELECT * FROM history where uid='$uid' order by invoiceID desc");
				while($rows=$result->fetch(PDO::FETCH_OBJ)){
				$invoice=$rows->invoiceID;
				?>
					<tr>
						<td><a href="order_detail.php?invoice=<?php echo $invoice; ?>"><?php echo $rows->invoiceID; ?></a></td>
						<td><?php echo $rows->tgl_pesan; ?></td>
						<td>Rp. <?php echo number_format($rows->total); ?>,-</td>
					</tr>
					
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
 </div>
 
 <?php 
 
 require_once "footer.php";
 ?>