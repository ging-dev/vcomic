<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

require_once('system/bootstrap.php');
require_model('message');
require_model('notification');

switch ($act) {
	case 'message':
		$total = count_new_msg($user_id);

		$data = ['new_msg' => $total];
		exit(json_encode($data));
		break;

	case 'notification':
		$total = count_notif_not_seen($user_id);

		$data = ['new_notif' => $total];
		exit(json_encode($data));
		break;
}
