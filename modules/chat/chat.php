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

$total = count_chat();
$msg = isset($_POST['msg']) ? _e(trim($_POST['msg'])) : '';

if ($request_method == 'POST') {
    if (!$msg) {
        $error = 'Không được bỏ trống tin nhắn!';
    } else {
        insert_chat($msg, $user_id, time());
        require_once('vendor/autoload.php');

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
            'message'      => $msg
        ];
                   
        $pusher->trigger('chat', 'chat-room', $data);   
    }
    exit;
}

if ($total) {
    $data_chat = get_chat($total);

    switch ($act) {
        case 'clear':
            if ($user['role'] < 7) {
                abort(404);
            } else {
                truncate_chat();
                redirect('/chat');
            }
            break;
        case 'del':
            if ($user['role'] < 7) {
                abort(404);
            } else {
                del_chat($id);
                redirect('/chat');
            }
            break;
    }
}

require_once('themes/' . THEME . '/layout/head.php');
require_once('themes/' . THEME . '/templates/chat/chat.php');
require_once('themes/' . THEME . '/layout/end.php');
