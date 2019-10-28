<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

require_once('system/bootstrap.php');

$title = 'Thêm Thành Viên';

if (!$user_id || ($user['role'] < 9)) {
	abort(404);
}

$error    = false;
$username = isset($_POST['username']) ? _e(trim($_POST['username'])) : '';
$fullname = isset($_POST['fullname']) ? _e(trim($_POST['fullname'])) : '';
$password = isset($_POST['password']) ? _e(trim($_POST['password'])) : '';
$email = isset($_POST['email']) ? _e(trim($_POST['email'])) : '';
$role = isset($_POST['role']) ? _e(trim($_POST['role'])) : '';

if ($request_method == 'POST') {
	if (!$username || !$fullname || !$password || !$email || !$role) {
		$error = 'Không được bỏ trống thông tin!';
	} else {
		if (mb_strlen($username) < 4) {
			$error = 'Tài khoản mem từ 6-60, quản trị từ 4-60';
		}

		if (get_info($username)) {
			$error = 'Tài khoản này đã tồn tại';
		}
		
		if (mb_strlen($password) < 8) {
			$error = 'Mật khẩu phải lớn hơn 8';
		}
	}

	if (!$error) {
		insert_user($username, $email, md5(md5($password)), $role, $fullname, $username . '.jpg', time());
		set_avatar($username);

		redirect('/admin/users');
	}
}

require_once('themes/' . THEME_ADMIN . '/layout/head.php');
require_once('themes/' . THEME_ADMIN . '/templates/users/add.php');
require_once('themes/' . THEME_ADMIN . '/layout/end.php');
