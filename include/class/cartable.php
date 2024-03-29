<?php
class Cartable{

	public function get_works_manager(){
		$i = 1;
			
		$sql = "select * from factor_body fb inner join factor f on fb.f_id = f.f_id where fb_verify_admin1 = 0";
		$res = get_select_query($sql);
		if(count($res) > 0){
			foreach($res as $row){ ?>
			<tr>
				<td><?php echo per_number($i); ?></td>
				<td><?php echo per_number($row['fb_id']); ?></td>
				<td><?php echo per_number($row['f_date']); ?></td>
				<td><span class="label label-success">تایید پیش فاکتور فروش</span></td>
				<td><span class="label label-danger label-xs">ثبت بازرگانی</span></td>
				<td><a href="<?php get_url(); ?>factor/confirm-factor.php?fb_id=<?php echo $row['fb_id']; ?>&typee=fb_verify_admin1" class="btn btn-info btn-xs">بررسی</a></td>
			</tr>
			<?php
			$i++;
			}
		}

		$sql1 = "select * from factor_buy_body fbb inner join factor_buy fb on fbb.f_id = fb.f_id where fbb.fb_verify_admin1 = 0";
		$res1 = get_select_query($sql1);
		if(count($res1) > 0){
			foreach($res1 as $row1){ ?>
			<tr>
				<td><?php echo per_number($i); ?></td>
				<td><?php echo per_number($row1['fb_id']); ?></td>
				<td><?php echo per_number($row1['f_date']); ?></td>
				<td><span class="label label-warning">تایید پیش فاکتور خرید</span></td>
				<td><span class="label label-danger label-xs">ثبت بازرگانی</span></td>
				<td><a href="<?php get_url(); ?>buy/confirm-buy.php?fb_id=<?php echo $row1['fb_id']; ?>&typee=fb_verify_admin1" class="btn btn-info btn-xs">بررسی</a></td>
			</tr>
		<?php
			$i++;
			}
		}
		if($i==1){
			?>
			<tr>
				<td colspan="6" class="text-center">کارتابل شما خالی می باشد</td>
			</tr>
			<?php
		}
	}


	public function get_works_seller(){
		$i = 1;
			
		$sql = "select * from factor_body fb inner join factor f on fb.f_id = f.f_id where fb_verify_admin1 != 0 and fb_verify_customer = 0";
		$res = get_select_query($sql);
		if(count($res) > 0){
			foreach($res as $row){ ?>
			<tr>
				<td><?php echo per_number($i); ?></td>
				<td><?php echo per_number($row['fb_id']); ?></td>
				<td><?php echo per_number($row['f_date']); ?></td>
				<td><span class="label label-success">اخذ تاییده مشتری</span></td>
				<td><span class="label label-danger label-xs">تایید مدیر</span></td>
				<td><a href="<?php get_url(); ?>factor/confirm-factor.php?fb_id=<?php echo $row['fb_id']; ?>&typee=fb_verify_customer" class="btn btn-info btn-xs">بررسی</a></td>
			</tr>
			<?php
			$i++;
			}
		}

		$sql1 = "select * from factor_buy_body fbb inner join factor_buy fb on fbb.f_id = fb.f_id where fbb.fb_verify_sale > 0 and fbb.fb_outsourcing is NULL";
		$res1 = get_select_query($sql1);
		if(count($res1) > 0){
			foreach($res1 as $row1){ ?>
			<tr>
				<td><?php echo per_number($i); ?></td>
				<td><?php echo per_number($row1['fb_id']); ?></td>
				<td><?php echo per_number($row1['f_date']); ?></td>
				<td><span class="label label-warning">تعیین وضعیت بار</span></td>
				<td><span class="label label-danger label-xs">تایید مالی</span></td>
				<td><a href="<?php get_url(); ?>buy/list-buy.php" class="btn btn-info btn-xs">بررسی</a></td>
			</tr>
		<?php
			$i++;
			}
		}
		if($i==1){
			?>
			<tr>
				<td colspan="6" class="text-center">کارتابل شما خالی می باشد</td>
			</tr>
			<?php
		}
	}


