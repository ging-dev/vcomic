<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

$routes = [
	'/' => 'home/home.php',
	'/login' => 'users/login.php',
	'/register' => 'users/register.php',
	'/logout' => 'users/logout.php',
	'/search' => 'search.php',

	// users
	'/profile' => 'users/profile.php',
	'/users/recover' => 'users/recover.php',
	'/users/recover/set/(.*)/(.*)' => 'users/recover.php?act=set&username=$1&recover_code=$2',
];