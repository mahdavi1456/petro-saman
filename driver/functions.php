<?php 
function insert_driver($array){
	$dr_name = $array[0];
	$dr_family = $array[1];
	$dr_national = $array[2];
	$dr_car = $array[3];
	$dr_plaque = $array[4];
	$dr_mobile = $array[5];
	$dr_status = $array[6];
	$sql = "insert into driver(dr_name, dr_family, dr_national, dr_car, dr_plaque ,dr_mobile , dr_status) values('$dr_name', '$dr_family', '$dr_national', '$dr_car', '$dr_plaque' ,'$dr_mobile' ,'$dr_status')";
	$res = ex_query($sql);
	return $res;
}

function update_driver($array){
	$dr_id = $array[0];
	$dr_name = $array[1];
	$dr_family = $array[2];
	$dr_national = $array[3];
	$dr_car = $array[4];
	$dr_plaque = $array[5];
	$dr_mobile = $array[6];
	$dr_status = $array[7];
	$sql = "update driver set dr_name = '$dr_name', dr_family = '$dr_family', dr_national = '$dr_national', dr_car = '$dr_car', dr_plaque = '$dr_plaque' , dr_mobile = '$dr_mobile' , dr_status = $dr_status where dr_id = $dr_id";
	$res = ex_query($sql);
	return $res;	
}

function update_driver_media($array){
	$dr_id = $array[0];
	$name = $array[1];
	$value = $array[2];
	$sql = "update driver set $name = '$value' where dr_id = $dr_id";
	$res = ex_query($sql);
	return $res;	
}

function delete_driver($dr_id){
	$sql = "delete from driver where dr_id = $dr_id";
	$res = ex_query($sql);
}

function select_a_driver($dr_id){
	$sql = "select * from driver where dr_id = $dr_id";
	$res = get_select_query($sql);
	return $res;
}

function list_driver() {
	$sql = "select * from driver";
	$res = get_select_query($sql);
	return $res;
}

function get_driver_name($dr_id) {
	$sql = "select dr_name, dr_family from driver where dr_id = $dr_id";
	$res = get_select_query($sql);
	return $res[0]['dr_name'] . " " . $res[0]['dr_family'];
}

function get_driver_car($dr_id) {
	$sql = "select dr_car from driver where dr_id = $dr_id";
	$res = get_select_query($sql);
	return $res[0]['dr_car'];
}

function get_driver_plaque($dr_id) {
	$sql = "select dr_plaque from driver where dr_id = $dr_id";
	$res = get_select_query($sql);
	return $res[0]['dr_plaque'];
}

function get_driver_national($dr_id) {
	$sql = "select dr_national from driver where dr_id = $dr_id";
	$res = get_select_query($sql);
	return $res[0]['dr_national'];
}

function get_driver_mobile($dr_id) {
	$sql = "select dr_mobile from driver where dr_id = $dr_id";
	$res = get_select_query($sql);
	return $res[0]['dr_mobile'];
}

function show_store_as_select($dr_id){ ?>
	<select name="dr_id" class="form-control select2">
		<?php
		$res = list_driver();
		if(count($res)>0){
			foreach($res as $row){
			?>
			<option <?php if($row['dr_id']==$s_id)echo "selected"; ?> value="<?php echo $row['dr_id']; ?>"><?php echo $row['dr_name'] . " " . $row['dr_family']; ?></option>								
			<?php
			} 
		} ?>
	</select>
	<?php
}
?>