	public function get_works_finan(){
		$i = 1;
			
		$sql = "select * from factor_body fb inner join factor f on fb.f_id = f.f_id where fb_verify_admin1 != 0 and fb_verify_customer > 0 and fb_verify_finan = 0";
		$res = get_select_query($sql);
		if(count($res) > 0){
			foreach($res as $row){ ?>
			<tr>
				<td><?php echo per_number($i); ?></td>
				<td><?php echo per_number($row['fb_id']); ?></td>
				<td><?php echo per_number($row['f_date']); ?></td>
				<td><span class="label label-success">تایید مالی پیش فاکتور فروش</span></td>
				<td><span class="label label-danger label-xs">تایید مشتری</span></td>
				<td><a href="<?php get_url(); ?>factor/confirm-factor.php?fb_id=<?php echo $row['fb_id']; ?>&typee=fb_verify_finan" class="btn btn-info btn-xs">بررسی</a></td>
			</tr>
			<?php
			$i++;
			}
		}

		$sql1 = "select * from factor_buy_body fbb inner join factor_buy fb on fbb.f_id = fb.f_id where fbb.fb_verify_admin1 > 0 and fbb.fb_verify_finan = 0";
		$res1 = get_select_query($sql1);
		if(count($res1) > 0){
			foreach($res1 as $row1){ ?>
			<tr>
				<td><?php echo per_number($i); ?></td>
				<td><?php echo per_number($row1['fb_id']); ?></td>
				<td><?php echo per_number($row1['f_date']); ?></td>
				<td><span class="label label-warning">تایید مالی پیش فاکتور خرید</span></td>
				<td><span class="label label-danger label-xs">تایید مدیر</span></td>
				<td><a href="<?php get_url(); ?>buy/confirm-buy.php?fb_id=<?php echo $row1['fb_id']; ?>&typee=fb_verify_finan" class="btn btn-info btn-xs">بررسی</a></td>
			</tr>
		<?php
			$i++;
			}
		}
		if($i==1){
			?>
			<tr>
				<td colspan="6" class="text-center">کارتابل شما خالی می باشد</td>
			</tr>
			<?php
		}
	}


	public function rest_hour() {
		$user = new user();
		if(isset($_POST['save_rest_hour'])){
			$r_id = $_POST['r_id'];
			$r_admin_details = $_POST['r_admin_details'];
			$r_hr_details = $_POST['r_hr_details'];
			$verify =  $_POST['verify'];
			$date = jdate('Y/n/j');
			$u_level = $user->get_current_user_level();
			if($u_level=='منابع انسانی'){
				$res2 = ex_query("update rest_hour set 	r_hr_details = '$r_hr_details' , r_hr_verify = '$verify' , r_hr_date = '$date'  where r_id = $r_id");
			}
			if($u_level=='مدیریت'){
				$res2 = ex_query("update rest_hour set 	r_admin_details = '$r_admin_details' , r_admin_verify = '$verify' , r_admin_date = '$date'  where r_id = $r_id");
			}
			?>
			<script>
				alertify.set('notifier','position', 'bottom-right');
 				alertify.success('مورد با موفقیت ثبت شد');
			</script>
			<?php
			echo '<meta http-equiv="refresh" content="2"/>';
		}

		$i = 1;
		$res = get_select_query("select * from rest_hour where r_admin_verify = 0 or r_hr_verify = 0 order by r_id desc");
		if(count($res) > 0) {
			foreach($res as $row) {
				?>
				<tr>
					<td><?php echo per_number($i); ?></td>
					<td><?php echo get_user_name($row['u_id']); ?></td>
					<td><?php echo per_number(str_replace("-", "/", $row['r_date'])); ?></td>
					<td><?php echo per_number($row['r_fromtime']); ?></td>
					<td><?php echo per_number($row['r_totime']); ?></td>
                    <td><?php echo per_number($row['r_total']); ?></td>
                    <td><?php echo per_number($row['r_details']); ?></td>
                    <td><?php $r_admin_verify = abs($row['r_admin_verify']); echo get_user_name($r_admin_verify); ?></td>
					<td><?php if($row['r_admin_verify'] > 0 ) { echo "تایید شد"; } else if($row['r_admin_verify'] < 0 ){  echo "تایید نشد"; } else { echo "نامعتبر"; } ?></td>
                    <td><?php echo per_number(str_replace("-", "/", $row['r_admin_date'])); ?></td>
                    <td><?php $r_hr_verify = abs($row['r_hr_verify']); echo get_user_name($r_hr_verify); ?></td>
					<td><?php if($row['r_hr_verify'] > 0 ) { echo "تایید شد"; } else if($row['r_hr_verify'] < 0 ){  echo "تایید نشد"; } else { echo "نامعتبر"; } ?></td>
                    <td><?php echo per_number(str_replace("-", "/", $row['r_hr_date'])); ?></td>
                    <td>
						<button class="btn btn-warning btn-xs" type="button" data-toggle="modal" data-keyboard="false" data-target="#rest_hour_modal<?php echo $row['r_id']; ?>" >تایید مرخصی</button>
						<div class="modal fade text-xs-left" id="rest_hour_modal<?php echo $row['r_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="#rest_hour_modal<?php echo $row['r_id']; ?>" style="display: none;" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<form action="" method="post" enctype="multipart/form-data">
									<input class="hidden" type="text" name="r_id" id="r_id" value="<?php echo $row['r_id']; ?>">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">×</span>
											</button>
											<h4 class="modal-title" id="myModalLabel3">تایید مرخصی</h4>
										</div>
										<div class="modal-body">
											<div class="row">
												<div class="item col-md-12">
													<div class="margin-tb input-group-prepend">
														<span class="input-group-text">توضیحات مدیر</span>
													</div>
													<input class="form-control" type="text" id="r_admin_details" name="r_admin_details" placeholder="توضیحات مدیر" value="<?php echo per_number($row['r_admin_details']); ?>">
												</div>
												<div class="item col-md-12">
													<div class="margin-tb input-group-prepend">
														<span class="input-group-text">توضیحات منابع انسانی</span>
													</div>
													<input class="form-control" type="text" id="r_hr_details" name="r_hr_details" placeholder="توضیحات منابع انسانی" value="<?php echo per_number($row['r_hr_details']); ?>">
												</div>
											</div>
											<div class="row">
												<div class="item col-md-6">
													<div class="margin-tb input-group-prepend">
														<span class="input-group-text">وضعیت</span>
													</div>
													<select class="form-control" name="verify" id="verify">
														<option value="<?php $u_id = $_SESSION['user_id']; echo $u_id; ?>">تایید</option>
														<option value="<?php echo "-" . $u_id; ?>">عدم تایید</option>
													</select>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">انصراف</button>
											<button class="btn btn-primary btn-sm" name="save_rest_hour" type="submit">ذخیره</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</td>
				</tr>
				<?php
				$i++;
			}
		}
	}



