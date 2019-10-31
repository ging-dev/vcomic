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
		exit('Không được bỏ trống thông tin!');
	} else {
		if (mb_strlen($usernameReg) < 6 || mb_strlen($usernameReg) > 60) {
    		exit('Tài khoản chứa từ 6-60 ký tự!');
    	}

        if (mb_strlen($passwordReg) < 8) {
    		exit('Mật khẩu phải từ 8 ký tự trở lên!');
    	}

        if (preg_match('/[^\da-z\(.)]+/', $usernameReg)) {
            exit('Tên người dùng không chứa các ký tự đặc biệt');
        }

        if (!is_email($email)) {
            exit('Email không đúng định dạng');
        }

        $checkUser  = get_info('username', $usernameReg);
        $checkEmail = get_info('email', $email);

    	if ($checkUser) {
    		exit('Tài khoản này đã tồn tại!');
    	}

        if ($checkEmail) {
            exit('Email này đã tồn tại!');
        }

        $password = password_hash($passwordReg, PASSWORD_DEFAULT);
        set_avatar($usernameReg);
        
        $uid = insert_user($usernameReg, $email, $password, 1, $fullname, $usernameReg . '.jpg', time());

        $_SESSION['id'] = $uid;
        $_SESSION['password'] = $password;
        exit('Đăng ký thành công. Chờ chuyển hướng!!!');
    }
}
