<?php
function upload_file($filename, $tmp_name, $size, $type, $bu_id , $type_media=null){

	$ext = explode(".", $filename);
	$ext = end($ext);
    $filename = time() . rand(100,1000) . "." . $ext;
	
	$target_dir = "../uploads/";
	if($type_media==null){
		$target_file = $target_dir . basename($filename);
	}
	else{
		if(!file_exists($target_dir . $type_media))
		{
			mkdir($target_dir . $type_media);
			$target_file = $target_dir . $type_media ."/". basename($filename);
		}
		else{
		$target_file = $target_dir . $type_media ."/". basename($filename);
		}
	}
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
	if (file_exists($target_file)) {
		//echo "Sorry, file already exists.";
		?>
			<script>
				alertify.set('notifier','position', 'bottom-right');
 				alertify.warning('فایلی با این نام وجود دارد');
			</script>
			<?php
		$uploadOk = 0;
	}

	if( $imageFileType == "pdf" || $imageFileType == "docx" || $imageFileType == "doc" || $imageFileType == "ppt" || $imageFileType == "pptx"  || $imageFileType == "xls"  || $imageFileType == "xlsx") {
		if ($size > 4194304) {
			?>
			<script>
				alertify.set('notifier','position', 'bottom-right');
 				alertify.warning('حجم مجاز برای آپلود فایل ۴ مگابایت است');
			</script>
			<?php
			$uploadOk = 0;
		}
	}
	else {
		if ($size > 1048576) {
			?>
			<script>
				alertify.set('notifier','position', 'bottom-right');
 				alertify.warning('حجم مجاز برای آپلود عکس ۱ مگابایت است');
			</script>
			<?php
			$uploadOk = 0;
		}
		$check = getimagesize($tmp_name);
		if($check !== false) {
			//echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			//echo "File is not an image.";
			?>
			<script>
				alertify.set('notifier','position', 'bottom-right');
 				alertify.warning('فایل انتخاب شده تصویر نیست');
			</script>
			<?php
			$uploadOk = 0;
		}
	}

	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "pdf"  && $imageFileType != "docx"  && $imageFileType != "doc" && $imageFileType != "ppt" && $imageFileType != "pptx"  && $imageFileType != "xls"  && $imageFileType != "xlsx") {
		//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		?>
			<script>
				alertify.set('notifier','position', 'bottom-right');
 				alertify.warning('تنها مجاز به بارگزاری تصویر , pdf و word و xls می باشید');
			</script>
			<?php
		$uploadOk = 0;
	}

	if ($uploadOk == 0) {
		//echo "Sorry, your file was not uploaded.";
		return $uploadOk;
	} else {
		if (move_uploaded_file($tmp_name, $target_file)) {
			//echo "فایل ". basename($filename). " با موفقیت آپلود شد." . "<br>";
			?>
			<script>
				alertify.set('notifier','position', 'bottom-right');
 				alertify.success('فایل با موفقیت بارگزاری شد');
			</script>
			<?php
			return $filename;
		} else {
			//echo "Sorry, there was an error uploading your file.";
			?>
			<script>
				alertify.set('notifier','position', 'bottom-right');
 				alertify.warning('یک خطا در بارگزاری فایل وجود دارد');
			</script>
			<?php
			$uploadOk = 0;
			return $uploadOk;
		}
	}
}

function upload_file_header($filename, $tmp_name, $size , $media_name){

	$ext = explode(".", $filename);
	$ext = end($ext);
    $filename = $media_name . "." . $ext;
	
	$target_dir = "../dist/img/set/";
	$target_file = $target_dir . basename($filename);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
	$check = getimagesize($tmp_name);
	if($check !== false) {
		//echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	} else {
		//echo "File is not an image.";
		?>
			<script>
				alertify.set('notifier','position', 'bottom-right');
 				alertify.warning('فایل انتخاب شده تصویر نیست');
			</script>
			<?php
		$uploadOk = 0;
	}
	
	if (file_exists($target_file)) {
		//echo "Sorry, file already exists.";
		//alert("alert-success", "Sorry, file already exists.");
		//$uploadOk = 0;
		$path = str_replace($_SERVER['DOCUMENT_ROOT'], '', "../dist/img/set/". $filename);
            if($path != "../dist/img/set/"){
                unlink($path);
                
                $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                ?>
                <script type="text/javascript">
                    window.location.href = "<?php echo $url; ?>";
                </script>
                <?php 
            }
	}
		
	if ($size > 1048576) {
		?>
			<script>
				alertify.set('notifier','position', 'bottom-right');
 				alertify.warning('حجم مجاز برای آپلود عکس ۱ مگابایت است');
			</script>
			<?php
		$uploadOk = 0;
	}

	if($imageFileType != "jpg") {
		//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		?>
			<script>
				alertify.set('notifier','position', 'bottom-right');
 				alertify.warning('فرمت مجاز برای سربرگ jpg می باشد');
			</script>
			<?php
		$uploadOk = 0;
	}

	if ($uploadOk == 0) {
		//echo "Sorry, your file was not uploaded.";
		return $uploadOk;
	} else {
		if (move_uploaded_file($tmp_name, $target_file)) {
			//echo "فایل ". basename($filename). " با موفقیت آپلود شد." . "<br>";
			?>
			<script>
				alertify.set('notifier','position', 'bottom-right');
 				alertify.success('فایل با موفقیت بارگزاری شد');
			</script>
			<?php
			return $filename;
		} else {
			//echo "Sorry, there was an error uploading your file.";
			?>
			<script>
				alertify.set('notifier','position', 'bottom-right');
 				alertify.warning('یک خطا در بارگزاری فایل وجود دارد');
			</script>
			<?php
		}
	}
}

