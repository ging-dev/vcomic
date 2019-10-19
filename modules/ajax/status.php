<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

require_once('system/bootstrap.php');
require_model('user_status');

$count_status = count_status($user_id);

$msg = isset($_POST['msg']) ? _e(trim($_POST['msg'])) : '';
$private = isset($_POST['private']) ? _e(trim($_POST['private'])) : '';

if (!$msg) {
	exit('Không được để trống nội dung!');
} else {
	insert_status($user_id, $msg, $private, $created_at);
	exit('Gửi thành công');
}
