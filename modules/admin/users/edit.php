<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

require_once('system/bootstrap.php');

$title = 'Sửa Thành Viên';

if (!$user_id || ($user['role'] < 9)) {
	abort(404);
}

$error    = false;
$data = get_info_id($id);

$fullname = isset($_POST['fullname']) ? _e(trim($_POST['fullname'])) : $data['fullname'];
$email = isset($_POST['email']) ? _e(trim($_POST['email'])) : $data['email'];
$role = isset($_POST['role']) ? _e(trim($_POST['role'])) : $data['role'];

if ($request_method == 'POST') {
	if (!$fullname || !$email) {
		$error = 'Không được bỏ trống thông tin!';
	}

	if (!$error) {
		update_user($email, $role, $fullname, $id);

		redirect('/admin/users');
	}
}

require_once('themes/' . THEME . '/layout/admin/head.php');
require_once('themes/' . THEME . '/templates/admin/users/edit.php');
require_once('themes/' . THEME . '/layout/admin/end.php');