<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| Hooks
| -------------------------------------------------------------------------
| This file lets you define "hooks" to extend CI without hacking the core
| files.  Please see the user guide for info:
|
|	http://codeigniter.com/user_guide/general/hooks.html
|
*/
$hook['pre_system'][] = array(
    'class' => 'Autoloader',
    'function' => 'register',
    'filename' => 'Autoloader.php',
    'filepath' => 'hooks',
    'params' => array(APPPATH.'base/',
        APPPATH.'base/Abstract/',
        APPPATH.'base/Repositories/',
        APPPATH.'base/Interfaces/',
        APPPATH.'base/Classes/',
        APPPATH.'base/Services/',
        APPPATH . 'core/',
        FCPATH . 'vendor/')
);


/* End of file hooks.php */
/* Location: ./application/config/hooks.php */