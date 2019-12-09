<?php include"../header.php"; include"../nav.php"; ?>
<div class="content-wrapper">
	<?php breadcrumb("سوابق ورود"); ?>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-header">
						<h3 class="box-title">سوابق ورود</h3>
					</div>
					<div class="box-body">
						<table class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ردیف</th>
									<th>کاربر</th>
									<th>تاریخ و ساعت</th>
									<th>IP</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$i = 1;
							$list = get_select_query("select * from login_record order by lr_id desc");
							if(count($list) > 0) {
								foreach($list as $row) { ?>
									<tr>
										<td><?php echo per_number($i); ?></td>
										<td><?php echo get_user_name($row['u_id']); ?></td>
										<td><?php echo per_number($row['lr_time']); ?></td>
										<td><?php echo $row['lr_ip']; ?></td>
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
									<th>کاربر</th>
									<th>تاریخ و ساعت</th>
									<th>IP</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<?php include"../left-nav.php"; include"../footer.php"; ?>