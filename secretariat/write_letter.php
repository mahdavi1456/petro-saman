<?php include"../header.php"; include"../nav.php"; 
    $user = new user();
    $u_level = $user->get_current_user_level();
    $aru = new aru(); 
    $fact_address = get_var_query("select o_value from options where o_key = 'fact_address' ");
    $com_name = get_var_query("select o_value from options where o_key = 'com_name' ");
    $media_sender = $aru->get_list("media_sender_indicator", "msi_id");
    $si_id = $_GET['si_id'];
    if(isset($_GET['letter_type'])) {
        $letter_type = $_GET['letter_type'];
        $si_id = $_GET['si_id'];
        $sql = get_select_query("select * from sender_indicator where si_id = $si_id");
        $media_sender = get_select_query("select * from media_sender_indicator where si_id = $si_id");
        $media_sender1 = get_var_query("select count(*) from media_sender_indicator where si_id = $si_id");
    } else {
        $letter_type = "";
    }

    if(isset($_POST['add-sender_indicator'])) {
        $letter_type = $_GET['letter_type'];
        $si_writer = $_POST['add-sender_indicator'];
        $si_text = $_POST['si_text'];
        if($letter_type != '0' ){
            $sql1="update sender_indicator set  si_text = '$si_text' , 	si_writer = '$si_writer' , si_type = '$letter_type' where si_id = $si_id";
            ex_query($sql1);
            ?>
            <script>
                alertify.set('notifier','position', 'bottom-right');
                alertify.success('مورد با موفقیت ویرایش شد');
            </script>
            <?php
            echo '<meta http-equiv="refresh" content="2"/>';
        }
        else{
            ?>
            <script>
                alertify.set('notifier','position', 'bottom-right');
                 alertify.warning('نوع برگه را انتخاب کنید');
            </script>
            <?php
        }
    }

    if(isset($_POST['update-media_sender']))
	{
		$i=0;
		$ary;
		$file = $_FILES['uploader1'];
		$si_id = $_POST['update-media_sender'];
		$date = $_POST['date'];
        $msi_name = $_POST['msi_name'];
        if (empty($file['name'][$i])){
            ?>
			<script>
				alertify.set('notifier','position', 'bottom-right');
 				alertify.warning('فایلی انتخاب نشده است');
			</script>
			<?php
        }
        else {
			if($msi_name) {
                while(!empty($file['name'][$i]))
                {
                    $filename = $file['name'][$i];
                    $tmp_name = $file['tmp_name'][$i];
                    $size = $file['size'][$i];
                    $link = upload_file($filename, $tmp_name, $size, "0" , "0" , "media_sender_indicator");
                    if($link != '0'){
                        $sql3="insert into media_sender_indicator (si_id, msi_link, msi_date, msi_name) values ('$si_id', '$link', '$date', '$msi_name')";
                        ex_query($sql3);
                    }
                    $i++;
                }
            }
            else {
                ?>
                <script>
                    alertify.set('notifier','position', 'bottom-right');
                     alertify.warning('عنوان وارد نشده است');
                </script>
                <?php
            }
            }
        echo '<meta http-equiv="refresh" content="2"/>';
    }
    

    if(isset($_POST['delete-media_sender']))
	{
		$msi_id = $_POST['delete-media_sender'];
		$msi_link =get_var_query("select msi_link from media_sender_indicator where msi_id = $msi_id ");
		$path = str_replace($_SERVER['DOCUMENT_ROOT'], '', "../uploads/media_sender_indicator/" . $msi_link);
		if(unlink($path)){
			$aru->remove('media_sender_indicator','msi_id', $msi_id ,'int');
		}
		$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		?>
		<?php
	}

    if(isset($_POST['save_admin_verify'])){
		$si_id = $_POST['si_id'];
		$si_admin_details = $_POST['si_admin_details'];
		$verify =  $_POST['verify'];
        $date = jdate('Y/n/j');
        $user = new user();
        $u_level = $user->get_current_user_level();
		if($verify == 0)
		{
			if($u_level=='مدیریت'){
				$res2 = ex_query("update sender_indicator set si_admin_details = null , si_admin_verify = '$verify' , si_admin_date = '0000-00-00'  where si_id = $si_id");
				?>
				<script>
					alertify.set('notifier','position', 'bottom-right');
					alertify.success('مورد با موفقیت ثبت شد');
				</script>
				<?php
			}
		}
		else
		{
			if($u_level=='مدیریت'){
				$res2 = ex_query("update sender_indicator set si_admin_details = '$si_admin_details' , si_admin_verify = '$verify' , si_admin_date = '$date'  where si_id = $si_id");
				?>
				<script>
					alertify.set('notifier','position', 'bottom-right');
					alertify.success('مورد با موفقیت ثبت شد');
				</script>
				<?php
			}
		}
		echo '<meta http-equiv="refresh" content="2"/>';
	}

    ?> 
	<div class="content-wrapper">
	
        <?php breadcrumb(); ?>

		<section class="content">
            <form action="" method="get">
                <input type="hidden" name="si_id" value="<?php echo $_GET['si_id']; ?>">
                <section class="box box-info">
                    <div class="box-header with-border">
                        <div class="box-body">
                            <div class="row">
                                <div class="item col-md-4">
                                    <div class="input-group-prepend">
                                        <label for="letter_type">نوع برگه</label>
                                    </div>
                                    <select class="form-control" id="letter_type" name="letter_type" onchange="this.form.submit()">
                                        <option value="0">نوع برگه را انتخاب کنید</option>
                                        <option <?php if($letter_type == "a4") echo "selected"; ?> value="a4">a4</option>
                                        <option <?php if($letter_type == "a5") echo "selected"; ?> value="a5">a5</option>
                                    </select>
                                </div>
                                <div class="item col-md-2">
                                </div>
                                <div class="item col-md-4">
                                    <div class="input-group-prepend">
                                    </div><br><br>
                                    <button class="btn btn-info btn-sm" type="button" data-toggle="modal" data-keyboard="false" data-target="#doc_modal<?php echo $si_id; ?>">پیوست ها</button>
                                    <button class="btn btn-primary btn-sm" type="button" data-toggle="modal" data-keyboard="false" data-target="#edit<?php echo $si_id; ?>">ویرایش نامه</button>
                                    <?php 
				                    if($u_level == "مدیریت" ){ ?>
                                        <button class="btn btn-warning btn-sm" type="button" data-toggle="modal" data-keyboard="false" data-target="#admin_verify<?php echo $si_id; ?>" >تایید مدیر</button>
                                        <?php 
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </form>
            <div class="modal fade text-xs-left" id="admin_verify<?php echo $si_id; ?>" tabindex="-1" role="dialog" aria-labelledby="#admin_verify<?php echo $si_id; ?>" style="display: none;" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input class="hidden" type="text" name="si_id" id="si_id" value="<?php echo $si_id; ?>">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel3">تایید مدیر</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="item col-md-12">
                                        <div class="margin-tb input-group-prepend">
                                            <span class="input-group-text">توضیحات مدیر</span>
                                        </div>
                                        <input type="text" id="si_admin_details" name="si_admin_details" placeholder="توضیحات مدیر" value="<?php if(count($sql) > 0) { foreach($sql as $row) { echo $row['si_admin_details']; } } ?>">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="item col-md-6">
                                        <div class="margin-tb input-group-prepend">
                                            <span class="input-group-text">وضعیت</span>
                                        </div>
                                        <select class="form-control" name="verify" id="verify">
                                            <option value="<?php $u_id = $_SESSION['user_id']; echo $u_id; ?>">تایید</option>
                                            <option value="0">عدم تایید</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">انصراف</button>
                                <button class="btn btn-primary btn-sm" name="save_admin_verify" type="submit">ذخیره</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal fade text-xs-left" id="doc_modal<?php echo $si_id; ?>" tabindex="-1" role="dialog" aria-labelledby="#doc_modal<?php echo $si_id; ?>" style="display: none;" aria-hidden="true">
                <div class="modal-dialog" role="document" id="doc_modal">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="date" value="<?php echo jdate("Y/n/j"); ?>">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel3">پیوست ها</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="item col-md-8">
                                        <label for="uploader1[]">انتخاب پیوست</label><span class="necessary"> *</span>
                                        <input type="file" name="uploader1[]" multiple/>
                                    </div>
                                    <div class="item col-md-4">
                                        <label for="msi_name">عنوان پیوست</label><span class="necessary"> *</span>
                                        <input type="text" name="msi_name" id="msi_name" placeholder="عنوان پیوست" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <table id="example1" class="table table-striped table-bordered table-responsive group_save_table">
                                        <thead>
                                            <tr>
                                                <th>ردیف</th>
                                                <th>عنوان پیوست</th>
                                                <th>تاریخ آپلود پیوست</th>
                                                <th>لینک پیوست</th>
                                                <th>عملیات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $roww=1;
                                                $k = 1 ;
                                                if($media_sender)
                                                {
                                                    
                                                    foreach ($media_sender as $c ) 
                                                    {
                                                        $ssi_id = $c['si_id'];
                                                        $msi_id = $c['msi_id'];
                                                        if($si_id==$ssi_id)
                                                        {
                                                            ?>
                                                            <tr>
                                                                <td><?php echo per_number($roww); ?></td>
                                                                <td><?php echo per_number($c['msi_name']); ?></td>
                                                                <td><?php echo per_number(str_replace("-", "/", $c['msi_date'])); ?></td>
                                                                <td><a target="_blank" href="<?php get_url(); ?>uploads/media_sender_indicator/<?php echo $c['msi_link']; ?>" ><img src="<?php get_url(); ?>uploads/media_sender_indicator/<?php echo $c['msi_link']; ?>" style="width:20px;heigh:20px"></a></td>
                                                                <td class="force-inline-text">
                                                                    <form action="" method="post" onSubmit="if(!confirm('آیا از انجام این عملیات اطمینان دارید؟')){return false;}">
                                                                        <button class="btn btn-danger btn-sm" type="submit" name="delete-media_sender" value="<?php echo $msi_id; ?>">حذف</button>
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            $roww++;
                                                            $k = 0;
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
                                                <th>عنوان پیوست</th>
                                                <th>تاریخ آپلود پیوست</th>
                                                <th>لینک پیوست</th>
                                                <th>عملیات</th>
                                            </tr>
                                            
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <center>
                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">انصراف</button>
                                    <button class="btn btn-primary btn-sm" name="update-media_sender" value="<?php echo $si_id; ?>" type="submit">ذخیره</button>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="modal fade text-xs-left" id="edit<?php echo $si_id; ?>" tabindex="-1" role="dialog" aria-labelledby="#edit<?php echo $si_id; ?>" style="display: none;" aria-hidden="true">
                <div class="modal-dialog" role="document" id="edit">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="date" value="<?php echo jdate("Y/n/j"); ?>">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel3">ویرایش نامه</h4>
                            </div>
                            <div class="modal-body">
                                <textarea class="form-control tinymce" rows="10" id="si_text" type="text" name="si_text" class="form-control" placeholder="متن نامه" data-required="1"><?php  if(count($sql) > 0) { foreach($sql as $row) {  echo $row['si_text'];  }   }?></textarea>
                            </div>
                            <div class="modal-footer">
                                <center>
                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">انصراف</button>
                                    <button type="submit" class="btn btn-success btn-sm" name="add-sender_indicator" value="<?php $u_id = $_SESSION['user_id']; echo $u_id; ?>">ذخیره</button>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <?php
            if($letter_type=="a4") { ?>
                <div class="letter-a4" id="write_letter-print" >
                    <div class="inline-lab-print-form2" id="letter">
                        <form action="" method="post">
                            <?php
                            if(count($sql) > 0) {
                                foreach($sql as $row) { ?>
                                    <div class="col-md-3 letter-details">
                                        <p style="font-size: 14px!important;">تاریخ: <?php echo per_number(str_replace("-", "/", $row['si_send_date'])); ?></p>
                                        <p style="font-size: 14px!important;">شماره: <?php echo  $row['si_id']; ?></p>
                                        <p style="font-size: 14px!important;">
                                            <div class="col-md-3 no-padd">پیوست: </div>
                                            <div class="col-md-9 no-padd letter-details-attch">
                                                <?php 
                                                 if($media_sender1 > 0 ) {
                                                    if($media_sender1 > 5 ) { echo "دارد"; } 
                                                    else { echo $media_sender1 . " " . "برگ"; } 
                                                 } else {
                                                    echo "ندارد";
                                                 }?>
                                            </div>
                                        </p>
                                    </div>
                                    <div class="letter-content col-md-12">
                                        <h4><?php echo $row['si_receiver']; ?></h4></br>
                                        <div class="item col-md-12 no-padd">
                                            <?php echo $row['si_text']; ?>
                                            <span></span>
                                        </div>        
                                        <div class="item col-md-4">
                                        </div>
                                        <div class="item col-md-4">
                                        </div>
                                        <div class="item col-md-4">
                                            <div class="margin-tb input-group-prepend">
                                                <p style="font-size: 14px!important;"><?php if($row['si_admin_verify'] != 0){ $user = new user(); echo $user->get_user_name($row['si_admin_verify']); } ?></p>
                                            </div>
                                            <div class="rest-signature">
                                                <?php get_signature($row['si_admin_verify']); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } ?>
                        </form>
                    </div>
                </div>
                <section class="col-xs-12 center">
                    <input type="button" value="چاپ"  id="analyze_report-printer" class="btn btn-sm btn-default">
                </section>
                <?php 
            } ?>

            <?php if($letter_type=="a5") { ?>
                <div class="letter-a5" id="write_letter-print" >
                    <div class="inline-lab-print-form2" id="letter">
                        <form action="" method="post" id="myForm" enctype='multipart/form-data'>
                            <?php
                            if(count($sql) >0) {
                                foreach($sql as $row) { ?>
                                    <div class="col-md-3 letter-details">
                                        <p style="font-size: 14px!important;">تاریخ: <?php echo  per_number(str_replace("-", "/", $row['si_send_date'])); ?></p>
                                        <p style="font-size: 14px!important;">شماره: <?php echo  $row['si_id']; ?></p>
                                        <p style="font-size: 14px!important;">
                                            <div class="col-md-3 no-padd">
                                            پیوست:
                                            </div>
                                            <div class="col-md-9 no-padd letter-details-attch-a5">
                                                <?php 
                                                 if($media_sender1 > 0 ) {
                                                    if($media_sender1 > 5 ){ echo "دارد"; } 
                                                    else { echo $media_sender1 . " " . "برگ"; } 
                                                 }else {
                                                    echo "ندارد";
                                                 }?>
                                            </div>
                                    </div>
                                    <div class="letter-content col-md-12">
                                        <h4><?php echo $row['si_receiver']; ?></h4></br>
                                        <div class="item col-md-12 no-padd">
                                            <?php echo $row['si_text']; ?>
                                            <span></span>
                                        </div>        
                                        <div class="item col-md-4">
                                        </div>
                                        <div class="item col-md-4">
                                        </div>
                                        <div class="item col-md-4">
                                            <div class="margin-tb input-group-prepend">
                                                <p style="font-size: 14px!important;"><?php if($row['si_admin_verify'] != 0){ $user = new user(); echo $user->get_user_name($row['si_admin_verify']); } ?></p>
                                            </div>
                                            <div class="rest-signature">
                                                <?php get_signature($row['si_admin_verify']); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } ?>
                        </form>
                    </div>
                </div>
                <section class="col-xs-12 center">
                    <input type="button" value="چاپ" id="analyze_report-printer"  class="btn btn-sm btn-default">
                </section>
                <?php 
            } ?>
		</section>
       
	</div>
    <script src="<?php get_url(); ?>user/jquery-print.js"></script>
    <script>
    $(document).ready(function(){
        $('#analyze_report-printer').on('click', function() {
            $.print('#write_letter-print');
        });
    });
    </script>
    <script src="<?php get_url(); ?>secretariat/js/secretariat.js"></script>
    <script src="https://cdn.tiny.cloud/1/21lk9vj2zz4exegft0fpn9tfnrdwv8gmxkswk9mmyyp0aegn
/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    
    <script>
      

var fakeServer = (function () {
  /* Use tinymce's Promise shim */
  var Promise = tinymce.util.Promise;

  /* Some user names for our fake server */
  var userNames = [
    'Terry Green', 'Edward Carroll', 'Virginia Turner', 'Alexander Schneider', 'Gary Vasquez', 'Randy Howell',
    'Katherine Moore', 'Betty Washington', 'Grace Chapman', 'Christina Nguyen', 'Danielle Rose', 'Thomas Freeman',
    'Thomas Armstrong', 'Vincent Lee', 'Brittany Kelley', 'Brenda Wheeler', 'Amy Price', 'Hannah Harvey',
    'Bobby Howard', 'Frank Fox', 'Diane Hopkins', 'Johnny Hawkins', 'Sean Alexander', 'Emma Roberts', 'Thomas Snyder',
    'Thomas Allen', 'Rebecca Ross', 'Amy Boyd', 'Kenneth Watkins', 'Sarah Tucker', 'Lawrence Burke', 'Emma Carr',
    'Zachary Mason', 'John Scott', 'Michelle Davis', 'Nicholas Cole', 'Gerald Nelson', 'Emily Smith', 'Christian Stephens',
    'Grace Carr', 'Arthur Watkins', 'Frances Baker', 'Katherine Cook', 'Roger Wallace', 'Pamela Arnold', 'Linda Barnes',
    'Jacob Warren', 'Billy Ramirez', 'Pamela Walsh', 'Paul Wade', 'Katherine Campbell', 'Jeffrey Berry', 'Patrick Bowman',
    'Dennis Alvarez', 'Crystal Lucas', 'Howard Mendoza', 'Patricia Wallace', 'Peter Stone', 'Tiffany Lane', 'Joe Perkins',
    'Gloria Reynolds', 'Willie Fernandez', 'Doris Harper', 'Heather Sandoval', 'Danielle Franklin', 'Ann Ellis',
    'Christopher Hernandez', 'Pamela Perry', 'Matthew Henderson', 'Jesse Mitchell', 'Olivia Reed', 'David Clark', 'Juan Taylor',
    'Michael Garrett', 'Gerald Guerrero', 'Jerry Coleman', 'Joyce Vasquez', 'Jane Bryant', 'Sean West', 'Deborah Bradley',
    'Phillip Castillo', 'Martha Coleman', 'Ryan Santos', 'Harold Hanson', 'Frances Hoffman', 'Heather Fisher', 'Martha Martin',
    'George Gray', 'Rachel Herrera', 'Billy Hart', 'Kelly Campbell', 'Kelly Marshall', 'Doris Simmons', 'Julie George',
    'Raymond Burke', 'Ruth Hart', 'Jack Schmidt', 'Billy Schmidt', 'Ruth Wagner', 'Zachary Estrada', 'Olivia Griffin', 'Ann Hayes',
    'Julia Weaver', 'Anna Nelson', 'Willie Anderson', 'Anna Schneider', 'Debra Torres', 'Jordan Holmes', 'Thomas Dean',
    'Maria Burton', 'Terry Long', 'Danielle McDonald', 'Kyle Flores', 'Cheryl Garcia', 'Judy Delgado', 'Karen Elliott',
    'Vincent Ortiz', 'Ann Wright', 'Ann Ramos', 'Roy Jensen', 'Keith Cunningham', 'Mary Campbell', 'Jesse Ortiz', 'Joseph Mendoza',
    'Nathan Bishop', 'Lori Valdez', 'Tammy Jacobs', 'Mary West', 'Juan Mitchell', 'Thomas Adams', 'Christian Martinez', 'James Ramos',
    'Deborah Ross', 'Eric Holmes', 'Thomas Diaz', 'Sharon Morales', 'Kathryn Hamilton', 'Helen Edwards', 'Betty Powell',
    'Harry Campbell', 'Raymond Perkins', 'Melissa Wallace', 'Danielle Hicks', 'Harold Brewer', 'Jack Burns', 'Anna Robinson',
    'Dorothy Nguyen', 'Jane Dean', 'Janice Hunter', 'Ryan Moore', 'Brian Riley', 'Brittany Bradley', 'Phillip Ortega', 'William Fisher',
    'Jennifer Schultz', 'Samantha Perez', 'Linda Carr', 'Ann Brown', 'Shirley Kim', 'Jeremy Alvarez', 'Dylan Oliver', 'Roy Gomez',
    'Ethan Brewer', 'Ruth Lucas', 'Marilyn Myers', 'Danielle Wright', 'Jose Meyer', 'Bobby Brown', 'Angela Crawford', 'Brandon Willis',
    'Kyle McDonald', 'Aaron Valdez', 'Kevin Webb', 'Ashley Gordon', 'Karen Jenkins', 'Johnny Santos', 'Ashley Henderson', 'Amy Walters',
    'Amber Rodriguez', 'Thomas Ross', 'Dorothy Wells', 'Jennifer Murphy', 'Douglas Phillips', 'Helen Johnston', 'Nathan Hawkins',
    'Roger Mitchell', 'Michael Young', 'Eugene Cruz', 'Kevin Snyder', 'Frank Ryan', 'Tiffany Peters', 'Beverly Garza', 'Maria Wright',
    'Shirley Jensen', 'Carolyn Munoz', 'Kathleen Day', 'Ethan Meyer', 'Rachel Fields', 'Joan Bell', 'Ashley Sims', 'Sara Fields',
    'Elizabeth Willis', 'Ralph Torres', 'Charles Lopez', 'Aaron Green', 'Arthur Hanson', 'Betty Snyder', 'Jose Romero', 'Linda Martinez',
    'Zachary Tran', 'Sean Matthews', 'Eric Elliott', 'Kimberly Welch', 'Jason Bennett', 'Nicole Patel', 'Emily Guzman', 'Lori Snyder',
    'Sandra White', 'Christina Lawson', 'Jacob Campbell', 'Ruth Foster', 'Mark McDonald', 'Carol Williams', 'Alice Washington',
    'Brandon Ross', 'Judy Burns', 'Zachary Hawkins', 'Julie Chavez', 'Randy Duncan', 'Lisa Robinson', 'Jacqueline Reynolds', 'Paul Weaver',
    'Edward Gilbert', 'Deborah Butler', 'Frances Fox', 'Joshua Schmidt', 'Ashley Oliver', 'Martha Chavez', 'Heather Hudson',
    'Lauren Collins', 'Catherine Marshall', 'Katherine Wells', 'Robert Munoz', 'Pamela Nelson', 'Dylan Bowman', 'Virginia Snyder',
    'Janet Ruiz', 'Ralph Burton', 'Jose Bryant', 'Russell Medina', 'Brittany Snyder', 'Richard Cruz', 'Matthew Jimenez', 'Danielle Graham',
    'Steven Guerrero', 'Benjamin Matthews', 'Janet Mendoza', 'Harry Brewer', 'Scott Cooper', 'Alexander Keller', 'Virginia Gordon',
    'Randy Scott', 'Kimberly Olson', 'Helen Lynch', 'Ronald Garcia', 'Joseph Willis', 'Philip Walker', 'Tiffany Harris', 'Brittany Weber',
    'Gregory Harris', 'Sean Owens', 'Wayne Meyer', 'Roy McCoy', 'Keith Lucas', 'Christian Watkins', 'Christopher Porter', 'Sandra Lopez',
    'Harry Ward', 'Julie Sims', 'Albert Keller', 'Lori Ortiz', 'Virginia Henry', 'Samuel Green', 'Judith Cole', 'Ethan Castillo', 'Angela Ellis',
    'Amy Reid', 'Jason Brewer', 'Aaron Clark', 'Aaron Elliott', 'Doris Herrera', 'Howard Castro', 'Kenneth Davis', 'Austin Spencer',
    'Jonathan Marshall', 'Phillip Nelson', 'Julia Guzman', 'Robert Hansen', 'Kevin Anderson', 'Gerald Arnold', 'Austin Castro', 'Zachary Moore',
    'Joseph Cooper', 'Barbara Black', 'Albert Mendez', 'Marie Lane', 'Jacob Nichols', 'Virginia Marshall', 'Aaron Miller', 'Linda Harvey',
    'Christopher Morris', 'Emma Fields', 'Scott Guzman', 'Olivia Alexander', 'Kelly Garrett', 'Jesse Hanson', 'Henry Wong', 'Billy Vasquez',
    'Larry Ramirez', 'Bryan Brooks', 'Alan Berry', 'Nicole Powell', 'Stephen Bowman', 'Eric Hughes', 'Elizabeth Obrien', 'Timothy Ramos',
    'Michelle Russell', 'Denise Ruiz', 'Sean Carter', 'Amanda Barnett', 'Kathy Black', 'Terry Gutierrez', 'John Jensen', 'Grace Sanchez',
    'Tiffany Harvey', 'Jacqueline Sims', 'Wayne Lee', 'Roy Foster', 'Joyce Hart', 'Joseph Russell', 'Harold Washington', 'Beverly Cox',
    'Nicole Morales', 'Anna Carpenter', 'Jesse Ray', 'Ann Snyder', 'Mark Diaz', 'Elizabeth Harper', 'Andrew Guerrero', 'Cheryl Silva',
    'Michelle Hudson', 'Jeffrey Santos', 'Victoria Vasquez', 'Matthew Meyer', 'Jacob Murray', 'Jose Munoz', 'Edward Howell', 'Vincent Hunter',
    'Daniel Walters', 'Samantha Obrien', 'Laura Elliott', 'Richard Olson', 'Daniel Graham', 'Carol Lee', 'Grace Sullivan', 'Nancy Rodriguez',
    'Tyler Tran', 'Crystal Shaw', 'Madison Allen', 'Ralph Sims', 'Joe Jenkins', 'Dennis Ray', 'Arthur Davidson', 'Victoria Allen', 'Arthur Jackson',
    'Joan Thomas', 'Daniel Hopkins', 'Gloria Hicks', 'Danielle Price', 'Craig Keller', 'Alan Morgan', 'Gregory Silva', 'Samantha Kelly',
    'Rachel Williamson', 'Bruce Garrett', 'Jacob Smith', 'Kathleen Nichols', 'Sarah Long', 'Carol Pearson', 'Virginia Mendez', 'Judy Valdez',
    'Jason Garza', 'Brenda Fowler', 'Karen Edwards', 'Alexander Anderson', 'Pamela Wallace', 'Ruth Howell', 'Walter Hernandez', 'George Lucas',
    'Samantha Long', 'Margaret Garza', 'Kathleen Schultz', 'Frances Guerrero', 'Amber Meyer', 'Rachel Morales', 'Teresa Curtis', 'Heather Bell',
    'Grace Johnson', 'Melissa King', 'Zachary Cook', 'Carol Schultz', 'Jane Beck', 'Karen Stone', 'Roger Brooks', 'Carolyn Fuller', 'Nicholas Coleman',
    'William Bishop', 'Christine May', 'Linda George', 'Jean Meyer', 'Cheryl Armstrong', 'Danielle Welch', 'Amanda Graham', 'Janice Carter',
    'Catherine Brooks', 'Lawrence Gonzalez', 'Amy Russell', 'Eugene Jimenez', 'Joseph Carlson', 'Peter McCoy', 'Jerry Washington', 'Carolyn Obrien',
    'Mark Walker', 'Stephanie Hoffman', 'Julie Pena', 'Karen Curtis', 'Bryan Cruz', 'Madison Shaw', 'Rachel Graham', 'Susan Simpson', 'Andrea Harrison',
    'Bryan Miller', 'Vincent McDonald', 'Jesse McCoy', 'Christine Ramos', 'Dorothy Riley', 'Karen Warren', 'Ashley Weber', 'Judith Robinson',
    'Alan Mendez', 'Donna Medina', 'Helen Lane', 'Douglas Clark', 'Brenda Romero', 'Doris Wells', 'Patrick Howell', 'Doris Lawrence', 'Harry Jacobs',
    'Phillip Rose', 'Deborah Patel', 'Bryan Day', 'Rachel Butler', 'Paul Butler', 'Judy Knight', 'Willie Wallace', 'Phillip Anderson', 'Emma Black',
    'Lisa Lynch', 'Kimberly Freeman', 'Ronald West', 'Kathleen Harris', 'Martha Ruiz', 'Phillip Moreno', 'Robert Vargas', 'Jesse Diaz', 'Christine Weber',
    'Karen Stanley', 'Theresa Edwards', 'Kathryn Chavez', 'Sarah Rios', 'Danielle Wong', 'Kathy Carr', 'Joan Diaz', 'Albert Walters',
    'Denise Kim', 'Katherine Pearson', 'Diana Richardson', 'Harry Ford', 'Eric Mills', 'Sean Hicks', 'Joe Brown', 'Judith Morgan', 'Harry Hunter',
    'Matthew Bryant', 'Tyler Rose', 'Mildred Delgado', 'Emma Peters', 'Walter Delgado', 'Lauren Gilbert', 'Christopher Romero'
  ];

  /* some user profile images for our fake server */
  var images = [
    'camilarocun', 'brianmichel', 'absolutehype', '4l3d', 'lynseybrowne', 'hi_kendall', '4ae78e7058d2434', 'yusuf_y7',
    'beauty__tattoos', 'mehrank36176270', 'fabriziocuscini', 'hassaminian', 'mediajorge', 'alexbienz', 'eesates', 'donjain',
    'austinknight', 'ehlersd', 'bipiiin', 'victorstuber', 'curiousoffice', 'chowdhury_sayan', 'upslon', 'gcauchon', 'pawel_murawski',
    'mr_r_a', 'jeremieges', 'nickttng', 'patrikward', 'sinecdoques', 'gabrielbeduschi', 'ashmigosh', 'shxnx', 'laborisova',
    'anand_2688', 'mefahad', 'puneetsmail', 'jefrydagucci', 'duck4fuck', 'verbaux', 'nicolasjengler', 'sorousht_', 'am0rz',
    'dominiklevitsky', 'jarjan', 'ganilaughs', 'namphong122', 'tiggreen', 'allisongrayce', 'messagepadapp', 'madebylipsum',
    'tweetubhai', 'avonelink', 'ahmedkojito', 'piripipirics', 'dmackerman', 'markcipolla'
  ];

  /* some user profile descriptions for our fake server */
  var descriptions = [
    'I like to work hard, play hard!',
    'I drink like a fish, that is a fish that drinks coffee.',
    'OutOfCheeseError: Please reinstall universe.',
    'Do not quote me.',
    'No one reads these things right?'
  ];

  /* This represents a database of users on the server */
  var userDb = {};
  userNames.map(function (fullName) {
    var name = fullName.toLowerCase().replace(/ /g, '');
    var description = descriptions[Math.floor(descriptions.length * Math.random())];
    var image = 'https://s3.amazonaws.com/uifaces/faces/twitter/' + images[Math.floor(images.length * Math.random())] + '/128.jpg';
    return {
      id: name,
      name: name,
      fullName: fullName,
      description: description,
      image: image
    };
  }).forEach(function(user) {
    userDb[user.id] = user;
  });

  /* This represents getting the complete list of users from the server with only basic details */
  var fetchUsers = function() {
    return new Promise(function(resolve, _reject) {
      /* simulate a server delay */
      setTimeout(function() {
        var users = Object.keys(userDb).map(function(id) {
          return {
            id: id,
            name: userDb[id].name,
          };
        });
        resolve(users);
      }, 500);
    });
  };

  /* This represents requesting all the details of a single user from the server database */
  var fetchUser = function(id) {
    return new Promise(function(resolve, reject) {
      /* simulate a server delay */
      setTimeout(function() {
        if (Object.prototype.hasOwnProperty.call(userDb, id)) {
          resolve(userDb[id]);
        }
        reject('unknown user id "' + id + '"');
      }, 300);
    });
  };

  return {
    fetchUsers: fetchUsers,
    fetchUser: fetchUser
  };
})();

/* These are "local" caches of the data returned from the fake server */
var usersRequest = null;
var userRequest = {};

var mentions_fetch = function (query, success) {
  /* Fetch your full user list from somewhere */
  if (usersRequest === null) {
    usersRequest = fakeServer.fetchUsers();
  }
  usersRequest.then(function(users) {
    /* query.term is the text the user typed after the '@' */
    users = users.filter(function (user) {
      return user.name.indexOf(query.term.toLowerCase()) !== -1;
    });

    users = users.slice(0, 10);

    /* Where the user object must contain the properties `id` and `name`
       but you could additionally include anything else you deem useful. */
    success(users);
  });
};

var mentions_menu_hover = function (userInfo, success) {
  /* request more information about the user from the server and cache it locally */
  if (!userRequest[userInfo.id]) {
    userRequest[userInfo.id] = fakeServer.fetchUser(userInfo.id);
  }
  userRequest[userInfo.id].then(function(userDetail) {
    var div = document.createElement('div');

    div.innerHTML = (
    '<div class="card">' +
      '<img class="avatar" src="' + userDetail.image + '"/>' +
      '<h1>' + userDetail.fullName + '</h1>' +
      '<p>' + userDetail.description + '</p>' +
    '</div>'
    );

    success(div);
  });
};

var mentions_menu_complete = function (editor, userInfo) {
  var span = editor.getDoc().createElement('span');
  span.className = 'mymention';
  span.setAttribute('data-mention-id', userInfo.id);
  span.appendChild(editor.getDoc().createTextNode('@' + userInfo.name));
  return span;
};

var mentions_select = function (mention, success) {
  /* `mention` is the element we previously created with `mentions_menu_complete`
     in this case we have chosen to store the id as an attribute */
  var id = mention.getAttribute('data-mention-id');
  /* request more information about the user from the server and cache it locally */
  if (!userRequest[id]) {
    userRequest[id] = fakeServer.fetchUser(id);
  }
  userRequest[id].then(function(userDetail) {
    var div = document.createElement('div');
    div.innerHTML = (
      '<div class="card">' +
      '<img class="avatar" src="' + userDetail.image + '"/>' +
      '<h1>' + userDetail.fullName + '</h1>' +
      '<p>' + userDetail.description + '</p>' +
      '</div>'
    );
    success(div);
  });
};

tinymce.init({
  selector: '.tinymce',
  plugins: 'print preview fullpage powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker imagetools textpattern noneditable help formatpainter permanentpen pageembed charmap tinycomments mentions quickbars linkchecker emoticons',
  imagetools_cors_hosts: ['picsum.photos'],
  tinydrive_token_provider: function (success, failure) {
    success({ token: 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJqb2huZG9lIiwibmFtZSI6IkpvaG4gRG9lIiwiaWF0IjoxNTE2MjM5MDIyfQ.Ks_BdfH4CWilyzLNk8S2gDARFhuxIauLa8PwhdEQhEo' });
  },
  tinydrive_demo_files_url: '/docs/demo/tiny-drive-demo/demo_files.json',
  tinydrive_dropbox_app_key: 'jee1s9eykoh752j',
  tinydrive_google_drive_key: 'AIzaSyAsVRuCBc-BLQ1xNKtnLHB3AeoK-xmOrTc',
  tinydrive_google_drive_client_id: '748627179519-p9vv3va1mppc66fikai92b3ru73mpukf.apps.googleusercontent.com',
  menu: {
    tc: {
      title: 'TinyComments',
      items: 'addcomment showcomments deleteallconversations'
    }
  },
  menubar: 'file edit view insert format tools table tc help',
  toolbar: 'bold italic underline alignleft aligncenter alignright alignjustify outdent indent numlist bullist checklist ltr rtl| undo redo | fontsizeselect formatselect | forecolor backcolor casechange removeformat | pagebreak | charmap emoticons | fullscreen save | insertfile image template link codesample',
  autosave_ask_before_unload: true,
  autosave_interval: "30s",
  autosave_prefix: "{path}{query}-{id}-",
  autosave_restore_when_empty: false,
  autosave_retention: "2m",
  image_advtab: true,
  content_css: [
    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
    '//www.tiny.cloud/css/codepen.min.css'
  ],
  link_list: [
    { title: 'My page 1', value: 'http://www.tinymce.com' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' }
  ],
  image_list: [
    { title: 'My page 1', value: 'http://www.tinymce.com' },
    { title: 'My page 2', value: 'http://www.moxiecode.com' }
  ],
  image_class_list: [
    { title: 'None', value: '' },
    { title: 'Some class', value: 'class-name' }
  ],
  importcss_append: true,
  height: 400,
  file_picker_callback: function (callback, value, meta) {
    /* Provide file and text for the link dialog */
    if (meta.filetype === 'file') {
      callback('https://www.google.com/logos/google.jpg', { text: 'My text' });
    }

    /* Provide image and alt text for the image dialog */
    if (meta.filetype === 'image') {
      callback('https://www.google.com/logos/google.jpg', { alt: 'My alt text' });
    }

    /* Provide alternative source and posted for the media dialog */
    if (meta.filetype === 'media') {
      callback('movie.mp4', { source2: 'alt.ogg', poster: 'https://www.google.com/logos/google.jpg' });
    }
  },
  templates: [
        { title: 'New Table', description: 'creates a new table', content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>' },
    { title: 'Starting my story', description: 'A cure for writers block', content: 'Once upon a time...' },
    { title: 'New list with dates', description: 'New List with dates', content: '<div class="mceTmpl"><span class="cdate">cdate</span><br /><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>' }
  ],
  template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
  template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
  height: 600,
  image_caption: true,
  quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
  noneditable_noneditable_class: "mceNonEditable",
  toolbar_drawer: 'sliding',
  spellchecker_dialog: true,
  spellchecker_whitelist: ['Ephox', 'Moxiecode'],
  tinycomments_mode: 'embedded',
  content_style: ".mymention{ color: gray; }",
  contextmenu: "link image imagetools table configurepermanentpen",
  mentions_selector: '.mymention',
  mentions_fetch: mentions_fetch,
  mentions_menu_hover: mentions_menu_hover,
  mentions_menu_complete: mentions_menu_complete,
  mentions_select: mentions_select,
 });


    </script>
<?php include"../left-nav.php"; include"../footer.php"; ?>