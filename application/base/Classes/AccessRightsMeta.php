<?php
/**
 * Created by PhpStorm.
 * User: M.ULLANG
 * Date: 12/1/14
 * Time: 4:09 PM
 */

class AccessRightsMeta {


    public function __construct() {

    }

    public static function getViewAccess() {
        return array(
            "v_r" => "Reports",
            "v_um" => "User Management",
            "v_ll" => "Login Logs",
            "v_t" => "Transfer",
            "v_b" => "Bill Pay",
            "v_gl" => "Buy Load G2L",
            "v_d" => "Donate",
            "v_bp" => "Bank Pay",
            "v_s" => "Settings",
        );
    }

    public static function getReportAccess() {
        return array(
            "r_um" => "User Management",
            "r_ll" => "Login Logs",
            "r_t" => "Transfer",
            "r_b" => "Bill Pay",
            "r_gl" => "Buy Load G2L",
            "r_d" => "Donate",
            "r_bp" => "Bank Pay",
        );
    }

    public static function getAdminAccess() {
        return array(
            "av_a" => "Is Administrator?",
            "av_ma" => "Can modify user account?",
            "av_p" => "Can reset password",
            "av_u" => "Can ban user",
            "av_fa" => "Has full access",
        );
    }
}