<?php 
class media{

    public function upload_factor_media($fb_id, $type, $mf_name, $file){
        $date = jdate("Y/n/j");
		$filename = $file['name'];
		$tmp_name = $file['tmp_name'];
		$size = $file['size'];
		$mf_link = upload_file($filename, $tmp_name, $size, "0" , $fb_id , "factor_media");
		if($mf_link) {
		$sql = "insert into media_factor (mf_date, mf_link, mf_type, mf_name, fb_id) values ('$date', '$mf_link', '$type', '$mf_name', $fb_id)";
        $mf_id = ex_query($sql);
        return $mf_id;
        }
		echo "<meta http-equiv='refresh' content='0'/>";
    }

    public function delete_factor_media($mf_id , $mf_link){
		$path = str_replace($_SERVER['DOCUMENT_ROOT'], '', "../uploads/factor_media/" . $mf_link);
		if(unlink($path)){
			$sql = "delete from media_factor where mf_id = $mf_id";
			ex_query($sql);
		}
		$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		?>
		<script type="text/javascript">
			window.location.href = "<?php echo $url; ?>";
		</script>
		<?php
	}

	public function upload_media($file , $name_folder){
		$filename = $file['name'];
		$tmp_name = $file['tmp_name'];
		$size = $file['size'];
		$file_link = upload_file($filename, $tmp_name, $size, "0" , "0" , $name_folder);
		return $file_link;
	}

	public function upload_media_header($file, $media_name){
		$filename = $file['name'];
		$tmp_name = $file['tmp_name'];
		$size = $file['size'];
		$file_link = upload_file_header($filename, $tmp_name, $size , $media_name);
		return $file_link;
    }

	public function delete_media($link , $type){
		$path = str_replace($_SERVER['DOCUMENT_ROOT'], '', "../uploads/" . $type . "/" . $link);
		if(unlink($path)){
			return "true";
		}
		$url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		?>
		<script type="text/javascript">
			window.location.href = "<?php echo $url; ?>";
		</script>
		<?php
	}

	public function is_404($url) {
    	$handle = curl_init($url);
    	curl_setopt($handle,  CURLOPT_RETURNTRANSFER, TRUE);

    	/* Get the HTML or whatever is linked in $url. */
    	$response = curl_exec($handle);

    	/* Check for 404 (file not found). */
    	$httpCode = curl_getinfo($handle, CURLINFO_HTTP_CODE);
    	curl_close($handle);

    	/* If the document has loaded successfully without any redirection or error */
    	if ($httpCode >= 200 && $httpCode < 300) {
        	return false;
    	} else {
	        return true;
    	}
	}

	public function get_user_avatar($u_id) {
		$u_link = get_var_query("select u_link from user where u_id = $u_id");
		if($u_link == "" || is_null($u_link)){
			$u_file = get_the_url() . "user/avatar.png";
		} else {
			$u_file = get_the_url() . "uploads/user/" . $u_link;
		}
		if($this->is_404($u_file)){
			$u_file = get_the_url() . "user/avatar.png";
		}
		return $u_file;
	}

	public function get_logo_url(){
		return get_the_url() . "dist/img/set/logo.png";
	}

}