	public function rest_day() {
		$user = new user();
		$u_level = $user->get_current_user_level();
		if(isset($_POST['save_rest_day'])){
			$r_id = $_POST['r_id'];
			$r_admin_details = $_POST['r_admin_details'];
			$r_hr_details = $_POST['r_hr_details'];
			$verify =  $_POST['verify'];
			$date = jdate('Y/n/j');
			$u_level = $user->get_current_user_level();
			if($u_level=='منابع انسانی'){
				$res2 = ex_query("update rest_day set r_hr_details = '$r_hr_details' , r_hr_verify = '$verify' , r_hr_date = '$date'  where r_id = $r_id");
			}
			if($u_level=='مدیریت'){
				$res2 = ex_query("update rest_day set r_admin_details = '$r_admin_details' , r_admin_verify = '$verify' , r_admin_date = '$date'  where r_id = $r_id");
			}
			?>
			<script>
				alertify.set('notifier','position', 'bottom-right');
 				alertify.success('مورد با موفقیت ثبت شد');
			</script>
			<?php
			echo '<meta http-equiv="refresh" content="2"/>';
		}
		$i = 1;
		if($u_level=='مدیریت'){
			$res = get_select_query("select * from rest_day  where r_admin_verify = 0  order by r_id desc");
		}
		if($u_level=='منابع انسانی'){
			$res = get_select_query("select * from rest_day  where r_hr_verify = 0  order by r_id desc");
		}
		if(count($res) > 0) {
			foreach($res as $row) {
				?>
				<tr>
					<td><?php echo per_number($i); ?></td>
					<td><?php echo get_user_name($row['u_id']); ?></td>
					<td><?php echo per_number(str_replace("-", "/", $row['r_fromdate'])); ?></td>
					<td><?php echo per_number(str_replace("-", "/", $row['r_todate'])); ?></td>
                    <td><?php echo per_number($row['r_total']); ?></td>
                    <td><?php echo per_number($row['r_details']); ?></td>
                    <td><?php $r_admin_verify = abs($row['r_admin_verify']); echo get_user_name($r_admin_verify); ?></td>
					<td><?php if($row['r_admin_verify'] > 0 ) { echo "تایید شد"; } else if($row['r_admin_verify'] < 0 ){  echo "تایید نشد"; } else { echo "نامعتبر"; } ?></td>
					<td><?php echo per_number(str_replace("-", "/", $row['r_admin_date'])); ?></td>
                    <td><?php $r_hr_verify = abs($row['r_hr_verify']); echo get_user_name($row['r_hr_verify']); ?></td>
					<td><?php if($row['r_hr_verify'] > 0 ) { echo "تایید شد"; } else if($row['r_hr_verify'] < 0 ){  echo "تایید نشد"; } else { echo "نامعتبر"; } ?></td>
					<td><?php echo per_number(str_replace("-", "/", $row['r_hr_date'])); ?></td>
					<td>
						<button class="btn btn-warning btn-xs" type="button" data-toggle="modal" data-keyboard="false" data-target="#rest_day_modal<?php echo $row['r_id']; ?>" >تایید مرخصی</button>
						<div class="modal fade text-xs-left" id="rest_day_modal<?php echo $row['r_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="#rest_day_modal<?php echo $row['r_id']; ?>" style="display: none;" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<form action="" method="post" enctype="multipart/form-data">
									<input class="hidden" type="text" name="r_id" id="r_id" value="<?php echo $row['r_id']; ?>">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">×</span>
											</button>
											<h4 class="modal-title" id="myModalLabel3">تایید مرخصی</h4>
										</div>
										<div class="modal-body">
											<div class="row">
												<div class="item col-md-12">
													<div class="margin-tb input-group-prepend">
														<span class="input-group-text">توضیحات مدیر</span>
													</div>
													<input class="form-control" type="text" id="r_admin_details" name="r_admin_details" placeholder="توضیحات مدیر" value="<?php echo per_number($row['r_admin_details']); ?>">
												</div>
												<div class="item col-md-12">
													<div class="margin-tb input-group-prepend">
														<span class="input-group-text">توضیحات منابع انسانی</span>
													</div>
													<input class="form-control" type="text" id="r_hr_details" name="r_hr_details" placeholder="توضیحات منابع انسانی" value="<?php echo per_number($row['r_hr_details']); ?>">
												</div>
											</div>
											<div class="row">
												<div class="item col-md-6">
													<div class="margin-tb input-group-prepend">
														<span class="input-group-text">وضعیت</span>
													</div>
													<select class="form-control" name="verify" id="verify">
														<option value="<?php $u_id = $_SESSION['user_id']; echo $u_id; ?>">تایید</option>
														<option value="<?php echo "-" . $u_id; ?>">عدم تایید</option>
													</select>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">انصراف</button>
											<button class="btn btn-primary btn-sm" name="save_rest_day" type="submit">ذخیره</button>
										</div>
									</div>
								</form>
							</div>
						</div>
						<a class="btn btn-success btn-xs" href="<?php get_url(); ?>user/rest_print.php?r_id=<?php echo $row['r_id']; ?>">چاپ مرخصی</a>
					</td>
				</tr>
				<?php
				$i++;
			}
		}
	}



