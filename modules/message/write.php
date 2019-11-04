<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

require_once('system/bootstrap.php');
require_model('relationship');

if (!$user_id) {
    abort(404);
}

$data_user = get_info('username', $username);
$title = 'Nhắn tin với ' . $data_user['fullname'];

if (!$data_user || ($user['username'] == $username)) {
    abort(404);
}

$total = count_msg_with($data_user['id'], $user_id);
$content = isset($_POST['content']) ? _e(trim($_POST['content'])) : '';

if ($total) {
    $list_msgs = get_list_msg_with($data_user['id'], $user_id);
}

update_seen_msg($data_user['id'], $user_id);

if ($request_method == 'POST') {
    insert_msg($content, $user_id, $data_user['id'], time());

    $options = array(
        'cluster' => 'ap1',
        'useTLS'  => true
    );
    
    $pusher = new Pusher\Pusher(
        '4b3ff0efa1aa3ccadbc3',
        '5a7b664d09043f69b544',
        '888903',
        $options
    );
               
    $data = [
        'user_id'      => $user_id,
        'avatar'       => get_avatar($user_id),
        'display_name' => display_name($user['role'], $user['fullname']),
        'username'     => $user['username'],
        'content'      => $content
    ];
               
    $pusher->trigger('private-message-' . $data_user['id'], $user_id, $data);
    echo '<div class="text-right"><div class="media"><div class="media-body mr-3"><div class="chat-content">' . $content . '</div></div></div></div>';
    exit();
}

require_once('themes/' . THEME . '/layout/head.php');
require_once('themes/' . THEME . '/templates/message/write.php');
require_once('themes/' . THEME . '/layout/end.php');
