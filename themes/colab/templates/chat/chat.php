<section>
    <div class="container pt-5">
        <h3>Chat Online</h3>
        <div class="chatbox my-3">
            <textarea class="form-control" id="chat_box" name="msg" placeholder="Nhập nội dung chat..." required></textarea>
            <div class="toolbar position-relative pt-2" style="min-height: 35px;">
                <div class="float-left">
<?php if ($user['role'] > 5): ?>
                    <a href="/chat/clear" class="btn btn-custom">Xóa Chat</a>
<?php endif ?>
                </div>
                <div class="float-right">
                    <button id="submit-chat" type="submit" class="btn btn-custom chat-button">Gửi</button>
                </div>
            </div>
        </div>
        <div class="chat-mess-list my-3" id="chat-room">
<?php if ($total):
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
                            <?= ($user['role'] > 5) ? '<a href="/chat/del/' . $data['id'] . '"><i class="fal fa-trash-alt btn btn-custom ml-3"></i></a>' : '' ?>
                        </div>
                    </div>
                </div>
            </div>
<?php endforeach;
else: ?>
        <p>Chưa có ai lên tiếng!!!</p>
<?php endif ?>
        </div>
        <?= pagination('/chat', $total); ?>
    </div>
</section>

<script>
    var pusher = new Pusher('4b3ff0efa1aa3ccadbc3', {
        cluster: 'ap1',
        forceTLS: true,
        authEndpoint: '/modules/auth'
    });
    
    var channel = pusher.subscribe('private-chat');

    var user_id = <?= $user_id ?>;
    var audio = new Audio('/assets/alert.mp3');
    
    channel.bind('chat-room', function(data) {
        var html = '<div class="text-' + (data.user_id != user_id ? 'left' : 'right') + '"><div class="media"><div class="media-body mr-3"><div class="chat-content">' + (data.user_id != user_id ? '<img class="lazy avatar-sm" src="' + data.avatar +'"/><a href="/' + data.username + '"><b>' + data.display_name + '</b></a>: ' : '') + data.message + '</div></div></div></div>';            
        $('#chat-room').prepend(html);
        
        if (data.user_id != user_id) {
            audio.play();
        }
    });
</script>