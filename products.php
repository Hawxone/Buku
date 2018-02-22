<?php 
$page="products"; 
include "includes/config.php";
require_once "header.php";
?>
		
		
	<main role="main" class="container top-buffer" style="padding-bottom:20px;">
	
		
	
		<div class="row">
		<?php 
		$per_halaman=12;
		$result=$conn->query("SELECT count(*) as jumlah FROM book");
		$rows=$result->fetch(PDO::FETCH_OBJ);
		$jml_data=$rows->jumlah;
		
		$jml_hal=ceil($jml_data/$per_halaman);
		
		$hal_sekarang=1;
		if(isset($_GET['page'])){
			$hal_sekarang=$_GET['page'];
		}
		
		$mulai=($hal_sekarang-1)*$per_halaman;
		
		
		
		$result=$conn->query("SELECT * FROM book limit $per_halaman offset $mulai");
		while($rows=$result->fetch(PDO::FETCH_OBJ)){
			
		$id=$rows->id;
		
		?>
		
			<div class="col col-md-3 col-sm-6 col-6" style="margin-bottom:30px;">
				<div class="img-container">
					<img class="image" src="images/books/<?php echo $rows->cover; ?>"/>
					<div class="middle">
					<a class="btn-post" href="viewpost.php?bookid=<?php echo"$id" ?>"><div class="text">See Details</div></a>
					</div>
				</div>
			</div>
			
		<?php 
		
		}
		
		?>	
			
			<div class="mx-auto">
				<ul class="pagination pagination-lg">
					<?php for($i=1;$i<=$jml_hal;$i++){?>
					<li  class="page-item <?php if($_GET['page']==$i){ echo "active"; } ?>"><a class="page-link" style="color:<?php if($_GET['page']==$i){ echo "white"; }else{ echo"grey";} ?>;" href="products.php?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
					<?php
					}
					?>
				</ul>
			</div>
		</div>
	</main>
		
		
<?php require_once "footer.php"; ?>