	public function apply_imprest() {
		$user = new user();
		$u_level = $user->get_current_user_level();
		if(isset($_POST['save_apply_imprest'])){
			$ai_id = $_POST['ai_id'];
			$verify =  $_POST['verify'];
			$date = jdate('Y/n/j');
			$u_level = $user->get_current_user_level();
			if($u_level=='منابع انسانی'){
				$ai_hr_details = $_POST['ai_hr_details'];
				$res2 = ex_query("update apply_imprest set ai_hr_details = '$ai_hr_details' , ai_hr_verify = '$verify' , ai_hr_date = '$date'  where ai_id = $ai_id");
			}
			if($u_level=='مدیریت'){
				$ai_admin_details = $_POST['ai_admin_details'];
				$res2 = ex_query("update apply_imprest set ai_admin_details = '$ai_admin_details' , ai_admin_verify = '$verify' , ai_admin_date = '$date'  where ai_id = $ai_id");
			}
			if($u_level=='امور مالی'){
				$ai_finan_details = $_POST['ai_finan_details'];
				$res2 = ex_query("update apply_imprest set ai_finan_details = '$ai_finan_details' , ai_finan_verify = '$verify' , ai_finan_date = '$date'  where ai_id = $ai_id");
			}
			?>
			<script>
				alertify.set('notifier','position', 'bottom-right');
 				alertify.success('مورد با موفقیت ثبت شد');
			</script>
			<?php
			echo '<meta http-equiv="refresh" content="2"/>';
		}
		$i = 1;
		$res3 = get_select_query("select * from max_loan");
		if(count($res3) > 0) {
			$mi_amount = $res3[0]['mi_amount'];
		}
		if($u_level == "امور مالی") { 
			$res = get_select_query("select * from apply_imprest  where (ai_hr_verify <> 0) and ( ai_admin_verify <> 0 or ai_amount <= $mi_amount )  order by ai_id desc");
		}
		if($u_level=='مدیریت'){
			$res = get_select_query("select * from apply_imprest  where ai_admin_verify = 0 and '$mi_amount' < ai_amount order by ai_id desc");
		}
		if($u_level=='منابع انسانی'){
			$res = get_select_query("select * from apply_imprest  where ai_hr_verify = 0  order by ai_id desc");
		}
		if(count($res) > 0) {
			foreach($res as $row) {
				?>
				<tr>
					<td><?php echo per_number($i); ?></td>
					<td><?php echo get_user_name($row['u_id']); ?></td>
					<td><?php echo per_number(str_replace("-", "/", $row['ai_date'])); ?></td>
					<td><?php echo per_number(number_format($row['ai_amount'])); ?></td>
                    <td><?php echo per_number($row['ai_details']); ?></td>
                    <td><?php if($row['ai_amount'] <= $mi_amount){ echo "نیاز ندارد"; } else { 	$ai_admin_verify = abs($row['ai_admin_verify']);  echo get_user_name($ai_admin_verify); } ?></td>
					<td><?php if($row['ai_admin_verify'] > 0 ) { echo "تایید شد"; } else if($row['ai_admin_verify'] < 0 ){  echo "تایید نشد"; } else { echo "نامعتبر"; } ?></td>
					<td><?php echo per_number(str_replace("-", "/", $row['ai_admin_date'])); ?></td>
					<td><?php $ai_hr_verify = abs($row['ai_hr_verify']); echo get_user_name($ai_hr_verify); ?></td>
					<td><?php if($row['ai_hr_verify'] > 0 ) { echo "تایید شد"; } else if($row['ai_hr_verify'] < 0 ){  echo "تایید نشد"; } else { echo "نامعتبر"; } ?></td>
                    <td><?php echo per_number(str_replace("-", "/", $row['ai_hr_date'])); ?></td>
					<td><?php $ai_finan_verify = abs($row['ai_finan_verify']);  echo  get_user_name($ai_finan_verify); ?></td>
					<td><?php echo per_number(str_replace("-", "/", $row['ai_finan_date'])); ?></td>
					<td><?php if($row['ai_finan_verify'] > 0 ) { echo "تایید شد"; } else if($row['ai_finan_verify'] < 0 ){  echo "تایید نشد"; } else { echo "نامعتبر"; } ?></td>
					<td> <?php
						if($u_level=='مدیریت' || $u_level=='منابع انسانی' ){ ?>
							<button class="btn btn-warning btn-xs" type="button" data-toggle="modal" data-keyboard="false" data-target="#apply_imprest_modal<?php echo $row['ai_id']; ?>" >تایید مساعده</button>
							<?php 
						} if($u_level == "امور مالی") { ?>
							<button class="btn btn-warning btn-xs" type="button" data-toggle="modal" data-keyboard="false" data-target="#apply_imprest_modal<?php echo $row['ai_id']; ?>" >واریز مساعده</button>
							<?php
						} ?>
						<div class="modal fade text-xs-left" id="apply_imprest_modal<?php echo $row['ai_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="#apply_imprest_modal<?php echo $row['ai_id']; ?>" style="display: none;" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<form action="" method="post" enctype="multipart/form-data">
									<input class="hidden" type="text" name="ai_id" id="ai_id" value="<?php echo $row['ai_id']; ?>">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">×</span>
											</button>
											<h4 class="modal-title" id="myModalLabel3">تایید مساعده</h4>
										</div>
										<div class="modal-body">
											<div class="row">
												<?php
												if($row['ai_amount'] <= $mi_amount) {
												} 
												else {?>
													<div class="item col-md-12">
														<div class="margin-tb input-group-prepend">
															<span class="input-group-text">توضیحات مدیر</span>
														</div>
														<input class="form-control" type="text" id="ai_admin_details" name="ai_admin_details" placeholder="توضیحات مدیر" value="<?php echo per_number($row['ai_admin_details']); ?>">
													</div>
													<?php
												} ?>
												<div class="item col-md-12">
													<div class="margin-tb input-group-prepend">
														<span class="input-group-text">توضیحات منابع انسانی</span>
													</div>
													<input class="form-control" type="text" id="ai_hr_details" name="ai_hr_details" placeholder="توضیحات منابع انسانی" value="<?php echo per_number($row['ai_hr_details']); ?>">
												</div>
												<div class="item col-md-12">
													<div class="margin-tb input-group-prepend">
														<span class="input-group-text">توضیحات امور مالی</span>
													</div>
													<input class="form-control" type="text" id="ai_finan_details" name="ai_finan_details" placeholder="توضیحات امور مالی" value="<?php echo per_number($row['ai_finan_details']); ?>">
												</div>
											</div>
											<div class="row">
												<div class="item col-md-6">
													<div class="margin-tb input-group-prepend">
														<span class="input-group-text">وضعیت</span>
													</div>
													<select class="form-control" name="verify" id="verify">
														<option value="<?php $u_id = $_SESSION['user_id']; echo $u_id; ?>">تایید</option>
														<option value="<?php echo "-" . $u_id; ?>">عدم تایید</option>
													</select>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">انصراف</button>
											<button class="btn btn-primary btn-sm" name="save_apply_imprest" type="submit">ذخیره</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</td>
				</tr>
				<?php
				$i++;
			}
		}
	}


