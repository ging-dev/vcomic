<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

$title = 'Khôi Phục Mật Khẩu';
require_once('system/bootstrap.php');

if ($user_id) {
    abort(404);
}

switch ($act) {
	case 'set':
	    $password = mt_rand(11111111, 99999999);
        $password_hash = md5(md5($password));
        
        if (!$username || !$recover_code) {
            exit('Không được bỏ trống thông tin!');
        }

        $data_user = get_info('username', $username);

        if ($data_user) {
            if (!$data_user['recover_code'] || !$data_user['recover_time']) {
                exit('Lỗi dữ liệu');
            }
            
            if ($recover_code != $data_user['recover_code']) {
                exit('Mã xác nhận không chính xác');
            }

            if ($data_user['recover_time'] < (time() - 3600)) {
                exit('Link xác nhận đã hết hạn. Vui lòng thử lại');
                update_recover_code('', '', $data_user['id']);
            }
        } else {
            exit('Tên tài khoản không tồn tại');
        }

        $subject = 'Cung cấp mật khẩu mới';
        $mail = 'Xin chào, ' . $username . '. Bạn đã xác nhận yêu cầu cấp lại mật khẩu cho tài khoản vComic' . "\r\n";
        $mail .= 'Mật khẩu mới của bạn: ' . $password;

        if (mail($data_user['email'], $subject, $mail)) {
            update_password($password_hash, $data_user['id']);
            exit('Mật khẩu mới đã được gửi tới email của bạn. Vui lòng kiểm tra');
        } else {
            exit('Lỗi gửi email');
        }
		break;
		
	default:
		$usernameRecover = isset($_POST['usernameRecover']) ? _e(trim($_POST['usernameRecover'])) : '';
		$emailRecover    = isset($_POST['emailRecover']) ? _e(trim($_POST['emailRecover'])) : '';
        $recover_code    = md5(rand(1000, 9999));

        if (!$usernameRecover || !$emailRecover) {
        	exit('Không được bỏ trống thông tin');
        }

        $checkUser = get_info('username', $usernameRecover);
        
        if ($checkUser['recover_time'] > (time() - 86400)) {
            exit('Chỉ được yêu cầu cấp lại mật khẩu sau 24h');
        }

        if ($checkUser) {
        	if ($emailRecover != $checkUser['email']) {
        		exit('Email không đúng với tài khoản <b>' . $usernameRecover . '</b>');
        	}
        } else {
        	exit('Tài khoản này không tồn tại');
        }

        $subject = 'vComic | Xác nhận đặt lại mật khẩu: ' . $usernameRecover;
        $mail = 'Xin chào, ' . $usernameRecover . '. Bạn đã yêu cầu cấp lại mật khẩu cho tài khoản vComic' . "\r\n";
        $mail .= 'Bạn nhấn vào liên kết sau: ' . SITE_URL . '/users/recover/set/' . $usernameRecover . '/' . $recover_code . "\r\n";
        $mail .= 'Liên kết có giá trị trong vòng 1h.' . "\r\n";
        $mail .= 'Nếu không phải bạn thực hiện cấp lại mật khẩu, vui lòng bỏ qua thư này!';

        if (mail($checkUser['email'], $subject, $mail)) {
            update_recover_code($recover_code, time(), $checkUser['id']);
            exit('Link cấp lại đã được gửi tới email của bạn');
        } else {
            exit('Lỗi gửi email');
        }
	    break;
}