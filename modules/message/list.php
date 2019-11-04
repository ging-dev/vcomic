<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

$title = 'Tin Nhắn';
require_once('system/bootstrap.php');
require_model('relationship');

if (!$user_id) {
    abort(404);
}

$total = count_msg($user_id);

if ($total) {
	$list_msgs = get_list_msg($user_id);
}

require_once('themes/' . THEME . '/layout/head.php');
require_once('themes/' . THEME . '/templates/message/list.php');
require_once('themes/' . THEME . '/layout/end.php');
