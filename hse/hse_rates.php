<?php include"../header.php"; include"../nav.php"; $aru = new aru(); ?>
	<div class="content-wrapper">
		<?php breadcrumb("امتیازدهی" , "index.php"); ?>

		<section class="content">
			<div id="details" class="col-xs-12 no-padd">
			<section class="box">
				<div class="box-header with-border">
					<div class="box-body">
					<form action="" method="post">
						<div class="row">
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">انتخاب گروه</span>
									<select name="group" class="form-control">
										<?php
										$all_groups = list_group();
										foreach ($all_groups as $a_group) {
											?>
											<option <?php if(isset($_POST['group']) && $_POST['group']==$a_group['g_id']){echo "selected";} ?> value="<?php echo $a_group['g_id']; ?>"><?php echo $a_group['g_name']; ?></option>
											<?php
										}
										?>
									</select>
								</div>
							</div>
							<div class="item col-md-4">
								<div class="margin-tb input-group-prepend">
									<span class="input-group-text">انتخاب تاریخ</span>
									<input name="date" type="text" autocomplete="off" class="form-control datepickerClass" value="<?php if(isset($_POST["date"])) echo $_POST["date"]; ?>">
								</div>
							</div>
							<div class="sch_submit_c item col-md-2">
								<button type="submit" class="btn btn-success btn-sm">انتخاب</button>
							</div>
						</div>
					</form>
					</div>
				</div>
			</section>
				

				<?php
				if(isset($_POST["date"]) && isset($_POST["group"])){
					$hr_date = $_POST["date"];
					$group_id = $_POST["group"];
					?>
					<div class="row">
						<div class="col-xs-12 table-responsive">
							<table class="col-xs-12 table table-striped table-bordered table-responsive sch_save_table">
								<thead>
									<tr>
										<th>شخص / آیتم</th>
										<?php
										$hse_items = $aru->list_by_type("hse_item", "h_status", 1, "int", "h_id");
										foreach ($hse_items as $hse_item) {
											$h_name = $hse_item["h_name"];
											echo "<td>$h_name</td>";
										}
										?>
									</tr>
								</thead>
								<tbody>
									<?php
									$users = $aru->list_by_type("user", "u_group", $group_id, "int", "u_id");
									foreach ($users as $user) {
										$u_id = $user["u_id"];
										?>
										<tr>
											<td><?php echo $user["u_name"] . " " . $user["u_family"]; ?></td>
											<?php
											foreach ($hse_items as $hse_item) {
												$h_id = $hse_item["h_id"];
												$hr_rate = get_var_query("select hr_rate from hse_rates where hr_date = '$hr_date' and u_id = $u_id and h_id = $h_id");
												if($hr_rate){
													echo "<td><input type='checkbox' class='hse_rating' data-h_id='$h_id' data-u_id='$u_id' data-hr_date='$hr_date' checked></td>";
												}else{
													echo "<td><input type='checkbox' class='hse_rating' data-h_id='$h_id' data-u_id='$u_id' data-hr_date='$hr_date'></td>";
												}
											}
											?>
										</tr>
										<?php
									}
									?>
								</tbody>
								<tfoot>
									<tr>
										<th>شخص / آیتم</th>
										<?php
										foreach ($hse_items as $hse_item) {
											$h_name = $hse_item["h_name"];
											echo "<td>$h_name</td>";
										}
										?>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
					<?php
				}
				?>
			</div>
		</section>
	</div>
<script src="<?php get_url(); ?>/hse/js/script.js"></script>
<?php include"../left-nav.php"; include"../footer.php"; ?>
