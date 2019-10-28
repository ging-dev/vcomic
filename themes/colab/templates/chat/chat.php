<section>
    <div class="container pt-5">
        <h3>Chat Online</h3>
        <form class="chatbox my-3" method="POST">
            <textarea class="form-control" name="msg" placeholder="Nhập nội dung chat..." required></textarea>
            <div class="toolbar position-relative pt-2" style="min-height: 35px;">
                <div class="float-left">
<?php if ($user['role'] > 0): ?>
                    <a href="/chat/clear" class="btn btn-custom">Xóa Chat</a>
<?php endif ?>
                </div>
                <div class="float-right">
                    <button type="submit" class="btn btn-custom chat-button">Gửi</button>
                </div>
            </div>
        </form>
        <div class="chat-mess-list my-3" id="chat-room">
<?php if (count_chat()):
    foreach ($data_chat as $data):
        $data_user_chat = get_user_chat($data['user_id']);
?>
            <div class="text-<?= ($user_id == $data['user_id']) ? 'right' : 'left' ?>">
                <div class="media" title="<?= date('H:i | d-m-Y', $data['created_at']) ?>">
                    <div class="media-body mr-3">
                        <div class="chat-content">
                        <?= ($user_id != $data['user_id']) ? '<img class="lazy avatar-sm" data-original="' . get_avatar($data_user_chat['id']) . '" />
                            <a href="/' . $data_user_chat['username'] . '"><b>' . display_name($data_user_chat['role'], $data_user_chat['fullname']) . '</b></a>:' : '' ?>
                            <?= $data['msg'] ?>
                            <?= ($user['role'] > 0) ? '<a href="/chat/del/' . $data['id'] . '"><i class="fal fa-trash-alt btn btn-custom ml-3"></i></a>' : '' ?>
                        </div>
                    </div>
                </div>
            </div>
<?php endforeach;
else: ?>
        <p>Chưa có ai lên tiếng!!!</p>
<?php endif ?>
        </div>
        <?= pagination('/chat', count_chat()); ?>
    </div>
</section>

<?php
    if ($request_method == 'POST') {
        if (!$msg) {
            $error = 'Không được bỏ trống tin nhắn!';
        } else {
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

            insert_chat($msg, $user_id, time());

            $msg = '<div class="text-' . ($user_id == $data['user_id']) ? 'right' : 'left' . '">
                    <div class="media" title="' . date('H:i | d-m-Y', $data['created_at']) . '">
                        <div class="media-body mr-3">
                            <div class="chat-content">' . 
                            ($user_id != $data['user_id']) ? '<img class="lazy avatar-sm" data-original="' . get_avatar($data_user_chat['id']) . '" />
                                <a href="/' . $data_user_chat['username'] . '"><b>' . display_name($data_user_chat['role'], $data_user_chat['fullname']) . '</b></a>:' : '' . 
                                $data['msg'] . 
                                ($user['role'] > 0) ? '<a href="/chat/del/' . $data['id'] . '"><i class="fal fa-trash-alt btn btn-custom ml-3"></i></a>' : '' . 
                            '</div>
                        </div>
                    </div>
                </div>';

            $data['msg'] = $msg;
            $pusher->trigger('chat', 'chat-room', $data);

            // redirect('/chat');
        }
    }
?>
