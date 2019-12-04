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
		
	$check = getimagesize($tmp_name);
	if($check !== false) {
		//echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	} else {
		//echo "File is not an image.";
		alert("alert-success", "File is not an image.");
		$uploadOk = 0;
	}
	
	if (file_exists($target_file)) {
		//echo "Sorry, file already exists.";
		alert("alert-success", "Sorry, file already exists.");
		$uploadOk = 0;
	}
		
	if ($size > 1048576) {
		//echo "حجم مجاز برای آپلود عکس ۱مگابایت است.";
		alert("alert-success", "حجم مجاز برای آپلود عکس ۱مگابایت است.");
		$uploadOk = 0;
	}

	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
		//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		alert("alert-success", "Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
		$uploadOk = 0;
	}

	if ($uploadOk == 0) {
		//echo "Sorry, your file was not uploaded.";
		return $uploadOk;
	} else {
		if (move_uploaded_file($tmp_name, $target_file)) {
			//echo "فایل ". basename($filename). " با موفقیت آپلود شد." . "<br>";
			alert("alert-success", "فایل با موفقیت آپلود شد");
			return $filename;
		} else {
			//echo "Sorry, there was an error uploading your file.";
			alert("alert-success", "Sorry, there was an error uploading your file.");
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
		alert("alert-success", "File is not an image.");
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
		
	/* if ($size > 1048576) {
		//echo "حجم مجاز برای آپلود عکس ۱مگابایت است.";
		alert("alert-success", "حجم مجاز برای آپلود عکس ۱مگابایت است.");
		$uploadOk = 0;
	} */

	if($imageFileType != "jpg") {
		//echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		alert("alert-success", "Sorry, only JPG files are allowed.");
		$uploadOk = 0;
	}

	if ($uploadOk == 0) {
		//echo "Sorry, your file was not uploaded.";
		return $uploadOk;
	} else {
		if (move_uploaded_file($tmp_name, $target_file)) {
			//echo "فایل ". basename($filename). " با موفقیت آپلود شد." . "<br>";
			alert("alert-success", "فایل با موفقیت آپلود شد");
			return $filename;
		} else {
			//echo "Sorry, there was an error uploading your file.";
			alert("alert-success", "Sorry, there was an error uploading your file.");
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
	if($check !== false) {
		//echo "File is an image - " . $check["mime"] . ".";
		$uploadOk = 1;
	} else {
		echo "File is not an image.";
		$uploadOk = 0;
	}
	
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
		
	if ($size > 2000000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}

	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
		echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}

	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	} else {
		echo $tmp_name . "<br>" . $target_file;
		if (move_uploaded_file($tmp_name, $target_file)) {
			echo "فایل ". basename($filename). " با موفقیت آپلود شد.";
			$sql2 = "SELECT count(m_id) FROM media WHERE bu_id = $bu_id AND m_name_file = '$type'";
			$check = get_var_query($sql2);
			if ( $check > 0 ) {
				$sql = "UPDATE media SET m_name = '$filename', m_type = 'user', m_name_file = '$type', bu_id = $bu_id WHERE bu_id = $bu_id AND m_name_file = '$type'";
			} else {
				$sql = "INSERT INTO media(m_name, m_type, m_name_file, bu_id) VALUES('$filename', 'user', '$type', $bu_id)";
			}
			$res = ex_query($sql);
		} else {
			echo "Sorry, there was an error uploading your file.";
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