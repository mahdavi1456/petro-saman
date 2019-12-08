<?php include"../header.php"; include"../nav.php";
	$aru = new aru();
	$u_id = $_GET['uid'];
	$asb = $aru->list_by_type('group_log', 'u_id', $u_id , 'int', 'gl_id');
	?>
	<div class="content-wrapper">
		<section class="content-header">
			<ol class="breadcrumb">
				<li><a href="<?php get_url(); ?>index.php"><i class="fa fa-dashboard"></i> خانه</a></li>
				<li><a href="#">کاربران</a></li>
				<li class="active">لیست کاربران</li>
			</ol>
		</section>

		<section class="content-header">
			<h1>گزارشات گروه</h1>
		</section>

		<section class="content">
			<div class="row">
				<div class="col-xs-12">
			  		<div class="box">
						<div class="box-header">
				  			<h3 class="box-title">لیست کاربران</h3>
						</div>
						<div class="box-body">
				  			<table id="example1" class="table table-bordered table-striped">
								<thead>
					  				<tr>
					  					<th>ردیف</th>
										<th>نام</th>
										<th>نام خانوادگی</th>
										<th>از تاریخ</th>
										<th>تا تاریخ</th>
										<th>گروه</th>
					  				</tr>
								</thead>
								<tbody>
								<?php
								if($asb){
								$row = 1;
								$count_gl= count($asb);
								for($i=0;$i<$count_gl;$i++){
									$g_id = $asb[$i]['g_id'];
									$g_name = $aru->field_by_type('group_info','g_name','g_id',$g_id,'int');
									$u_name = $aru->field_by_type('user','u_name','u_id',$u_id,'int');
									$u_family = $aru->field_by_type('user','u_family','u_id',$u_id,'int');
									?>
						  			<tr>
						  				<td><?php echo $row; ?></td>
										<td><?php echo $u_name; ?></td>
										<td><?php echo $u_family; ?></td>
										<td><?php echo per_number($asb[$i]['gl_date']); ?></td>
										<td><?php if($i==$count_gl-1){echo "الان";} else {echo per_number($asb[$i+1]['gl_date']);} ?></td>
										<td><?php echo $g_name; ?></td>
						  			</tr>
						  		<?php $row++;}
								} else { ?>
								<tr>
									<td colspan="10">داده ای موجود نیست.</td>
								</tr>
								<?php
								}
								?>
								</tbody>
								<tfoot>
					  				<tr>
					  					<th>ردیف</th>
										<th>نام</th>
										<th>نام خانوادگی</th>
										<th>از تاریخ</th>
										<th>تا تاریخ</th>
										<th>گروه</th>
					  				</tr>
								</tfoot>
				  			</table>
						</div>
			  		</div>
				</div>
		  	</div>
		</section>
	</div>
<script>
	myFormValidation = new mrmValidation();
	myFormValidation.notEmpty('#myForm');
</script>
<?php include"../left-nav.php"; include"../footer.php"; ?>