function user_upload_file($filename, $tmp_name, $size, $type, $bu_id){

	$ext = explode(".", $filename);
	$ext = end($ext);
	$filename = $type . time() . "." . $ext;
	
	$target_dir = "uploads/";
	$target_file = $target_dir . basename($filename);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		
	$check = getimagesize($tmp_name);
	
	if (file_exists($target_file)) {
		?>
		<script>
			alertify.set('notifier','position', 'bottom-right');
			alertify.warning('فایلی با این نام وجود دارد');
		</script>
		<?php
		$uploadOk = 0;
	}

	if( $imageFileType == "pdf" || $imageFileType == "docx" || $imageFileType == "doc" || $imageFileType == "ppt" || $imageFileType == "pptx" || $imageFileType == "xls"  || $imageFileType == "xlsx") {
		if ($size > 4194304) {
			?>
			<script>
				alertify.set('notifier','position', 'bottom-right');
 				alertify.warning('حجم مجاز برای آپلود فایل ۴ مگابایت است');
			</script>
			<?php
			$uploadOk = 0;
		}
	}
	else {
		if ($size > 1048576) {
			?>
			<script>
				alertify.set('notifier','position', 'bottom-right');
 				alertify.warning('حجم مجاز برای آپلود عکس ۱ مگابایت است');
			</script>
			<?php
			$uploadOk = 0;
		}
		$check = getimagesize($tmp_name);
		if($check !== false) {
			//echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			//echo "File is not an image.";
			?>
			<script>
				alertify.set('notifier','position', 'bottom-right');
 				alertify.warning('فایل انتخاب شده تصویر نیست');
			</script>
			<?php
			$uploadOk = 0;
		}
	}
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "pdf"  && $imageFileType != "docx"  && $imageFileType != "doc" && $imageFileType != "ppt" && $imageFileType != "pptx"  && $imageFileType != "xls"  && $imageFileType != "xlsx") {
		//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		?>
			<script>
				alertify.set('notifier','position', 'bottom-right');
 				alertify.warning('تنها مجاز به بارگزاری تصویر , pdf و word و xls می باشید');
			</script>
			<?php
		$uploadOk = 0;
	}

	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	} else {
		//echo $tmp_name . "<br>" . $target_file;
		if (move_uploaded_file($tmp_name, $target_file)) {
			

			$sql2 = "SELECT count(m_id) FROM media WHERE bu_id = $bu_id AND m_name_file = '$type'";
			$m_name = get_var_query("SELECT m_name FROM media WHERE bu_id = $bu_id AND m_name_file = '$type'");
			$check = get_var_query($sql2);
			if ( $check > 0 ) {
				$path = str_replace($_SERVER['DOCUMENT_ROOT'], '', "uploads/" . $m_name);
                if(unlink($path)){
					$sql = "UPDATE media SET m_name = '$filename', m_type = 'user', m_name_file = '$type', bu_id = $bu_id WHERE bu_id = $bu_id AND m_name_file = '$type'";
                }
			} else {
				$sql = "INSERT INTO media(m_name, m_type, m_name_file, bu_id) VALUES('$filename', 'user', '$type', $bu_id)";
			}
			$res = ex_query($sql);
		} else {
			?>
			<script>
				alertify.set('notifier','position', 'bottom-right');
 				alertify.warning('یک خطا در بارگزاری فایل وجود دارد');
			</script>
			<?php
		}
	}
}

function user_get_media($bu_id, $type){
	$sql = "select m_name from media where bu_id = $bu_id and m_name_file = '$type'";
	$res = get_var_query($sql);
	if( !is_null ( $res ) ){
		$src = get_the_url() . 'user/uploads/' . $res;
		return $src;
	}else{
		return "";
	}
}

