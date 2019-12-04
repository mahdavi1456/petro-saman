<?php
function insert_category($array){
	$cat_name = $array[0];
	$sql = "insert into category(cat_name) values('$cat_name')";
	$res = ex_query($sql);
	return $res;
}

function update_category($cat_id , $cat_name){
	$sql = "update category set cat_name = '$cat_name' where cat_id = $cat_id";
	$res = ex_query($sql);
	return $res;	
}

function delete_category($cat_id){
	$sql = "delete from category where cat_id = '$cat_id'";
	$res = ex_query($sql);
}

function list_category() {
	$sql = "select * from category";
	$res = get_select_query($sql);
	return $res;
}

function a_category($cat_id) {
	$sql = "select * from category where cat_id = $cat_id";
	$res = get_select_query($sql);
	return $res;
}

function show_category_as_select($cat_id = 0){ ?>
	<select id="cat_id" name="cat_id" class="form-control">
		<option>-</option>
		<?php
		$res = list_category();
		if(count($res)>0){
			foreach($res as $row){
			?>
			<option <?php if($row['cat_id']==$cat_id)echo "selected"; ?> value="<?php echo $row['cat_id']; ?>"><?php echo per_number($row['cat_name']); ?></option>
			<?php
			}
		} ?>
	</select>
	<?php
}

function get_category_name($c_id) {
	$sql = "select cat_name from category where cat_id = $c_id";
	$res = get_var_query($sql);
	if($res!=""){
		return $res;
	}else
	{
		return 0;
	}
}
?>