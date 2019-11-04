<section class="pt-4">
    <div class="container">
        <div class="row my-3">
            <div class="col-8 pl-3">
                <h3 class="font-weight-bold">Tin Nhắn</h3>
            </div>
        </div>
        <div class="row my-3 free-list">
        <?php if ($total): ?>
            <?php foreach ($list_msgs as $data):
            	$data_user = get_info_id($data['sender_id']);
                $data_msg  = get_info_msg($data['sender_id']);
            ?>
                <div class="col-md-12 px-3 free-list-item">
                    <div class="p-3 border">
                        <div class="row mx-0 px-0">
                            <div class="col-md-12 pl-0">
                                <div class="pl-3" style="overflow: hidden;">
                                    <h5>
                                        <a href="/message/<?= $data_user['username'] ?>">
                                        	<?= (check_seen($data_msg['sender_id'], $data_msg['receiver_id']) == 0) ? '<i>' . display_name($data_user['role'], $data_user['fullname']) . '</i>' : display_name($data_user['role'], $data_user['fullname']) ?>
                                        </a>
                                    </h5>
                                    <div class="update-time text-muted mt-2 font-italic">
                                        Vào lúc: <?= date('H:i | d-m-Y', $data_msg['sent_at']) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        <?php else: ?>
            <div class="col-md-12 px-3 free-list-item">
                <div class="p-3 border">Bạn chưa có tin nhắn nào</div>
            </div>
        <?php endif ?>
        </div>
        <?= pagination('/messages', $total) ?>
</section>