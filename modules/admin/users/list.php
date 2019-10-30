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

$total = count_users('>=', 0);

if ($total) {
	$list_users = get_list_users('>=', 0, $total);
}

switch ($act) {
	case 'del':
		if (!$id) {
			abort(404);
		} else {
			del_user($id);
		}

		redirect('/admin/users');
		break;

	case 'ban':
		if (!$id) {
			abort(404);
		} else {
			update_one_col('role', 0, $id);
		}

		redirect('/admin/users');
		break;

	case 'remove_ban':
		if (!$id) {
			abort(404);
		} else {
			update_one_col('role', 1, $id);
		}

		redirect('/admin/users');
		break;
}

require_once('themes/' . THEME_ADMIN . '/layout/head.php');
require_once('themes/' . THEME_ADMIN . '/templates/users/list.php');
require_once('themes/' . THEME_ADMIN . '/layout/end.php');
