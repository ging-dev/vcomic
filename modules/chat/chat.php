<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

$title = 'Chat room';
require_once('system/bootstrap.php');

require_model('chat');

if (!$user_id) {
	abort(404);
}

if (count_chat()) {
	$data_chat = get_chat(count_chat());

	switch ($act) {
		case 'clear':
			if ($user['role'] < 2) {
				abort(404);
			} else {
				truncate_chat();
				redirect('/chat');
			}
			break;
		case 'del':
			if ($user['role'] < 1) {
				abort(404);
			} else {
				del_chat($id);
				redirect('/chat');
			}
			break;
	}
}

$msg = isset($_POST['msg']) ? _e(trim($_POST['msg'])) : '';

if ($request_method == 'POST') {
	if (!$msg) {
		$error = 'Không được bỏ trống tin nhắn!';
	} else {
		insert_chat($msg, $user_id, time());

		redirect('/chat');
	}
}

require_once('themes/' . THEME . '/layout/head.php');
require_once('themes/' . THEME . '/templates/chat.php');
require_once('themes/' . THEME . '/layout/end.php');
