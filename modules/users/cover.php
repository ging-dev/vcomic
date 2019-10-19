<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

$title = 'Đổi Hình Ảnh Bìa';
require_once('system/bootstrap.php');
require_model('user');

if (!$user_id) {
	abort(404);
}

if ($request_method == 'POST') {
    $tmp_name    = $_FILES['cover']['tmp_name'];
    $cover      = $user['username'] . '.jpg';
    $target_file = ROOT . '/uploads/cover/' . $user['username'] . '.jpg';

    update_cover($cover, $user_id);

    move_uploaded_file($tmp_name, $target_file);
    redirect('/profile');
}

require_once('themes/' . THEME . '/layout/head.php');
require_once('themes/' . THEME . '/templates/users/cover.php');
require_once('themes/' . THEME . '/layout/end.php');
