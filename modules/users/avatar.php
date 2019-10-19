<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

$title = 'Đổi Hình Đại Diện';
require_once('system/bootstrap.php');
require_model('user');

if (!$user_id) {
	abort(404);
}

if ($request_method == 'POST') {
	$tmp_name    = $_FILES['avatar']['tmp_name'];
    $avatar      = $user['username'] . '.jpg';
    $target_file = ROOT . '/uploads/avatar/' . $user['username'] . '.jpg';

    update_avatar($avatar, $user_id);

    move_uploaded_file($tmp_name, $target_file);
    redirect('/profile');
}

require_once('themes/' . THEME . '/layout/head.php');
require_once('themes/' . THEME . '/templates/users/avatar.php');
require_once('themes/' . THEME . '/layout/end.php');
