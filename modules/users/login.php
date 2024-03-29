<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

$title = 'Đăng Nhập';
require_once('system/bootstrap.php');
require_model('user');

if ($user_id) {
	redirect('/');
}

$username   = isset($_POST['username']) ? _e(trim($_POST['username'])) : '';
$password   = isset($_POST['password']) ? _e(trim($_POST['password'])) : '';
$remember   = isset($_POST['remember']) ? 1 : 0;

if ($request_method == 'POST') {
	if (!$username || !$password) {
		exit('Không được bỏ trống thông tin!');
	} else {
		if (mb_strlen($username) < 4 || mb_strlen($username) > 60) {
			exit('Tài khoản chứa từ 6-60 ký tự!');
		}

		if (mb_strlen($password) < 8) {
			exit('Mật khẩu phải từ 8 ký tự trở lên!');
		}

		$checkUser = get_info('username', $username);

		if (!$checkUser) {
			exit('Không tồn tại tài khoản này!');
		} else {
			if (!password_verify($password, $checkUser['password'])) {
				exit('Mật khẩu không chính xác. Vui lòng nhập lại!');
			} else {
				if ($remember == 1) {
					$cuid = $checkUser['id'];
					$cups = $checkUser['password'];

					setcookie('cuid', $cuid, time() + 3600 * 24 * 365);
					setcookie('cups', $cups, time() + 3600 * 24 * 365);
				}

				$_SESSION['id'] = $checkUser['id'];
				$_SESSION['password'] = $checkUser['password'];

				update_one_col('login_at', time(), $checkUser['id']);
				exit('Đăng nhập thành công. Chờ chuyển hướng!!!');
			}
		}
	}
}
