<?php $title = "تایید فاکتور"; include"../header.php"; include"../nav.php"; ?>
<div class="wrapper">
	<div class="content-wrapper">
		<div class="container-fluid">
			<section class="content-header">
				<div id="page-wrapper">
					<div class="row">
						<div class="col-lg-12">
							<h1 class="page-header">ثبت فاکتور جدید</h1>
						</div>
					</div>
				</div>
				<ol class="breadcrumb">
					<li><a href="<?php get_url(); ?>index.php"><i class="fa fa-dashboard"></i> خانه</a></li>
					<li><a href="#">فاکتور</a></li>
					<li class="active">تایید فاکتور</li>
				</ol>
			</section>
			<section class="content">
				<div id="details" class="col-xs-12">	
					<?php
						$fb_id = $_GET['fb_id'];
						$type_confirm = $_GET['typee'];
						$res = get_factor_body_confirm($fb_id);
						if ($type_confirm == 'verify_admin1') {
						?>
						<div>
							<div class="box">
								<div class="box-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($res as $row) { ?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $row['p_name']; ?></td>
												<td><?php echo $row['cat_name']; ?></td>
												<td><?php echo $row['p_amount']; ?></td>
												<td><?php echo $row['s_sprice']; ?></td>
												<td><?php echo $row['p_amount'] * $row['s_sprice']; ?></td>
												<td><?php echo $row['c_name'] . '   *   ' . $row['f_date']; ?></td>
											</tr>
											<?php
												$i++;
											} ?>
										</tbody>
										<tfoot>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
						<form action="list-factor.php" method="post">
							<div class="col-xs-12">
								<textarea name="details" id="details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
							</div>
							<div class="col-xs-12">
								<p>جناب مدیر در صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
								<button type="submit" class="btn btn-success" name="verift_admin1_submit" id="verift_admin1_submit">تایید</button>
								<a href="list-factor.php" class="btn btn-danger">خیر</a>
							</div>
						</form>
						<?php
						}elseif ($type_confirm == 'send_customer') {
						?>
						<div>
							<div class="box">
								<div class="box-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($res as $row) { ?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $row['p_name']; ?></td>
												<td><?php echo $row['cat_name']; ?></td>
												<td><?php echo $row['p_amount']; ?></td>
												<td><?php echo $row['s_sprice']; ?></td>
												<td><?php echo $row['p_amount'] * $row['s_sprice']; ?></td>
												<td><?php echo $row['c_name'] . '   *   ' . $row['f_date']; ?></td>
											</tr>
											<?php
												$i++;
											} ?>
										</tbody>
										<tfoot>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
						<form action="list-factor.php" method="post">
							<div class="col-xs-12">
								<textarea name="details" id="details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
							</div>
							<div class="col-xs-12">
								<p>مشتری عزیز در صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
								<button type="submit" class="btn btn-success" name="verift_admin1_submit" id="verift_admin1_submit">تایید</button>
								<a href="list-factor.php" class="btn btn-danger">خیر</a>
							</div>
						</form>
						<?php
						}elseif ($type_confirm == 'verify_customer') {
						?>
						<div>
							<div class="box">
								<div class="box-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($res as $row) { ?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $row['p_name']; ?></td>
												<td><?php echo $row['cat_name']; ?></td>
												<td><?php echo $row['p_amount']; ?></td>
												<td><?php echo $row['s_sprice']; ?></td>
												<td><?php echo $row['p_amount'] * $row['s_sprice']; ?></td>
												<td><?php echo $row['c_name'] . '   *   ' . $row['f_date']; ?></td>
											</tr>
											<?php
												$i++;
											} ?>
										</tbody>
										<tfoot>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
						<form action="list-factor.php" method="post">
							<div class="col-xs-12">
								<textarea name="details" id="details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
							</div>
							<div class="col-xs-12">
								<p>مسيول بازرگانی عزیز صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
								<button type="submit" class="btn btn-success" name="verift_admin1_submit" id="verift_admin1_submit">تایید</button>
								<a href="list-factor.php" class="btn btn-danger">خیر</a>
							</div>
						</form>
						<?php
						}elseif ($type_confirm == 'verify_docs') {
						?>
						<div>
							<div class="box">
								<div class="box-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($res as $row) { ?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $row['p_name']; ?></td>
												<td><?php echo $row['cat_name']; ?></td>
												<td><?php echo $row['p_amount']; ?></td>
												<td><?php echo $row['s_sprice']; ?></td>
												<td><?php echo $row['p_amount'] * $row['s_sprice']; ?></td>
												<td><?php echo $row['c_name'] . '   *   ' . $row['f_date']; ?></td>
											</tr>
											<?php
												$i++;
											} ?>
										</tbody>
										<tfoot>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
						<form action="list-factor.php" method="post">
							<div class="col-xs-12">
								<textarea name="details" id="details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
							</div>
							<div class="col-xs-12">
								<p>ثبت اسناد عزیز صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
								<button type="submit" class="btn btn-success" name="verift_admin1_submit" id="verift_admin1_submit">تایید</button>
								<a href="list-factor.php" class="btn btn-danger">خیر</a>
							</div>
						</form>
						<?php
						}elseif ($type_confirm == 'verify_finan') {
						?>
						<div>
							<div class="box">
								<div class="box-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($res as $row) { ?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $row['p_name']; ?></td>
												<td><?php echo $row['cat_name']; ?></td>
												<td><?php echo $row['p_amount']; ?></td>
												<td><?php echo $row['s_sprice']; ?></td>
												<td><?php echo $row['p_amount'] * $row['s_sprice']; ?></td>
												<td><?php echo $row['c_name'] . '   *   ' . $row['f_date']; ?></td>
											</tr>
											<?php
												$i++;
											} ?>
										</tbody>
										<tfoot>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
						<form action="list-factor.php" method="post">
							<div class="col-xs-12">
								<textarea name="details" id="details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
							</div>
							<div class="col-xs-12">
								<p>مسيول مالی عزیز در صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
								<button type="submit" class="btn btn-success" name="verift_admin1_submit" id="verift_admin1_submit">تایید</button>
								<a href="list-factor.php" class="btn btn-danger">خیر</a>
							</div>
						</form>
						<?php
						}elseif ($type_confirm == 'verify_admin2') {
						?>
						<div>
							<div class="box">
								<div class="box-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($res as $row) { ?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $row['p_name']; ?></td>
												<td><?php echo $row['cat_name']; ?></td>
												<td><?php echo $row['p_amount']; ?></td>
												<td><?php echo $row['s_sprice']; ?></td>
												<td><?php echo $row['p_amount'] * $row['s_sprice']; ?></td>
												<td><?php echo $row['c_name'] . '   *   ' . $row['f_date']; ?></td>
											</tr>
											<?php
												$i++;
											} ?>
										</tbody>
										<tfoot>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
						<form action="list-factor.php" method="post">
							<div class="col-xs-12">
								<textarea name="details" id="details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
							</div>
							<div class="col-xs-12">
								<p>جناب مدیر در صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
								<button type="submit" class="btn btn-success" name="verift_admin1_submit" id="verift_admin1_submit">تایید</button>
								<a href="list-factor.php" class="btn btn-danger">خیر</a>
							</div>
						</form>
						<?php
						}elseif ($type_confirm == 'verify_wait_bar') {
						?>
						<div>
							<div class="box">
								<div class="box-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($res as $row) { ?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $row['p_name']; ?></td>
												<td><?php echo $row['cat_name']; ?></td>
												<td><?php echo $row['p_amount']; ?></td>
												<td><?php echo $row['s_sprice']; ?></td>
												<td><?php echo $row['p_amount'] * $row['s_sprice']; ?></td>
												<td><?php echo $row['c_name'] . '   *   ' . $row['f_date']; ?></td>
											</tr>
											<?php
												$i++;
											} ?>
										</tbody>
										<tfoot>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
						<form action="list-factor.php" method="post">
							<div class="col-xs-12">
								<textarea name="details" id="details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
							</div>
							<div class="col-xs-12">
								<p>مسيول انبار عزیز در صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
								<button type="submit" class="btn btn-success" name="verift_admin1_submit" id="verift_admin1_submit">تایید</button>
								<a href="list-factor.php" class="btn btn-danger">خیر</a>
							</div>
						</form>
						<?php
						}elseif ($type_confirm == 'verify_ready_bar') {
						?>
						<div>
							<div class="box">
								<div class="box-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($res as $row) { ?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $row['p_name']; ?></td>
												<td><?php echo $row['cat_name']; ?></td>
												<td><?php echo $row['p_amount']; ?></td>
												<td><?php echo $row['s_sprice']; ?></td>
												<td><?php echo $row['p_amount'] * $row['s_sprice']; ?></td>
												<td><?php echo $row['c_name'] . '   *   ' . $row['f_date']; ?></td>
											</tr>
											<?php
												$i++;
											} ?>
										</tbody>
										<tfoot>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
						<form action="list-factor.php" method="post">
							<div class="col-xs-12">
								<textarea name="details" id="details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
							</div>
							<div class="col-xs-12">
								<p>مسيول انبار عزیز در صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
								<input type="text" name="verify"  id="verify" class="hidden">
								<button type="submit" class="btn btn-success" name="verift_admin1_submit" id="verift_admin1_submit">تایید</button>
								<a href="list-factor.php" class="btn btn-danger">خیر</a>
							</div>
						</form>
						<?php
						}elseif ($type_confirm == 'verify_get_sample') {
						?>
						<div>
							<div class="box">
								<div class="box-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($res as $row) { ?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $row['p_name']; ?></td>
												<td><?php echo $row['cat_name']; ?></td>
												<td><?php echo $row['p_amount']; ?></td>
												<td><?php echo $row['s_sprice']; ?></td>
												<td><?php echo $row['p_amount'] * $row['s_sprice']; ?></td>
												<td><?php echo $row['c_name'] . '   *   ' . $row['f_date']; ?></td>
											</tr>
											<?php
												$i++;
											} ?>
										</tbody>
										<tfoot>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
						<form action="list-factor.php" method="post">
							<div class="col-xs-12">
								<textarea name="details" id="details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
							</div>
							<div class="col-xs-12">
								<p>مسيول آزمایشگاه عزیز در صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
								<button type="submit" class="btn btn-success" name="verift_admin1_submit" id="verift_admin1_submit">تایید</button>
								<a href="list-factor.php" class="btn btn-danger">خیر</a>
							</div>
						</form>
						<?php
						}elseif ($type_confirm == 'verify_bar1') {
						?>
						<div>
							<div class="box">
								<div class="box-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($res as $row) { ?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $row['p_name']; ?></td>
												<td><?php echo $row['cat_name']; ?></td>
												<td><?php echo $row['p_amount']; ?></td>
												<td><?php echo $row['s_sprice']; ?></td>
												<td><?php echo $row['p_amount'] * $row['s_sprice']; ?></td>
												<td><?php echo $row['c_name'] . '   *   ' . $row['f_date']; ?></td>
											</tr>
											<?php
												$i++;
											} ?>
										</tbody>
										<tfoot>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
						<form action="list-factor.php" method="post">
							<div class="col-xs-12">
								<textarea name="details" id="details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
							</div>
							<div class="col-xs-12">
								<p>مسيول انبار عزیز در صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
								<button type="submit" class="btn btn-success" name="verift_admin1_submit" id="verift_admin1_submit">تایید</button>
								<a href="list-factor.php" class="btn btn-danger">خیر</a>
							</div>
						</form>
						<?php
						}elseif ($type_confirm == 'verify_bar2') {
						?>
						<div>
							<div class="box">
								<div class="box-body">
									<table id="example1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</thead>
										<tbody>
											<?php
											$i = 1;
											foreach ($res as $row) { ?>
											<tr>
												<td><?php echo $i; ?></td>
												<td><?php echo $row['p_name']; ?></td>
												<td><?php echo $row['cat_name']; ?></td>
												<td><?php echo $row['p_amount']; ?></td>
												<td><?php echo $row['s_sprice']; ?></td>
												<td><?php echo $row['p_amount'] * $row['s_sprice']; ?></td>
												<td><?php echo $row['c_name'] . '   *   ' . $row['f_date']; ?></td>
											</tr>
											<?php
												$i++;
											} ?>
										</tbody>
										<tfoot>
											<tr>
												<th>#</th>
												<th>نام محصول</th>
												<th>دسته بندی</th>
												<th>مقدار</th>
												<th>قیمت واحد</th>
												<th>قیمت کل</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
						<form action="list-factor.php" method="post">
							<div class="col-xs-12">
								<textarea name="details" id="details" placeholder="توضیحات لازم را اینجا بنویسید ..." rows="4" cols="50" required></textarea>
							</div>
							<input type="text" name="verify" id="verify" class="hidden" value="<?php echo $type_confirm; ?>">
							<input type="text" name="fb_id" id="fb_id" class="hidden" value="<?php echo $fb_id; ?>">
							<div class="col-xs-12">
								<p>نگهبانی عزیز در صورتی که فاکتور مورد تایید شما میباشد کلید تایید را بزنید.</p>
								<button type="submit" class="btn btn-success" name="verift_submit" id="verift_submit">تایید</button>
								<a href="list-factor.php" class="btn btn-danger">خیر</a>
							</div>
						</form>
						<?php
						}
					?>
				</div>
			</section>
		</div>
	</div>
</div>
<script src="<?php get_url(); ?>product/js/product.js"></script>
 <?php include"../left-nav.php"; include"../footer.php"; ?>