<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

require_once('system/bootstrap.php');
require_model('user');
require_model('user_status');
require_model('profile');
require_model('relationship');
require_model('story');

if (!$user_id) {
	abort(404);
}

$title = $user['fullname'] . ' (@' . $user['username'] . ')';
$count_followers = count_one_rela($user_id, 1);
$count_stories   = count_stories($user_id);
$count_status   = count_status($user_id);

$data_profile    = get_profile($user_id);

if ($count_status) {
	$data_status = get_status($user_id, $count_status);
}

$msg = isset($_POST['msg']) ? _e(trim($_POST['msg'])) : '';
$private = isset($_POST['private']) ? _e(trim($_POST['private'])) : '';

if ($request_method == 'POST') {
	if (!$msg) {
		exit('Không được để trống nội dung!');
	} else {
		insert_status($user_id, $msg, $private, time());
		redirect('/profile');
	}
}

require_once('themes/' . THEME . '/layout/head.php');
require_once('themes/' . THEME . '/templates/users/profile.php');
require_once('themes/' . THEME . '/layout/end.php');
