<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

require_once('system/bootstrap.php');

$options = array(
    'cluster' => 'ap1',
    'useTLS' => true
  );
$pusher = new Pusher\Pusher(
    '4b3ff0efa1aa3ccadbc3',
    '5a7b664d09043f69b544',
    '888903',
    $options
);

$channel = isset($_POST['channel_name']) ? _e($_POST['channel_name']) : '';
$socket_id = isset($_POST['socket_id']) ? _e($_POST['socket_id']) : '';

if ($user_id && $channel && $socket_id) {
	echo $pusher->socket_auth($channel, $socket_id);
} else {
	header('', true, 403);
	echo 'Invalid access<br>';
}
