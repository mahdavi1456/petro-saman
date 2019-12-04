<?php
require_once"../includes.php";
require_once"functions.php";
if(isset($_POST['get_product_price'])){
	$stock = new stock();
	$p_id = $_POST['p_id'];
	$cat_id = $_POST['cat_id'];
	?><br>
	<div class="alert alert-success">
		<?php
		$res_st = get_select_query("select * from storage_list");
		if(count($res_st) > 0){
			foreach($res_st as $row_st){
				$v = $stock->get_stock_report($row_st['st_id'], $p_id, $cat_id);
				if($v > 0){
					echo per_number(get_storage_name($row_st['st_id'])) . ": ";
					echo per_number(number_format($v)) . "<hr>";
				}
			}
		}
		?>
	</div>
	<?php
	exit();
}
if(isset($_POST['storage_change'])){
	$customer_id = $_POST['customer_id'];

	$res = 0;
	$res = get_select_query("select * from storage_list where c_id = $customer_id");
	if($res){
		foreach($res as $row){ ?>
		<option value="<?php echo $row['st_id']; ?>"><?php echo $row['st_name']; ?></option>
		<?php
		}
	}

	exit();
}
?>