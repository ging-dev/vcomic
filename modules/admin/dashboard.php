<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

require_once('system/bootstrap.php');
require_model('category');
require_model('chapter');
require_model('story');
require_model('user');

$title = 'Dashboard';

if (!$user_id || ($user['role'] < 9)) {
	abort(404);
}

$total = count_users('>=', 4);

if ($total) {
	$list_mods = get_list_users('>=', 4, $total);
}

require_once('themes/' . THEME_ADMIN . '/layout/head.php');
require_once('themes/' . THEME_ADMIN . '/templates/dashboard.php');
require_once('themes/' . THEME_ADMIN . '/layout/end.php');