	public function apply_loan() {
		$user = new user();
		$u_level = $user->get_current_user_level();
		if(isset($_POST['save_apply_loan'])){
			$al_id = $_POST['al_id'];
			$verify =  $_POST['verify'];
			$date = jdate('Y/n/j');
			$u_level = $user->get_current_user_level();
			if($u_level=='منابع انسانی'){
				$al_hr_details = $_POST['al_hr_details'];
				$res2 = ex_query("update apply_loan set al_hr_details = '$al_hr_details' , al_hr_verify = '$verify' , al_hr_date = '$date'  where al_id = $al_id");
			}
			if($u_level=='مدیریت'){
				$al_admin_details = $_POST['al_admin_details'];
				$res2 = ex_query("update apply_loan set al_admin_details = '$al_admin_details' , al_admin_verify = '$verify' , al_admin_date = '$date'  where al_id = $al_id");
			}
			if($u_level=='امور مالی'){
				$al_finan_details = $_POST['al_finan_details'];
				$res2 = ex_query("update apply_imprest set al_finan_details = '$al_finan_details' , al_finan_verify = '$verify' , al_finan_date = '$date'  where al_id = $al_id");
			}
			?>
			<script>
				alertify.set('notifier','position', 'bottom-right');
 				alertify.success('مورد با موفقیت ثبت شد');
			</script>
			<?php
			echo '<meta http-equiv="refresh" content="2"/>';
		}
		$i = 1;
		$res3 = get_select_query("select * from max_loan");
		if(count($res3) > 0) {
			$mi_amount = $res3[0]['mi_amount'];
		}
		if($u_level == "امور مالی") { 
			$res = get_select_query("select * from apply_loan  where (al_hr_verify <> 0) and ( al_admin_verify <> 0 or al_amount <= $mi_amount )  order by al_id desc");
		}
		if($u_level=='مدیریت'){
			$res = get_select_query("select * from apply_loan  where al_admin_verify = 0  order by al_id desc");
		}
		if($u_level=='منابع انسانی'){
			$res = get_select_query("select * from apply_loan  where al_hr_verify = 0  order by al_id desc");
		}
		if(count($res) > 0) {
			foreach($res as $row) {
				$lpc_id = $row['lpc_id'] ;
				$lpc_amount = get_var_query("select lpc_amount from loan_points_ceiling  where lpc_id = $lpc_id ");
				?>
				<tr>
					<td><?php echo per_number($i); ?></td>
					<td><?php echo get_user_name($row['u_id']); ?></td>
					<td><?php echo per_number(str_replace("-", "/", $row['al_date'])); ?></td>
					<td><?php echo per_number(number_format($lpc_amount)); ?></td>
                    <td><?php echo per_number($row['al_details']); ?></td>
                    <td><?php $al_admin_verify = abs($row['al_admin_verify']);  echo get_user_name($al_admin_verify); ?></td>
					<td><?php if($row['al_admin_verify'] > 0 ) { echo "تایید شد"; } else if($row['al_admin_verify'] < 0 ){  echo "تایید نشد"; } else { echo "نامعتبر"; } ?></td>
					<td><?php echo per_number(str_replace("-", "/", $row['al_admin_date'])); ?></td>
					<td><?php $al_hr_verify = abs($row['al_hr_verify']); echo get_user_name($al_hr_verify); ?></td>
					<td><?php if($row['al_hr_verify'] > 0 ) { echo "تایید شد"; } else if($row['al_hr_verify'] < 0 ){  echo "تایید نشد"; } else { echo "نامعتبر"; } ?></td>
                    <td><?php echo per_number(str_replace("-", "/", $row['al_hr_date'])); ?></td>
					<td><?php $al_finan_verify = abs($row['al_finan_verify']);  echo  get_user_name($al_finan_verify); ?></td>
					<td><?php echo per_number(str_replace("-", "/", $row['al_finan_date'])); ?></td>
					<td><?php if($row['al_finan_verify'] > 0 ) { echo "تایید شد"; } else if($row['al_finan_verify'] < 0 ){  echo "تایید نشد"; } else { echo "نامعتبر"; } ?></td>
					<td> <?php
						if($u_level=='مدیریت' || $u_level=='منابع انسانی' ){ ?>
							<button class="btn btn-warning btn-xs" type="button" data-toggle="modal" data-keyboard="false" data-target="#apply_loan_modal<?php echo $row['al_id']; ?>" >تایید وام</button>
							<?php 
						} if($u_level == "امور مالی") { ?>
							<button class="btn btn-warning btn-xs" type="button" data-toggle="modal" data-keyboard="false" data-target="#apply_loan_modal<?php echo $row['al_id']; ?>" >واریز وام</button>
							<?php
						} ?>
						<div class="modal fade text-xs-left" id="apply_loan_modal<?php echo $row['al_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="#apply_loan_modal<?php echo $row['al_id']; ?>" style="display: none;" aria-hidden="true">
							<div class="modal-dialog" role="document">
								<form action="" method="post" enctype="multipart/form-data">
									<input class="hidden" type="text" name="al_id" id="al_id" value="<?php echo $row['al_id']; ?>">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">×</span>
											</button>
											<h4 class="modal-title" id="myModalLabel3">تایید وام</h4>
										</div>
										<div class="modal-body">
											<div class="row">
												<?php
												if($row['al_amount'] <= $mi_amount) {
												} 
												else {?>
													<div class="item col-md-12">
														<div class="margin-tb input-group-prepend">
															<span class="input-group-text">توضیحات مدیر</span>
														</div>
														<input class="form-control" type="text" id="al_admin_details" name="al_admin_details" placeholder="توضیحات مدیر" value="<?php echo per_number($row['al_admin_details']); ?>">
													</div>
													<?php
												} ?>
												<div class="item col-md-12">
													<div class="margin-tb input-group-prepend">
														<span class="input-group-text">توضیحات منابع انسانی</span>
													</div>
													<input class="form-control" type="text" id="al_hr_details" name="al_hr_details" placeholder="توضیحات منابع انسانی" value="<?php echo per_number($row['al_hr_details']); ?>">
												</div>
												<div class="item col-md-12">
													<div class="margin-tb input-group-prepend">
														<span class="input-group-text">توضیحات امور مالی</span>
													</div>
													<input class="form-control" type="text" id="al_finan_details" name="al_finan_details" placeholder="توضیحات امور مالی" value="<?php echo per_number($row['al_finan_details']); ?>">
												</div>
											</div>
											<div class="row">
												<div class="item col-md-6">
													<div class="margin-tb input-group-prepend">
														<span class="input-group-text">وضعیت</span>
													</div>
													<select class="form-control" name="verify" id="verify">
														<option value="<?php $u_id = $_SESSION['user_id']; echo $u_id; ?>">تایید</option>
														<option value="<?php echo "-" . $u_id; ?>">عدم تایید</option>
													</select>
												</div>
											</div>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">انصراف</button>
											<button class="btn btn-primary btn-sm" name="save_apply_loan" type="submit">ذخیره</button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</td>
				</tr>
				<?php
				$i++;
			}
		}
	}

