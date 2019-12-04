<?php
class stock{

	public function get_stock_report($st_id, $p_id, $cat_id){

		$stock = 0;
		$st_type = get_var_query("select st_type from storage_list where st_id = $st_id");

		if ($st_type == "storage") {

			$in_from_bar = 0;
			$in_from_bar = get_var_query("select sum(bar_quantity) from bar_bring where p_id = $p_id and cat_id = $cat_id and st_id_to = $st_id and fb_type = 'buy'");
			$out_from_bar = 0;
			$out_from_bar = get_var_query("select sum(bar_quantity) from bar_bring where p_id = $p_id and cat_id = $cat_id and st_id_from = $st_id and fb_type = 'buy'");
			
			$in_from_produce = 0;
			$in_from_produce = get_var_query("select sum(prc_val) from produce where inp_p_id = $p_id and inp_cat_id = $cat_id and prc_st_id = $st_id");
			$out_from_produce = 0;
			$out_from_produce = get_var_query("select sum(prc_val) from produce where prc_p_id = $p_id and prc_cat_id = $cat_id and prc_st_id = $st_id");
			
			$out_for_sell = 0;
			$out_for_sell = get_var_query("select sum(bar_exited) from bar_bring where p_id = $p_id and cat_id = $cat_id and st_id_from = $st_id and fb_type = 'sale'");
			
			$stock = $in_from_bar - $out_from_bar - $in_from_produce + $out_from_produce - $out_for_sell;

		} else if ( $st_type == "outsourcer" ) {

			$s1 = get_var_query("select sum(bar_quantity) from bar_bring bb inner join factor_buy_body fbb on bb.fb_id = fbb.fb_id where bb.p_id = $p_id and bb.cat_id = $cat_id and bb.st_id_to = $st_id and fbb.fb_status = 0 and bb.fb_type = 'buy'");
			$s2 = get_var_query("select sum(bar_quantity) from bar_bring bb inner join factor_buy_body fbb on bb.fb_id = fbb.fb_id where bb.p_id = $p_id and bb.cat_id = $cat_id and bb.st_id_from = $st_id and fbb.fb_status = 0 and bb.fb_type = 'buy'");
		
			$stock = $s1 - $s2;

		} else if ( $st_type == "miner" ) {
			//$sql ="select fb_quantity from factor_buy_body  fbb inner join bar_bring bb on bb.fb_id = fbb.fb_id where bb.p_id = $p_id and bb.cat_id = $cat_id and bb.st_id_to = $st_id and fbb.fb_status = 0 and bb.fb_type = 'buy'";			;
			$sql = "select sum(fb_quantity) from factor_buy_body bb inner join factor_buy b on bb.f_id = b.f_id where bb.ma_id = $p_id and bb.cat_id = $cat_id and b.st_id = $st_id and bb.fb_verify_finan > 0";
			$fb_quantity = get_var_query($sql);
			
			$sql2 = "select sum(bar_quantity) from bar_bring where p_id = $p_id and cat_id = $cat_id and st_id_from = $st_id and fb_type = 'buy'";
			$bar_exited = get_var_query($sql2);
			
			$s5 = get_var_query("select sum(bar_quantity) from bar_bring where p_id = $p_id and cat_id = $cat_id and st_id_to = $st_id and fb_type = 'buy'");
			$stock = ($fb_quantity + $s5)- $bar_exited;
			//echo "m is:".$s5 . "<br> kh is:" . $fb_quantity . "<br> ext is:" . $bar_exited ;
		}

		return $stock;
		
	}

	public function get_real_stock($p_id, $cat_id){
		$produce_s = "select sum(prc_val) from produce where prc_p_id = $p_id and prc_cat_id = $cat_id";
		$produce_res = get_var_query($produce_s);
		
		$ret_s = "select sum(re_weight) from returned_factor inner join factor_body on returned_factor.fb_id = factor_body.fb_id where factor_body.p_id = $p_id and factor_body.cat_id = $cat_id and returned_factor.re_type='فروش'";
		$ret_res = get_var_query($ret_s);
		
		$sale_s = "select sum(fb_amount_sent) from factor_body inner join factor on factor_body.f_id = factor.f_id where factor.f_type = 'محصول' and factor_body.p_id = $p_id and factor_body.cat_id = $cat_id and factor_body.fb_verify_finan > 0";
		$sale_res = get_var_query($sale_s);
		
		return $produce_res + $ret_res - $sale_res;
	}

