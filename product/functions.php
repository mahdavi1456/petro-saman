<?php
function insert_product($array){
	$p_name = $array[0];
	$p_unit = $array[1];
	$sql = "insert into product(p_name, p_unit) values('$p_name', '$p_unit')";
	$res = ex_query($sql);
	return $res;
}

function update_product($array){
	$p_id = $array[0];
	$p_name = $array[1];
	$p_unit = $array[2];
	$sql = "update product set p_name = '$p_name', p_unit = '$p_unit' where p_id = $p_id";
	$res = ex_query($sql);
	return $res;	
}

function delete_product($p_id){
	$sql = "delete from product where p_id = '$p_id'";
	$res = ex_query($sql);
}

function list_product() {
	$sql = "select * from product";
	$res = get_select_query($sql);
	return $res;
}

function a_product($p_id) {
	$sql = "select * from product where p_id = '$p_id'";
	$res = get_select_query($sql);
	return $res;
}

function show_product_as_select($p_id = 0){ ?>
	<select id="p_id" name="p_id" class="form-control select2">
		<?php
		$res = list_product();
		if(count($res)>0){
			foreach($res as $row){
			?>
			<option <?php if($row['p_id']==$p_id)echo "selected"; ?> value="<?php echo $row['p_id']; ?>"><?php echo $row['p_name']; ?></option>								
			<?php
			} 
		} ?>
	</select>
	<?php
}

function get_product_name($p_id) {
	$sql = "select p_name from product where p_id = $p_id";
	$res = get_var_query($sql);
	if($res!=""){
		return $res;
	}else
	{
		return 0;
	}
}
function get_product_type($p_id) {
	$sql = "select p_type from product where p_id = $p_id";
	$res = get_var_query($sql);
	if($res!=""){
		return $res;
	}else
	{
		return 0;
	}
}
function get_product_unit($p_id) {
	$sql = "select p_unit from product where p_id = $p_id";
	$res = get_var_query($sql);
	if($res!=""){
		return $res;
	}else
	{
		return 0;
	}
}

?>