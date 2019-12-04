<?php
class sms {
	public function send_smses($numbers, $msg){
		$url = "https://ippanel.com/services.jspd";
		$rcpt_nm = $numbers;
		$param = array(
			'uname' => 'mahdavi1456',
			'pass' => 'm54692764o',
			'from' => '+985000125475',
			'message' => $msg,
			'to' => json_encode($rcpt_nm),
			'op' => 'send'
		);
		$handler = curl_init($url);
		curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
		curl_setopt($handler, CURLOPT_POSTFIELDS, $param);
		curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
		$response2 = curl_exec($handler);

		$response2 = json_decode($response2);
		$res_code = $response2[0];
		$res_data = $response2[1];
	}

	public function send_sms_confirm($fb_id, $type){
		$admin_mobiles = get_mobiles_by_type("مدیر");
		$financial_mobiles = get_mobiles_by_type("مالی");
		$sale_mobiles = get_mobiles_by_type("فروش");
		$docs_mobiles = get_mobiles_by_type("مالی");
		$lab_mobiles = get_mobiles_by_type("آزمایشگاه");
		//$dr_mobile = get_var_query("select dr_mobile from factor_body inner join driver on factor_body.dr_id = driver.dr_id where factor_body.fb_id = $fb_id");
		//$customer_mobile = get_customer_mobile($fb_id);
		switch ($type) {
			case 'financial1':
				$msg = "یک پیش فاکتور فروش با کد " . $fb_id . " در اتوماسیون ثبت شده است و در انتظار تایید مدیر است.";
				$this->send_smses($admin_mobiles, $msg);
				break;
			case 'fb_verify_admin1':
				$msg = "پیش فاکتور شماره " . $fb_id . " توسط مدیر تایید شده است و منتظر تایید فروش است.";
				$this->send_smses($sale_mobiles, $msg);
				break;
			case 'fb_verify_customer':
				$msg = "پیش فاکتور شماره " . $fb_id . " توسط فروش تایید شده است و منتظر تایید مالی است.";
				$this->send_smses($docs_mobiles, $msg);
				break;
			case 'fb_sale_delete':
				$msg = "پیش فاکتور فروش شماره " . $fb_id . "حذف شد.";
				$this->send_smses($admin_mobiles, $msg);
				break;
		}
	}

	public function send_sms_confirm_buy($fb_id, $type){
		$admin_mobiles = get_mobiles_by_type("مدیر");
		$financial_mobiles = get_mobiles_by_type("مالی");
		$sale_mobiles = get_mobiles_by_type("فروش");
		$docs_mobiles = get_mobiles_by_type("اسناد");
		$lab_mobiles = get_mobiles_by_type("آزمایشگاه");
		//$dr_mobile = get_var_query("select dr_mobile from factor_body inner join driver on factor_body.dr_id = driver.dr_id where factor_body.fb_id = $fb_id");
		//$customer_mobile = get_customer_mobile($fb_id);
		switch ($type) {
			case 'fb_verify_sale':
				$msg = "یک پیش فاکتور خرید با کد " . $fb_id . " در اتوماسیون ثبت شده است و در انتظار تایید مدیر است.";
				$this->send_smses($admin_mobiles, $msg);
				break;
			//case 'sale1':
			case 'fb_verify_admin1':
				$msg = "پیش فاکتور شماره " . $fb_id . " توسط مدیر تایید شده است و منتظر تایید مالی است.";
				$this->send_smses($financial_mobiles, $msg);
				break;
			//case 'sale3_separate':
			case 'fb_verify_finan':
				$msg = "پیش فاکتور شماره " . $fb_id . " توسط مالی تایید شده است و منتظر تعیین وضعیت خرید است.";
				$this->send_smses($sale_mobiles, $msg);
				break;
			case 'fb_outsourcing_cycle':
				$msg = "پیش فاکتور شماره " . $fb_id . " برون سپاری شد.";
				$this->send_smses($admin_mobiles, $msg);
				break;
			case 'fb_buy_cycle':
				$msg = "پیش فاکتور شماره " . $fb_id . " خرید مستقیم شد.";
				$this->send_smses($admin_mobiles, $msg);
				break;
			case 'fb_buy_delete':
				$msg = "پیش فاکتور خرید شماره " . $fb_id . "حذف شد.";
				$this->send_smses($admin_mobiles, $msg);
				break;
		}
	}
}
