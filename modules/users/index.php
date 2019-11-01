<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

require_once('system/bootstrap.php');
require_model('notification');
require_model('profile');
require_model('relationship');
require_model('story');
require_model('user');
require_model('user_status');

$data = get_info('username', $username);

if (!$data) {
	abort(404);
}

$data_profile = get_profile($data['id']);
$count_status = count_status_public($data['id']);

$title = $data['fullname'] . ' (@' . $data['username'] . ')';

if (!$user_id) {
	abort(404);
}

if ($user_id == $data['id']) {
	redirect('/profile');
}

if ($user_id) {
	if ($user_id == $data['id']) {
		abort(404);
	} else {
		switch ($act) {
			case 'follow':
				if (check_rela($data['id'], $user_id, 1) == 0) {
					insert_rela($data['id'], $user_id, 1);
					insert_notif(
						$user['fullname'] . ' vừa theo dõi bạn!',
						'/' . $user['username'],
						$data['id'],
						time()
					);
				}

				redirect('/' . $data['username']);
				break;

			case 'unfollow':
				if (check_rela($data['id'], $user_id, 1)) {
					del_rela($data['id'], $user_id, 1);
				}

				redirect('/' . $data['username']);
				break;

			case 'check_notif':
				if ($id) {
					update_checked($id);
				}
				break;
		}
	}
} else {
	abort(404);
}

if ($count_status) {
	$data_status = get_status_public($data['id'], $count_status);
}

require_once('themes/' . THEME . '/layout/head.php');
require_once('themes/' . THEME . '/templates/users/index.php');
require_once('themes/' . THEME . '/layout/end.php');
