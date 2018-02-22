<?php 
require_once "header.php";
include "includes/config.php";

?>

	<div class="container top-buffer" style="margin-bottom:50px;">
	
		<div class="row">
			<div class="col col-md-10 mx-auto">
			
			<h1 class="text-center">Keranjang</h1>
			<hr />
				<div class="text-center" style="margin-bottom:20px;">
				<a href ="products.php"><button class="btn btn-dark">kembali mencari buku</button></a>
				</div>
			<table class="table">
				<thead class="thead-light text-center">
					<tr>
						<th>Serial</th>
						<th>Title</th>
						<th>Price</th>
						<th>Options</th>
					</tr>
				</thead>
				<tbody class="text-center">
				<?php
					$uid=$_GET['uid'];
					$result=$conn->query("SELECT keranjangID,id,title,harga FROM keranjang where uid='$uid'");
					while($rows=$result->fetch(PDO::FETCH_OBJ)){
						
				?>
				
					<tr>
						<td><?php echo $rows->id; ?></td>
						<td><?php echo $rows->title; ?></td>
						<td>Rp. <?php echo number_format($rows->harga); ?></td>
						<td><a href="includes/keranjang_row_delete.php?id=<?php echo $rows->keranjangID; ?>&uid=<?php echo $uid; ?>">remove</td>
					</tr>
					<?php }
					$result=$conn->query("SELECT sum(harga) as total FROM keranjang where uid='$uid'");
					$rows=$result->fetch(PDO::FETCH_OBJ);
					?>
					<tr class="table-dark text-dark">
						<td><h5 style="margin-top:5px;">Order Total :Rp. <?php echo number_format ($rows->total); ?>,-</h5></td>
						<td></td>
						<td></td>
						<td><a class="btn btn-dark" href="includes/keranjang_clear.php?uid=<?php echo $uid; ?>">Clear</a>
						<a class="btn btn-dark" href="billing.php?invoice=<?php echo $uid; ?>">Place Order</a></td>
					</tr>
				</tbody>
				
			</table>
			
			</div>
		</div>
	
	</div>

<?php
require_once "footer.php";
 ?>