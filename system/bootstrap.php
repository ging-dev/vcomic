<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

require_once('database/table_schema.php');
require_once('database/configs.php');
require_once('functions.php');
require_once('routes.php');

define('SITE_URL', 'http://vcomic.net');
define('ROOT', dirname(dirname(__FILE__)));
define('THEME', 'colab');
define('THEME_ADMIN', 'admin');
define('VERSION', '0.0.1');
define('ENV', 'development');

if (ENV === 'development') {
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
}

session_name('vComic');
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');

require_model('home');
require_model('user');

$user_id = 0;
$user = [];
$cuid = '';
$cups = '';

if (isset($_SESSION['id'], $_SESSION['password'])) {
    $cuid = $_SESSION['id'];
    $cups = _e($_SESSION['password']);
} else if (isset($_COOKIE['cuid'], $_COOKIE['cups'])) {
    $cuid = $_COOKIE['cuid'];
    $cups = $_COOKIE['cups'];
}

if ($cuid && $cups) {
    $_user = get_info_id($cuid);

    if ($_user) {
        if ($cups === $_user['password']) {
            $user = $_user;
            $user_id = $user['id'];
        } else {
            setcookie('cuid', '');
            setcookie('cups', '');
            session_destroy();
        }
    }
}

if ($user_id) {
    if ($user['role'] == 0) {
        abort(404);
    }
}

$request_method = isset($_SERVER['REQUEST_METHOD']) ? trim($_SERVER['REQUEST_METHOD']) : '';
$per_page = 20;
$env = array(
    'title' => 'vComic.',
    'keywords' => 'doc truyen, web truyen, vcomic, truyen vcomic, doc truyen chu',
    'description' => 'vComic.'
);
