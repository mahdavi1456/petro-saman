<?php include"../header.php"; include"../nav.php"; $aru = new aru(); 
    $r_id = $_GET['r_id'];  
    $sql = get_select_query("select * from rest_day where r_id = $r_id");
    ?> 
	<div class="content-wrapper">
	
		<?php breadcrumb(); ?>

		<section class="content">
			<div id="rest-print" class="a5">
				<div class="inline-lab-print-form">
                    <?php
                    if(count($sql) >0) {
                        foreach($sql as $row) { 
                            $u_id = $row['u_id'] ;
                            $user = get_select_query("select * from user where u_id = $u_id ");
                            ?>
                            <section class="col-xs-12 text-right">
                                <h4 class="center">برگ درخواست مرخصی</h4><br>
                                <p style="font-size: 14px!important;">مدیر محترم شرکت پترو سامان آذر تتس</p>
                                <p style="font-size: 14px!important;">با سلام</p>
                                <p style="font-size: 14px!important;">خواهشمند است با <?php echo $row['r_total']; ?> روز مرخصی <?php echo $row['r_type']; ?> اینجانب <?php echo $user[0]['u_name'] . " " . $user[0]['u_family']; ?> از تایخ <?php echo $row['r_fromdate']; ?> تا پایان روز <?php echo $row['r_todate']; ?> به مدت <?php echo $row['r_total']; ?> روز موافقت فرمائید .</p>
                                <p style="font-size: 14px!important;">توضیحات : <?php echo $row['r_details']; ?></p>
                                <div class="item col-md-4">
                                    <div class="margin-tb input-group-prepend">
                                        <span class="input-group-text">امضاء مدیر</span>
                                    </div>
                                    <div class="rest-signature">
                                        <?php 
                                        get_signature($row['r_admin_verify']); ?>
                                    </div>
                                </div>
                                <div class="item col-md-4">
                                    <div class="margin-tb input-group-prepend">
                                        <span class="input-group-text">امضاء منابع انسانی</span>
                                    </div>
                                    <div class="rest-signature">
                                        <?php 
                                        get_signature($row['r_hr_verify']); ?>
                                    </div>
                                </div>
                                <div class="item col-md-4">
                                    <div class="margin-tb input-group-prepend">
                                        <span class="input-group-text">امضاء درخواست کننده</span>
                                    </div>
                                    <div class="rest-signature">
                                        <?php 
                                        get_signature($row['u_id']); ?>
                                    </div>
                                </div>
                            </section>
                            <?php
                        }
                    } ?>
                </div>
			</div>
		</section>
	</div>
	<script src="<?php get_url(); ?>user/jquery-print.js"></script>
<?php include"../left-nav.php"; include"../footer.php"; ?>