	public function get_sale_stock($p_id, $cat_id){
		$produce_s = "select sum(prc_val) from produce where prc_p_id = $p_id and prc_cat_id = $cat_id and prc_status = 1";
		$produce_res = get_var_query($produce_s);
		
		$ret_s = "select sum(re_weight) from returned_factor inner join factor_body on returned_factor.fb_id = factor_body.fb_id where factor_body.p_id = $p_id and factor_body.cat_id = $cat_id and returned_factor.re_type='فروش'";
		$ret_res = get_var_query($ret_s);
		
		$sale_s = "select sum(fb_quantity) from factor_body inner join factor on factor_body.f_id = factor.f_id where factor.f_type = 'محصول' and factor_body.p_id = $p_id and factor_body.cat_id = $cat_id and factor_body.fb_verify_finan > 0";
		$sale_res = get_var_query($sale_s);
		
		return $produce_res + $ret_res - $sale_res;
	}
	
	

	public function get_real_material_stock($ma_id, $cat_id){
		$buy_s = "select sum(fb_quantity) from factor_buy_body where ma_id = $ma_id and cat_id = $cat_id and fb_verify_finan != 0";
		$buy_res = get_var_query($buy_s);
		
		$ret_s = "select sum(re_weight) from returned_factor inner join factor_buy_body on returned_factor.fb_id = factor_buy_body.fb_id where factor_buy_body.ma_id = $ma_id and factor_buy_body.cat_id = $cat_id and returned_factor.re_type='خرید'";
		$ret_res = get_var_query($ret_s);
		
		$sale_s = "select sum(fb_quantity) from factor_body inner join factor on factor_body.f_id = factor.f_id where factor.f_type = 'مواد اولیه' and factor_body.p_id = $ma_id and factor_body.cat_id = $cat_id and factor_body.fb_verify_finan > 0";
		$sale_res = get_var_query($sale_s);
		
		return $buy_res - $ret_res - $sale_res;
	}

	public function get_sale_material_stock($ma_id, $cat_id){
		$buy_s = "select sum(fb_amount_get) from factor_buy_body where ma_id = $ma_id and cat_id = $cat_id";
		$buy_res = get_var_query($buy_s);
		
		$ret_s = "select sum(re_weight) from returned_factor inner join factor_buy_body on returned_factor.fb_id = factor_buy_body.fb_id where factor_buy_body.ma_id = $ma_id and factor_buy_body.cat_id = $cat_id and returned_factor.re_type='خرید'";
		$ret_res = get_var_query($ret_s);
		
		$sale_s = "select sum(fb_quantity) from factor_body inner join factor on factor_body.f_id = factor.f_id where factor.f_type = 'مواد اولیه' and factor_body.p_id = $ma_id and factor_body.cat_id = $cat_id and factor_body.fb_verify_finan > 0";
		$sale_res = get_var_query($sale_s);
		
		return $buy_res - $sale_res;
	}
	
	public function get_outsourcer_stock($fb_id, $st_id){
	
		$sql_b = "select sum(bar_quantity) from bar_bring where st_id_to = $st_id and fb_id = $fb_id";
		$res_b = get_var_query($sql_b);
		
		$sql_c = "select sum(fb_quantity) from factor_buy_body where fb_id = $fb_id";
		$res_c = get_var_query($sql_c);
		
		
		return $res_c - $res_b;
	}
	
	public function get_factor_buy_body_stock($fb_id){
		$sql = "select sum(fb_quantity) from factor_buy_body where fb_id = $fb_id";
		$res = get_var_query($sql);		
		return $res;
	}
	
	public function get_recieved_stock($st_id, $fb_id){
		$sql = "select sum(bar_quantity) from bar_bring where st_id_from = $st_id and fb_id = $fb_id";
		$res = get_var_query($sql);		
		return $res;
	}

}