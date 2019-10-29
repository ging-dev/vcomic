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

$data_profile = get_profile($user_id);

$fullname = isset($_POST['fullname']) ? _e(trim($_POST['fullname'])) : $user['fullname'];
$facebook = isset($_POST['facebook']) ? _e($_POST['facebook']) : $data_profile['facebook'];
$about    = isset($_POST['about']) ? _e($_POST['about']) : $data_profile['about'];

if ($request_method == 'POST') {
	update_one_col('fullname', $fullname, $user_id);

	if ($data_profile) {
		update_profile($facebook, $about, $user_id);
	} else {
		insert_profile($facebook, $about, $user_id);
	}

	redirect('/profile');
}

require_once('themes/' . THEME . '/layout/head.php');
require_once('themes/' . THEME . '/templates/users/settings.php');
require_once('themes/' . THEME . '/layout/end.php');
