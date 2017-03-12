<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: madzmar
 * To change this template use File | Settings | File Templates.
 */
require_once(APPPATH.'/base/Abstract/REST_Controller.php');
//require_once(APPPATH.'libraries/REST_Controller.php');
abstract class Apicontroller extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();

    }
}