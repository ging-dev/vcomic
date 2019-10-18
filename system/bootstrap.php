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
define('VERSION', '0.0.1');
define('ENV', 'development');

if (ENV === 'development') {
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
}

session_name('vComic');
session_start();

require_model('home');
require_model('user');

$user_id = 0;
$user = [];
if (isset($_SESSION['username'])) {
    $username = trim($_SESSION['username']);
    $_user = get_info($username);

    if ($_user) {
        $user = $_user;
        $user_id = $user['id'];
    }
    $stmt = null;
    unset($_user);
}

$request_method = isset($_SERVER['REQUEST_METHOD']) ? trim($_SERVER['REQUEST_METHOD']) : '';
$env = array(
    'title' => 'vComic.',
    'keywords' => 'doc truyen, web truyen, vcomic, truyen vcomic, doc truyen chu',
    'description' => 'vComic.'
);
