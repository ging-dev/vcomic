<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

require_once('system/bootstrap.php');

require_model('notification');

if (!$user_id) {
	abort(404);
}

$total = count_notif($user_id);
$title = 'Bạn có ' . count_notif_not_seen($user_id) . ' thông báo mới!';

if ($total) {
	$list_notifs = get_list_notif($user_id, $total);
}

switch ($act) {
	case 'check':
		update_check_all();

		redirect('/notifications');
		break;
}

require_once('themes/' . THEME . '/layout/head.php');
require_once('themes/' . THEME . '/templates/notification/notification.php');
require_once('themes/' . THEME . '/layout/end.php');
