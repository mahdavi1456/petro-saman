<?php 
class user{


    public function get_current_user_level(){
        $u_id = $_SESSION['user_id'];
        $u_level = get_var_query("select u_level from user where u_id = $u_id");
        return $u_level;
    }

    public function get_user_name($u_id) {
        $res = get_select_query("select u_name, u_family from user where u_id = $u_id");
        if(count($res) > 0) {
            return $res[0]['u_name'] . " " . $res[0]['u_family'];
        } else {
            return "نامعتبر";
        }
    }


}
?>