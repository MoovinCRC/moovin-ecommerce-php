<?php
define('MOOVIN_LIB_PATH', dirname(__FILE__));

if ( defined('MOOVIN_DEBUG') ? MOOVIN_DEBUG : false ){
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}

require_once "control/ctrl_moovin.php";

