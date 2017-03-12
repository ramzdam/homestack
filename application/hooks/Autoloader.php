<?php if (! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by JetBrains PhpStorm.
 * User: madzmar
 * To change this template use File | Settings | File Templates.
 */

class Autoloader
{
    private $_include_paths = array();

    public function register(array $paths = array())
    {
        $this->_include_paths = $paths;

        spl_autoload_register(array($this, 'autoloader'));
    }

    public function autoloader($class = null)
    {

        foreach ($this->_include_paths as $path)
        {
            $filepath = $path . $class . EXT;

            if (! class_exists($class, FALSE) && is_file($filepath))
            {
                include_once($filepath);
                break;
            }
        }

    }
}