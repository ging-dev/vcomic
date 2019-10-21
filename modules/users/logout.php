<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

require_once('system/bootstrap.php');

if (!$user_id) {
	abort('404');
}

if ($user_id) {
	session_destroy();
	redirect('/');
} else {
	redirect('/');
}
