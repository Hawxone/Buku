
<?php
		include "config.php";
		 
		
		$id=$_POST['bookid'];
		$result=$conn->query("SELECT count(*) FROM komentar where id=$id");
		$rows=$result->fetchColumn();
		
		if($rows == 0){
			echo "Belum ada komentar";
		}else{
			
			$per_halaman=5;
			$page = ''; 
			
			
			$result=$conn->query("SELECT count(*) as jumlah FROM komentar where id='$id'");
			$rows=$result->fetch(PDO::FETCH_OBJ);
			$jml_data=$rows->jumlah;
			
			$jml_hal=ceil($jml_data/$per_halaman);
			
			
			if(isset($_POST['page'])){
				$page=$_POST['page'];
			}else{
				$page = 1; 
			}
			
			$mulai=($page-1)*$per_halaman;
			
			
			
			$result=$conn->query("SELECT * FROM komentar where id=$id order by cid desc limit $per_halaman offset $mulai");
			while($rows=$result->fetch(PDO::FETCH_OBJ)){ ?>
				
				<div class="row" style="margin-bottom:15px; margin-top:15px;">
					<div class="col col-md-1 col-sm-2 col-xs-2 col-2" >
						<div class="icon">
							<img  style="width:100%; border:1px solid black;" src="images/avatar/<?php echo $rows->avatar; ?>">
						</div>
					</div>
					<div class="col col-md-10 col-sm-10 col-xs-10">
						<b><?php echo $rows->username; ?></b><br/>
						<?php echo $rows->komentar; ?>
					</div>
					
					
					
					
				</div>
				
			<?php }
			
		
			}
		
		?>
		<?php 
		
		$result=$conn->query("SELECT count(*) FROM komentar where id=$id");
		$rows=$result->fetchColumn();
		
		if($rows == 0){ }else{



			?>
		<div class="row">
			<div class="mx-auto">
				<ul class="pagination" id="pagination">
					<?php for($i=1;$i<=$jml_hal;$i++){?>
					
					<li class="page-item" id="<?php echo $i; ?>"><button id="<?php echo $i; ?>" class="page-link"><?php echo $i; ?></button></li>
					<?php
					}
		}
					?>
				</ul>
			</div>
		</div>
	