<?php include"../header.php"; include"../nav.php";
	$aru = new aru();
	require_once("../product/functions.php");
	require_once("../category/functions.php");
?>
<div class="content-wrapper">

	<?php breadcrumb("عملکرد برون پاری"); ?>
	
	<section class="content pd-btm">				
		<?php
		$sql = "select * from storage_list where st_type = 'outsourcer'";
		$res = get_select_query($sql);
		if(count($res) > 0){
			foreach($res as $row){ ?>
				<section class="box box-info">
					<div class="row">
						<div class="col-xs-12">
							<div class="box">
								<div class="box-header">
									<h3 class="box-title">عملکرد برون سپاری <?php echo $row['st_name']; ?></h3>
								</div>
								<div class="box-body">
									<table class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>ردیف</th>
												<th>ردیف فاکتور</th>
												<th>کالا</th>
												<th>دانه بندی</th>
												<th>وزن خرید</th>
												<th>تحویل شده</th>
												<th>بازده تحویل</th>
												<th>تحویل به شرکت</th>
												<th>موجودی برون سپار</th>
												<th>بازده برون سپاری</th>
											</tr>
										</thead>
										<tbody>
										<?php
										$st_id = $row['st_id'];
										$i = 1;
										$stock = new stock();
										$res1 = get_select_query("select * from bar_bring where st_id_to = $st_id group by p_id, cat_id");
										if(count($res1)>0){
											foreach($res1 as $row1) {
												$a = $stock->get_factor_buy_body_stock($row1['fb_id']);
												$b = $stock->get_outsourcer_stock($row1['fb_id'], $row['st_id']);
												$c = $a - $b;
												$d = $stock->get_recieved_stock($row['st_id'], $row1['fb_id']); 
												//$c = $a - $b;
												?>
												<tr>
													<td><?php echo per_number($i); ?></td>
													<td><?php echo per_number($row1['fb_id']); ?></td>
													<td><?php echo per_number(get_product_name($row1['p_id'])); ?></td>
													<td><?php echo per_number(get_category_name($row1['cat_id'])); ?></td>
													<td><?php echo per_number(number_format($a)); ?></td>
													<td><?php echo per_number(number_format($c)); ?></td>
													<td><?php echo per_number(floor(($c * 100) / $a)); ?></td>
													<td><?php echo per_number(number_format($d)); ?></td>
													<td><?php echo per_number(number_format($c - $d)); ?></td>
													<td><?php echo per_number(floor(($d * 100) / $c)); ?></td>
												</tr>
											<?php
											$i++;
											}
										}
										?>
								</tbody>
								<tfoot>
									<tr>
										<th>ردیف</th>
										<th>ردیف فاکتور</th>
										<th>کالا</th>
										<th>دانه بندی</th>
										<th>وزن خرید</th>
										<th>تحویل شده</th>
										<th>بازده تحویل</th>
										<th>تحویل به شرکت</th>
										<th>موجودی برون سپار</th>
										<th>بازده برون سپاری</th>
									</tr>
								</tfoot>
							</table>
						</div>	
					</div>			
				</div>		
			</div>	
		</section>
		<?php
		}
		}
		?>
	</section>
</div>

<script>
	$(function () {
		$('#example1').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": false,
			"info": true,
			"autoWidth": false
		});
	});
</script>
<?php include"../left-nav.php"; include"../footer.php"; ?>								