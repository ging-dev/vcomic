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

if ($request_method == 'POST') {
	if (!$username || !$password) {
		show_alert('Không được bỏ trống thông tin!', 'error');
	} else {
		if (mb_strlen($username) < 4 || mb_strlen($username) > 60) {
			show_alert('Tài khoản chứa từ 6-60 ký tự!', 'error');
		}

		if (mb_strlen($password) < 8) {
			show_alert('Mật khẩu phải từ 8 ký tự trở lên!', 'error');
		}

		$checkUser = get_info($username);

		if (!$checkUser) {
			show_alert('Không tồn tại tài khoản này!', 'error');

		} else {
			if (md5(md5($password)) != $checkUser['password']) {
				show_alert('Mật khẩu không chính xác. Vui lòng nhập lại!', 'error');
			} else {
				$_SESSION['username'] = $checkUser['username'];
				login_at(time(), $checkUser['id']);
				exit('Đăng nhập thành công. Chờ chuyển hướng!!!');
			}
		}
	}
}
