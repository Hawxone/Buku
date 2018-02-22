<?php

include "includes/config.php";
include "header.php";

?>

<div class="container top-buffer" style="padding-bottom:20px;">
	<?php 
	
	if(isset($_SESSION['pesan'])){
		$id=$_SESSION['pesan']; 
		unset($_SESSION['pesan']);
	}else{
	$id=$_GET['bookid']; 
	
	}
	

	$result=$conn->query("SELECT * FROM book where id=$id");
	$rows=$result->fetch(PDO::FETCH_OBJ);
	?>

	<div class="row">
		<div class="col col-md-8" >
			<h5>Judul : <?php echo $rows->title; ?></h5>
			<h5>Harga sewa: Rp. <?php echo number_format($rows->harga); ?>,- </h5>
			<h5>Review :</h5><br />
			<?php echo $rows->review; ?>
			
			<?php if(isset($_SESSION['username'])){ ?>
				<div class="bottom-div">
					<a href="includes/insert_keranjang.php?id=<?php echo $rows->id;?>&title=<?php echo urlencode($rows->title); ?>&harga=<?php echo $rows-> harga;?>&uid=<?php echo $_SESSION['uid']; ?>&image=<?php echo $rows->cover; ?>"><button class="btn btn-primary" >Masukkan Keranjang	</button></a>
					<?php

					if(isset($_SESSION['beli'])){?>
					<small>buku telah dimasukkan ke keranjang</small>
					
					<?php
					unset($_SESSION['beli']);
					}else{} ?>
				
				
				</div>
			<?php }else{}?>
			
		</div>
		
		<div class="col col-md-3">
		<div class="img-container">
				<img class="image-viewpost" src="images/books/<?php echo $rows->cover; ?>">
			</div>
		</div>
	</div>
	
	<?php 
	if(isset($_SESSION['username'])){
	?>
	<hr />
	
	<div class="row">
		<div class="col col-md-12">
			<h5>Beri Komentar :</h5>
			<form action="includes/komentar.php" id="komentar" method="POST">
				<div class="form-group">
					<textarea name="komentar" class="form-control" rows="3"></textarea>
				 </div>
				 <input type="hidden" name="id" value="<?php echo $id; ?>" >
				 <input type="hidden" name="username" value="<?php echo $_SESSION['username']; ?>" >
				 <input type="hidden" name="avatar" value="<?php echo $_SESSION['avatar']; ?>" >
				<?php include "includes/Mobile_Detect.php";
						$detect = new Mobile_Detect;
						
						if($detect->isMobile()){ ?>
							<button type="submit" class="btn btn-primary">Submit</button>
					<?php	}else{

				?>
				<button type="submit" id="submit" class="btn btn-primary">Submit</button>
						<?php } ?>
			</form>
		</div>
	</div>
	<?php } ?>
	
	<hr />
	
	<div class="row">
		<div class="col col-md-12">
		<h5>Komentar : </h5>
		<div id="pagination_data">
	
		</div>
		
	
		
		</div>
	</div>	
	
	
	



</div>
<?php require_once "footer.php"; ?>

<script>
	$(document).ready(function(){
		load_data();
		
		
			function load_data(pages)
			{
				var id=<?php echo $id; ?>;
				$.ajax({
					url:"includes/komentar-ajax.php",
					method:"POST",
					data:{page:pages,bookid:id},
					
					success:function(data){
						 $('#pagination_data').html(data);	  
							
							
							// remove active class from other buttons
							$('.page-item').removeClass("active");
							// add active class to your button 
							$("#"+pages).closest(".page-item").addClass('active');
							
							
							
									
								}
				});
			}
			
			$(document).on('click','.page-item', function(e){
				
				
				var pages = $(this).attr("id");
				
				load_data(pages);		
				
					
				
			});
			
			
			
			$('#submit').click(function(e){ 
			var url="http://localhost/buku/includes/komentar.php";
			
				$.ajax({
					
					type: "POST",
					url:url,
					data: $("#komentar").serialize(),
					success:function(data)
					{
						
							load_data();
						
						
							function load_data(pages)
							{
								var id=<?php echo $id; ?>;
								$.ajax({
									url:"includes/komentar-ajax.php",
									method:"POST",
									data:{page:pages,bookid:id},
									
									success:function(data){
										 $('#pagination_data').html(data);
										 
								  
											
											$('.page-link').removeClass("active");
											
											$("#"+pages).closest(".page-item").addClass('active');
										
									}
								});
							}
							
							
						
						
					}
				});
				event.preventDefault();
				
				$("#beli").click(function(e){
					return false;
				});
			});

			
			
		
	});
</script> 