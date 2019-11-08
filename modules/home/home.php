<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

require_once('system/bootstrap.php');
require_model('home');
require_model('nomination');

$list_banner = list_banner();
$list_nomination = list_nomination();

require_once('themes/' . THEME . '/layout/head.php');
require_once('themes/' . THEME . '/templates/home/home.php');
require_once('themes/' . THEME . '/layout/end.php');
