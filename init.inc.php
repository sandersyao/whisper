<?php
/**
 * 初始化文件
 *
 * @author  yaoxiaowei
 */
require_once    dirname(__FILE__) . '/config/config.inc.php';
require_once    LIB . 'Application.class.php';
require_once    'MI.php';

date_default_timezone_set(TIME_ZONE_DEFAULT);

Application::initialize();

//xhprof initailize
$xhprofPath = isset($_SERVER) && isset($_SERVER['PHP_SELF'])    ? $_SERVER['PHP_SELF']  : $argv[0];
$xhprofMark = str_replace(array('.', '/'), '_', $xhprofPath);
XHProfAnalysis::initialize($xhprofMark);
register_shutdown_function('XHProfAnalysis::save');

