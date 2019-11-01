<?php
    
    if ($request_method == 'GET') {
        update_seen($user_id);
    }
    
?>
<section class="pt-4">
    <div class="container">
        <div class="row my-3">
            <div class="col-8 pl-3">
                <h3 class="font-weight-bold">Thông Báo</h3>
            </div>
        </div>
        <div class="row my-3 free-list">
        <?php if ($total): ?>
            <?php foreach ($list_notifs as $data): ?>
                <div class="col-md-12 px-3 free-list-item">
                    <div class="p-3 border">
                        <div class="row mx-0 px-0">
                            <div class="col-md-12 pl-0">
                                <div class="pl-3" style="overflow: hidden;">
                                    <h5>
                                        <a href="<?= $data['url_post'] ?>/notif/<?= $data['id'] ?>"><?= $data['msg'] ?></a>
                                    </h5>
                                    <div class="update-time text-muted mt-2 font-italic">
                                        Vào lúc: <?= date('H:i d-m-Y', $data['created_at']) ?> 
                                        <?= ($data['checked'] == 1) ? 'Đã Xem' : 'Chưa Xem' ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        <?php else: ?>
            <div class="col-md-12 px-3 free-list-item">
                <div class="p-3 border">Bạn chưa có thông báo mới nào</div>
            </div>
        <?php endif ?>
        </div>
        <?= pagination('/notifications', $total) ?>
</section>