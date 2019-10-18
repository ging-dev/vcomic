<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

$title = 'Đăng Ký';
require_once('system/bootstrap.php');
require_model('user');

if ($user_id) {
	redirect('/');
}

$usernameReg = isset($_POST['usernameReg']) ? _e(trim(mb_strtolower($_POST['usernameReg']))) : '';
$passwordReg = isset($_POST['passwordReg']) ? _e(trim($_POST['passwordReg'])) : '';
$fullname    = isset($_POST['fullname']) ? _e(trim($_POST['fullname'])) : '';
$email       = isset($_POST['email']) ? _e(trim($_POST['email'])) : '';

if ($request_method == 'POST') {
    if (!$usernameReg || !$passwordReg || !$fullname || !$email) {
		show_alert('Không được bỏ trống thông tin!', 'error');
	} else {
		if (mb_strlen($usernameReg) < 6 || mb_strlen($usernameReg) > 60) {
    		show_alert('Tài khoản chứa từ 6-60 ký tự!', 'error');
    	}

        if (mb_strlen($passwordReg) < 8) {
    		show_alert('Mật khẩu phải từ 8 ký tự trở lên!', 'error');
    	}

        if (preg_match('/[^\da-z\(.)]+/', $usernameReg)) {
            show_alert('Tên người dùng không chứa các ký tự đặc biệt', 'error');
        }

        $checkUser  = check_info('username', $usernameReg);
        $checkEmail = check_info('email', $email);

    	if ($checkUser) {
    		show_alert('Tài khoản này đã tồn tại!', 'error');
    	}

        if ($checkEmail) {
            show_alert('Email này đã tồn tại!', 'error');
        }

        $password = md5(md5($passwordReg));
        set_avatar($usernameReg);
        insert_user($usernameReg, $email, $password, $fullname, $usernameReg . '.jpg', time());

        $_SESSION['username'] = $usernameReg;
        exit('Đăng ký thành công. Chờ chuyển hướng!!!');
    }
}