function get_media($bu_id, $type){
	$sql = "select m_name from media where bu_id = $bu_id and m_name_file = '$type'";
	$res = get_var_query($sql);
	$src = get_the_url() . 'buy/uploads/' . $res;
	return $src;
}

function get_pre_invoice_file($f_id){
	$sql2 = "select * from media_factor where f_id = $f_id"; 
	$res2 = get_select_query($sql2); 
	if(count($res2)>0){
		if($res2[0]['mf_link']!=null){ ?>
			<a target="_blank" href="<?php get_url(); ?>uploads/<?php echo $res2[0]['mf_link']; ?>">
				<img class="img-responsive" src="<?php get_url(); ?>uploads/<?php echo $res2[0]['mf_link']; ?>">
			</a>
		<?php
		}
	}
}

	function uploader_by_date($date,$file)
	{
		$uploadOk = 1;
		$array=explode("/",$date);
		$year=$array[0];
		$month=$array[1];
		$tmp_name = $file['tmp_name'];
		$size = $file['size'];
		$filename = $file['name'];
		$ext = explode(".", $filename);
		$ext = end($ext);
		$filename = time() . rand(100,1000) . "." . $ext;
		if(!file_exists("../uploads"))
		{
			mkdir("../uploads");
		}
		if(!file_exists("../uploads/doc-loading"))
		{
			mkdir("../uploads/doc-loading");

			if(!file_exists("../uploads/doc-loading/".$year))
			{
				mkdir("../uploads/doc-loading/".$year);
				mkdir("../uploads/doc-loading/".$year."/".$month);
			}
			else
			{
				if(!file_exists("../uploads/doc-loading/".$year."/".$month))
				{
					mkdir("../uploads/doc-loading/".$year."/".$month);
				}
			}
		}
		else {
			if(!file_exists("../uploads/doc-loading/".$year))
			{
				mkdir("../uploads/doc-loading/".$year);
				mkdir("../uploads/doc-loading/".$year."/".$month);
			}
			else
			{
				if(!file_exists("../uploads/doc-loading/".$year."/".$month))
				{
					mkdir("../uploads/doc-loading/".$year."/".$month);
				}
			}
		}
		$target_file = "../uploads/doc-loading/" . $year . "/" . $month . "/" . basename($filename);
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
		if (file_exists($target_file)) {
			?>
				<script>
					alertify.set('notifier','position', 'bottom-right');
					alertify.warning('فایلی با این نام وجود دارد');
				</script>
				<?php
			$uploadOk = 0;
		}

		if( $imageFileType == "pdf" || $imageFileType == "docx" || $imageFileType == "doc" || $imageFileType == "ppt" || $imageFileType == "pptx"  || $imageFileType == "xls"  || $imageFileType == "xlsx") {
			if ($size > 4194304) {
				?>
				<script>
					alertify.set('notifier','position', 'bottom-right');
					alertify.warning('حجم مجاز برای آپلود فایل ۴ مگابایت است');
				</script>
				<?php
				$uploadOk = 0;
			}
		}
		else {
			if ($size > 1048576) {
				?>
				<script>
					alertify.set('notifier','position', 'bottom-right');
					alertify.warning('حجم مجاز برای آپلود عکس ۱ مگابایت است');
				</script>
				<?php
				$uploadOk = 0;
			}
			$check = getimagesize($tmp_name);
			if($check !== false) {
				$uploadOk = 1;
			} else {
				?>
				<script>
					alertify.set('notifier','position', 'bottom-right');
					alertify.warning('فایل انتخاب شده تصویر نیست');
				</script>
				<?php
				$uploadOk = 0;
			}
		}

		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "pdf"  && $imageFileType != "docx"  && $imageFileType != "doc" && $imageFileType != "ppt" && $imageFileType != "pptx"  && $imageFileType != "xls"  && $imageFileType != "xlsx") {
			//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			?>
				<script>
					alertify.set('notifier','position', 'bottom-right');
					alertify.warning('تنها مجاز به بارگزاری تصویر , pdf و word و xls می باشید');
				</script>
				<?php
			$uploadOk = 0;
		}

		if ($uploadOk == 0) {
			//echo "Sorry, your file was not uploaded.";
			return $uploadOk;
		} else {
			if (move_uploaded_file($tmp_name, $target_file)) {
				?>
				<script>
					alertify.set('notifier','position', 'bottom-right');
					alertify.success('فایل با موفقیت بارگزاری شد');
				</script>
				<?php
				return $target_file;
			} else {
				?>
				<script>
					alertify.set('notifier','position', 'bottom-right');
					alertify.warning('یک خطا در بارگزاری فایل وجود دارد');
				</script>
				<?php
				$uploadOk = 0;
				return $uploadOk;
			}
		}
	}