	public function sender_indicator() {
		$i = 1;
		$res = get_select_query("select * from sender_indicator where si_admin_verify = 0 order by si_id desc");
		if(count($res) > 0) {
			foreach($res as $row) {
				?>
				<tr>
					<td><?php echo per_number($i); ?></td>
					<td><?php echo $row['si_receiver']; ?></td>
					<td><?php echo per_number(str_replace("-", "/", $row['si_send_date'])); ?></td>
                    <td><?php echo per_number($row['si_description']); ?></td>
                    <td><?php echo per_number($row['si_details']); ?></td>
					<td><?php $si_admin_verify = abs($row['si_admin_verify']);  echo get_user_name($si_admin_verify); ?></td>
					<td><?php if($row['si_admin_verify'] > 0 ) { echo "تایید شد"; } else if($row['si_admin_verify'] < 0 ){  echo "تایید نشد"; } else { echo "نامعتبر"; } ?></td>
                    <td><?php echo per_number(str_replace("-", "/", $row['si_admin_date'])); ?></td>
                    <td><?php echo get_user_name($row['si_writer']); ?></td>
					<td>
						<a class="btn btn-success btn-xs" href="<?php get_url(); ?>secretariat/write_letter.php?si_id=<?php echo $row['si_id']; ?>&letter_type=<?php echo $row['si_type']; ?>">مشاهده نامه</a>
					</td>
				</tr>
				<?php
				$i++;
			}
		}
	}

