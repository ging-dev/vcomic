<section>
    <div class="container pt-5">
        <h3><?= display_name($data_user['role'], $data_user['fullname']) ?></h3>
        <div class="chatbox my-3">
            <textarea class="form-control" id="message" name="content" placeholder="Nhập nội dung chat..." required></textarea>
            <div class="toolbar position-relative pt-2" style="min-height: 35px;">
                <div class="float-right">
                    <button id="submit-message" type="submit" class="btn btn-custom chat-button">Gửi</button>
                </div>
            </div>
        </div>
        <div class="chat-mess-list my-3" id="message-room">
<?php if ($total):
    foreach ($list_msgs as $data):
?>
            <div class="text-<?= ($user_id == $data['sender_id']) ? 'right' : 'left' ?>">
                <div class="media" title="<?= date('H:i | d-m-Y', $data['sent_at']) ?>">
                    <div class="media-body mr-3">
                        <div class="chat-content">
                        <?= ($user_id != $data['sender_id']) ? '<img class="lazy avatar-sm" data-original="' . get_avatar($data['sender_id']) . '" />
                            <a href="/' . $data_user['username'] . '"><b>' . display_name($data_user['role'], $data_user['fullname']) . '</b></a>:' : '' ?>
                            <?= $data['content'] ?>
                        </div>
                    </div>
                </div>
            </div>
<?php endforeach; ?>
<?php else: ?>
        <p>Chưa có ai lên tiếng!!!</p>
<?php endif ?>
        </div>
        <?= pagination('/message/' . $data_user['username'], $total); ?>
    </div>
</section>

<script>
    var pusher = new Pusher('4b3ff0efa1aa3ccadbc3', {
        cluster: 'ap1',
        forceTLS: true,
        authEndpoint: '/modules/auth'
    });

    var channel_msg = pusher.subscribe('private-message-<?= $user_id ?>');
    var user_id = <?= $user_id ?>;
    var audioMsg = new Audio('/assets/message.mp3');

    channel_msg.bind(<?= $data_user['id'] ?>, function(data) {
        var htmlMsg = '<div class="text-left"><div class="media"><div class="media-body mr-3"><div class="chat-content"><img class="lazy avatar-sm" src="' + data.avatar + '"/><a href="/' + data.username + '"><b>' + data.display_name + '</b></a>: ' + data.content + '</div></div></div></div>';
        $('#message-room').prepend(htmlMsg);
        audioMsg.play();
    });

</script>
