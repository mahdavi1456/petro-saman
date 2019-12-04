<?php
function timeDiff($time2, $time1){
    if($time1!="" && $time2!=""){
        $list2 = explode('/', $time2);
        $time2 = jalali_to_gregorian($list2[0], $list2[1], $list2[2], '-');
        $list1 = explode('/', $time1);
        $time1 = jalali_to_gregorian($list1[0], $list1[1], $list1[2], '-');
        $diff = strtotime($time2) - strtotime($time1);
        return ($diff / 3600) / 24;
    }
}

function per_number($number){
    return str_replace(
        range(0, 9),
        array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'),
        $number
    );
}

function eng_number($number){
    return str_replace(
        array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹'),
        range(0, 9),
        $number
    );
}

function get_user_type($username){
    $user_type = get_select_query("select user_type from user where u_sername='$username'");
    return $user_type;
}

function get_user_id($username){
    $user_id = get_select_query("select u_id from user where u_username='$username'");
    return $user_id;
}

function is_admin($level){
    if($level=="مدیر")
        return true;
    else
        return false;
}

function name_month($m){
    switch ($m) {
        case 1:
            return "فروردین";
            break;
        case 2:
            return "اردیبهشت";
            break;
        case 3:
            return "خرداد";
            break;
        case 4:
            return "تیر";
            break;
        case 5:
            return "مرداد";
            break;
        case 6:
            return "شهریور";
            break;
        case 7:
            return "مهر";
            break;
        case 8:
            return "آبان";
            break;
        case 9:
            return "آذر";
            break;
        case 10:
            return "دی";
            break;
        case 11:
            return "بهمن";
            break;
        case 12:
            return "اسفند";
            break;
    }
}

function convert_number($number) {
    $ones = array("", "یک",'دو&nbsp;', "سه", "چهار", "پنج", "شش", "هفت", "هشت", "نه", "ده", "یازده", "دوازده", "سیزده", "چهارده", "پانزده", "شانزده", "هفده", "هجده", "نونزده");

        $tens = array("", "", "بیست", "سی", "چهل", "پنجاه", "شصت", "هفتاد", "هشتاد", "نود");

        $tows = array("", "صد", "دویست", "سیصد", "چهار صد", "پانصد", "ششصد", "هفتصد", "هشت صد", "نه صد");

       	if (($number < 0) || ($number > 999999999)) {
			throw new Exception("Number is out of range");
		}

		$Gn = floor($number / 1000000);

		/* Millions (giga) */

		$number -= $Gn * 1000000;

		$kn = floor($number / 1000);

		/* Thousands (kilo) */

		$number -= $kn * 1000;

		$Hn = floor($number / 100);

		/* Hundreds (hecto) */

		$number -= $Hn * 100;

		$Dn = floor($number / 10);

		/* Tens (deca) */

		$n = $number % 10;

		/* Ones */

		$res = "";

		if ($Gn) {

			$res .= convert_number($Gn) .  " میلیون و ";

		}

		if ($kn) {

			$res .= (empty($res) ? "" : " ") . convert_number($kn) . " هزار و";

		}

		if ($Hn) {

			$res .= (empty($res) ? "" : " ") . $tows[$Hn] . " و ";

		}

		if ($Dn || $n) {

			if (!empty($res)) {

				$res .= "";

			}

			if ($Dn < 2) {

				$res .= $ones[$Dn * 10 + $n];
			} else {
				$res .= $tens[$Dn];
				if ($n) {
					$res .= " و " . $ones[$n];
				}
			}
		}
		if (empty($res)) {
			$res = "صفر";
		}
		$res=rtrim($res," و");
		return $res;
}