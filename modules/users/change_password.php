<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

$title = 'Chỉnh Sửa Cá Nhân';
require_once('system/bootstrap.php');
require_model('user');
require_model('profile');

if (!$user_id) {
	abort(404);
}

$error		  = false;
$password_old = isset($_POST['password_old']) ? _e(trim($_POST['password_old'])) : '';
$password_new = isset($_POST['password_new']) ? _e(trim($_POST['password_new'])) : '';
$re_password  = isset($_POST['re_password']) ? _e(trim($_POST['re_password'])) : '';

if ($request_method == 'POST') {
	if (!$password_old || !$password_new || !$re_password) {
		$error = 'Không được bỏ trống thông tin!';
	} else {
		if (mb_strlen($password_new) < 8) {
			$error = 'Mật khẩu phải lớn hơn 8 ký tự!';
		} else {
			if (md5(md5($password_old)) != $user['password']) {
				$error = 'Mật khẩu cũ không chính xác!';
			} else {
				if ($password_new != $re_password) {
					$error = 'Nhập lại mật khẩu không đúng!';
				}

				if (md5(md5($password_new)) == $user['password']) {
					$error = 'Bạn đã nhập mật khẩu cũ!';
				}
			}
		}
	}

	if (!$error) {
		update_password(md5(md5($password_new)), $user_id);
		redirect('/profile');
	}
}

require_once('themes/' . THEME . '/layout/head.php');
require_once('themes/' . THEME . '/templates/users/change_password.php');
require_once('themes/' . THEME . '/layout/end.php');
