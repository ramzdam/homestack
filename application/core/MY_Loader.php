<?php (defined('BASEPATH')) OR exit('No direct script access allowed');

/* load the MX_Loader class */
require APPPATH."third_party/MX/Loader.php";

class MY_Loader extends MX_Loader {

    protected function _ci_get_component($component)
    {
        $CI =& get_instance();
        return $CI->$component;
    }

}