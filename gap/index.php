<?php
require dirname(__FILE__) . '/vendor/autoload.php';
use Gap\SDP\Api;


function gap_send_text($mobile, $text) {
	$token = "95912b41eaa2daf07c0609d86d11d55e0a39dfc4ae4e6bd023d70b1d4092be2d";
	$gap = new Api($token);
	$message_id = $gap->sendText($mobile, $text);
}

gap_send_text("+989140609344", "درخوسات با موفقیت ثبت شد");
gap_send_text("+989138630341", "درخواست با موفقیت ثبت شد");
