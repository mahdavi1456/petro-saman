<?php include"../header.php"; include"../nav.php"; 
	$u_id = $_SESSION['user_id']; 
	$media = new media(); $user = new user();
	$u_level = $user->get_current_user_level();
	$aru = new aru();
	if($u_level == "مدیریت" || $u_level == "منابع انسانی"  || $u_level == "امور مالی"){
		$person_select = get_select_query("select * from user");
	}
	else{
		$person_select = get_select_query("select * from user where u_id = $u_id ");
	}
	?>
	<div class="content-wrapper">
		<?php breadcrumb("گزارش مرخصی ها" , "index.php"); ?>
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
			  		<?php
			  		if(isset($_POST['add-rest_day'])){
			  			$aru->add('rest_day', $_POST);
			  		}
			  		if(isset($_POST['add-rest_hour'])){
			  			$aru->add('rest_hour', $_POST);
			  		}
			  		?>
			  		<div class="box">
			  			<div class="box-header with-border">
                            <h3 class="box-title">لیست درخواست های مرخصی</h3>
                        </div>
			  			<div class="box-body">
			  				<form action="" method="post">
				  				<div class="row">
				  					<div class="item col-md-3">
					  					<label>انتخاب شخص</label>
										<select name="u_id" class="form-control select2">
											<?php
											if(count($person_select) > 0) {
												foreach($person_select as $ps) { ?>
													<option value="<?php echo $ps['u_id']; ?>"><?php echo $ps['u_name'] . " " . $ps['u_family']; ?></option>
												<?php
												}
											}
											?>
										</select>
				  					</div>
				  					<div class="item col-md-3">
				  						<label>نوع مرخصی</label>
				  						<select name="r_type" class="form-control">
				  							<option value="ساعتی">ساعتی</option>
				  							<option value="روزانه">روزانه</option>
				  						</select>
				  					</div>
				  					<div class="item col-md-3">
										<label>از تاریخ</label>
										<input type="text" name="r_fromdate" placeholder="از تاریخ" class="date_picker form-control" autocomplete="off">
									</div>
									<div class="item col-md-3">
										<label>تا تاریخ</label>
										<input type="text" name="r_todate" placeholder="تا تاریخ" class="date_picker form-control" autocomplete="off">
									</div>
				  					<div class="col-md-12 text-center">
				  						<button name="search" class="btn btn-success">گزارش گیری</button>
				  					</div>
				  				</div>
			  				</form>
			  				<hr>
			  				<?php
			  				if(isset($_POST['search'])){
			  					$i = 1;
			  					$u_id = $_POST['u_id'];
			  					$r_type = $_POST['r_type'];
			  					$r_fromdate = $_POST['r_fromdate'];
			  					$r_todate = $_POST['r_todate'];
			  					if($r_type == "ساعتی"){
			  						$sql = "select * from rest_hour where u_id = $u_id ";
			  						if($r_fromdate != "" && $r_todate !="") {
			  							$sql .= "and r_date > '$r_fromdate' and r_date < '$r_todate'";
			  						}
			  						$person_list = get_select_query($sql);
			  						?>
			  						<table class="table table-bordered table-striped">
			  							<thead>
				  							<tr>
				  								<th>ردیف</th>
				  								<th>درخواست دهنده</th>
				  								<th>نوع مرخصی</th>
				  								<th>تاریخ</th>
				  								<th>از ساعت</th>
				  								<th>تا ساعت</th>
				  								<th>به مدت</th>
				  								<th>توضیحات</th>
				  							</tr>
			  							</thead>
			  							<tbody>
			  							<?php
			  							if(count($person_list) > 0) {
			  								foreach($person_list as $pl) { ?>
				  								<tr>
				  									<td><?php echo per_number($i); ?></td>
				  									<td><?php echo $pl['u_id']; ?></td>
				  									<td><?php echo $pl['r_type']; ?></td>
				  									<td><?php echo per_number($pl['r_date']); ?></td>
				  									<td><?php echo per_number($pl['r_fromtime']); ?></td>
				  									<td><?php echo per_number($pl['r_totime']); ?></td>
				  									<td><?php echo per_number($pl['r_total']); ?></td>
				  									<td><?php echo per_number($pl['r_details']); ?></td>
				  								</tr>
				  								<?php
				  								$i++;
				  							} 
				  						} ?>
			  							</tbody>
			  						</table>
			  					<?php
			  					} else {
			  						$sql = "select * from rest_day where u_id = $u_id ";
			  						if($r_fromdate != "" && $r_todate != "") {
			  							$sql .= "and (r_fromdate > '$r_fromdate' and r_fromdate < '$r_todate') or (r_todate > '$r_frodate' and r_todate < '$r_todate')";
			  						}
			  						$person_list = get_select_query($sql); ?>
			  						<table class="table table-bordered table-striped">
			  							<thead>
				  							<tr>
				  								<th>ردیف</th>
				  								<th>درخواست دهنده</th>
				  								<th>نوع مرخصی</th>
				  								<th>از تاریخ</th>
				  								<th>تا تاریخ</th>
				  								<th>به مدت</th>
				  								<th>مقصد</th>
				  								<th>توضیحات</th>
				  							</tr>
			  							</thead>
			  							<tbody>
			  							<?php
			  							if(count($person_list) > 0) {
			  								foreach($person_list as $pl) { ?>
				  							<tr>
				  								<td><?php echo per_number($i); ?></td>
				  								<td><?php echo $pl['u_id']; ?></td>
				  								<td><?php echo $pl['r_type']; ?></td>
					  							<td><?php echo per_number($pl['r_fromdate']); ?></td>
				  								<td><?php echo per_number($pl['r_todate']); ?></td>
				  								<td><?php echo per_number($pl['r_total']); ?></td>
				  								<td><?php echo per_number($pl['r_destination']); ?></td>
				  								<td><?php echo per_number($pl['r_details']); ?></td>
				  							</tr>
				  								<?php
				  								$i++;
				  							} 
				  						} ?>
			  							</tbody>
			  						</table>
			  						<?php
			  					}	
			  				}
			  				?>
			  			</div>
			  		</div>
				</div>
		  	</div>
		</section>
	</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#rest-type').change(function(){
				var v = $(this).find('option:selected').val();
				if(v == "ساعتی"){
					$('#hourly-form').show();
					$('#daily-form').hide();
				} else {
					$('#hourly-form').hide();
					$('#daily-form').show();
				}
			});
		});
	</script>
<?php include"../left-nav.php"; include"../footer.php"; ?>