	public function received_indicator() {
		$u_id = $_SESSION['user_id'];
		$i = 1;
		$aru = new aru();
		$media = $aru->get_list("media_received_indicator", "mri_id");
		$res = get_select_query("select * from received_indicator where u_id = $u_id order by ri_id desc");
		if(count($res) > 0) {
			foreach($res as $row) {
				$ri_id = $row['ri_id'];
				?>
				<tr>
					<td><?php echo per_number($i); ?></td>
					<td><?php echo per_number($row['ri_number']);  ?></td>
					<td><?php echo per_number(str_replace("-", "/", $row['ri_reg_date'])); ?></td>
					<td><?php echo $row['ri_sender']; ?></td>
					<td><?php echo per_number($row['ri_description']); ?></td>
					<td><?php echo per_number(str_replace("-", "/", $row['ri_receive_date'])); ?></td>
					<td><?php echo per_number(str_replace("-", "/", $row['ri_reference_date'])); ?></td>
					<td>
						<button class="btn  btn-warning btn-xs" type="button" data-toggle="modal" data-keyboard="false" data-target="#file_letter<?php echo $ri_id; ?>">مشاهده فایل نامه</button>
						<div class="modal fade text-xs-left" id="file_letter<?php echo $ri_id; ?>" tabindex="-1" role="dialog" aria-labelledby="#file_letter<?php echo $ri_id; ?>" style="display: none;" aria-hidden="true">
							<div class="modal-dialog" role="document" id="hse_item_edit">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
											<span aria-hidden="true">×</span>
										</button>
										<h4 class="modal-title" id="myModalLabel3">فایل نامه</h4>
									</div>
									<div class="modal-body">
										<div class="row">
											<table id="example1" class="table table-striped table-bordered table-responsive group_save_table">
												<thead>
													<tr>
														<th>ردیف</th>
														<th>تاریخ آپلود فایل</th>
														<th>لینک فایل</th>
													</tr>
												</thead>
												<tbody>
													<?php
													$k = 1;
														$roww=1;
														if($media)
														{
															
															foreach ($media as $c ) 
															{
																$rri_id = $c['ri_id'];
																$mri_id = $c['mri_id'];
																$mri_name = $c['mri_name'];
																if($ri_id == $rri_id && $mri_name == "file_letter")
																{
																?>
																<tr>
																	<td><?php echo $roww; ?></td>
																	<td><?php echo $c['mri_date']; ?></td>
																	<td><a target="_blank" href="<?php get_url(); ?>uploads/media_received_indicator/<?php echo $c['mri_link']; ?>" ><img src="<?php get_url(); ?>uploads/media_received_indicator/<?php echo $c['mri_link']; ?>" style="width:20px;heigh:20px"></a></td>
																</tr>
																<?php
																$k = 0;
																	$roww++;
																}
															}
														} 
														if($k == 1) {
															?>
															<tr>
																<td colspan="9">داده ای موجود نیست!</td>
															</tr>
															<?php
														}
													?>
												</tbody>
												<tfoot>
													<tr>
														<th>ردیف</th>
														<th>تاریخ آپلود فایل</th>
														<th>لینک فایل</th>
													</tr>
													
												</tfoot>
											</table>
										</div>
									</div>
									<div class="modal-footer">
										<center>
											<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">انصراف</button>
											<button class="btn btn-primary btn-sm" name="update-media" value="<?php echo $a['ri_id']; ?>" type="submit">ذخیره</button>
										</center>
									</div>
								</div>
							</div>
						</div>
					</td>
				</tr>
				<?php
				$i++;
			}
		}
	}




}
?>