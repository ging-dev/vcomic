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
        
        $html = '<div class="text-left">
                <div class="media" title="' . date('H:i | d-m-Y', time()) . '">
                    <div class="media-body mr-3">
                        <div class="chat-content">
                            <img class="lazy avatar-sm" src="' . SITE_URL . get_avatar($user_id) . '" />
                            <a href="/' . $user['username'] . '"><b>' . display_name($user['role'], $user['fullname']) . '</b></a>:
                            ' . $msg . '
                        </div>
                    </div>
                </div>
            </div>';
             
        $data['message'] = $html;
        $data['user_id'] = $user_id;
        
        $pusher->trigger('chat', 'chat-room', $data);
        
        echo '<div class="text-right">
                <div class="media" title="' . date('H:i | d-m-Y', time()) . '">
                    <div class="media-body mr-3">
                        <div class="chat-content">
                            ' . $msg . '
                        </div>
                    </div>
                </div>
            </div>';        
	}
	exit;
}

if ($total) {
	$data_chat = get_chat($total);

	switch ($act) {
		case 'clear':
			if ($user['role'] < 5) {
				abort(404);
			} else {
				truncate_chat();
				redirect('/chat');
			}
			break;
		case 'del':
			if ($user['role'] < 5) {
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
