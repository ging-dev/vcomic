<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

require_once('system/bootstrap.php');

$title = 'Quản Trị Thành Viên';

if (!$user_id || ($user['role'] < 9)) {
	abort(404);
}

switch ($act) {
	case 'del':
		if (!$username) {
			abort(404);
		} else {
			del_user($username);
		}

		redirect('/admin/users');
		break;

	case 'ban':
		if (!$username) {
			abort(404);
		} else {
			update_role(0, $username);
		}

		redirect('/admin/users');
		break;

	case 'remove_ban':
		if (!$username) {
			abort(404);
		} else {
			update_role(1, $username);
		}

		redirect('/admin/users');
		break;
}

require_once('themes/' . THEME . '/layout/admin/head.php');
require_once('themes/' . THEME . '/templates/admin/users/list.php');
require_once('themes/' . THEME . '/layout/admin/end.php');