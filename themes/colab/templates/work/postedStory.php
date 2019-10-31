<section class="pt-4">
    <div class="container">
        <div class="row my-3">
            <div class="col-8 pl-3">
                <h3 class="font-weight-bold">Tác phẩm của tôi</h3>
            </div>
            <div class="col-4 text-right pr-3">
                <a href="/works/story/new" class="btn btn-custom btn-sm">
                	<i class="fal fa-plus"></i> <span class="d-none d-md-inline-block">Tác phẩm mới</span>
                </a>
            </div>
        </div>
        <div class="row my-3 free-list">
<?php
if ($total):
    foreach ($list_stories as $data):
        $count_chapter = count_status_chapt($data['id'], 1);
        $count_draft = count_status_chapt($data['id'], 0);
?>
            <div class="col-md-12 px-3 free-list-item">
                <div class="p-3 border">
                    <div class="row mx-0 px-0">
                        <div class="col-md-8 pl-0">
                            <img class="lazy story-sm float-left" data-original="/uploads/thumbnail/<?= $data['thumbnail'] ?>">
                            <div class="pl-3" style="overflow: hidden;">
                                <h5 class="font-weight-bold"><?= $data['title'] ?> <?= ($data['is_published'] == 1) ? '<font color="green">[Bản Chính]</font>' : '<font color="red">[Bản Nháp]</font>' ?></h5>
                                <div class="info font-weight-bold">
                                    <span class="text-success"><?= $count_chapter ?> Chương đã đăng</span> - <span class="text-muted"><?= $count_draft ?> Bản nháp</span>
                                </div>
                                <div class="update-time text-muted mt-2 font-italic">
                                    Lần cập nhật cuối: <?= date('H:i | d-m-Y', $data['created_at']) ?>
                                </div>
                                <div class="vote">
                                    <?= ($data['is_completed'] == 1) ? '<font color="green">[Hoàn Thành]</font>' : '<font color="red">[Đang Ra]</font>'; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 px-0">
                            <div class="controller mt-1 text-center">
                                <a class="btn btn-custom btn-sm d-inline-block" style="width: 49%; font-size: 15px" href="/work/<?= $data['id'] ?>">Quản lí chương</a>
                                <div class="dropdown d-inline-block" style="width:49%">
                                    <a class="btn btn-outline-custom btn-sm w-100" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="settingT"><i class="fa fa-cog"></i> Cài đặt</a>
                                    <div class="dropdown-menu dropdown-menu-right p-1" style="font-size: 15px;" aria-labelledby="settingT">
<?php if ($data['is_published'] == 1): ?>
                                        <a href="/work/<?= $data['id'] ?>/draft" class="dropdown-item"><i class="fal fa-file-times"></i> Chuyển thành bản nháp</a>
<?php else: ?>
                                        <a href="/work/<?= $data['id'] ?>/publish" class="dropdown-item"><i class="fal fa-file-check"></i> Chuyển thành bản chính</a>
<?php endif ?>
<?php if ($data['is_completed'] == 1): ?>
                                        <a href="/work/<?= $data['id'] ?>/writing" class="dropdown-item"><i class="fal fa-file-edit"></i> Truyện đang viết</a>
<?php else: ?>
                                        <a href="/work/<?= $data['id'] ?>/complete" class="dropdown-item"><i class="fal fa-file-check"></i> Truyện hoàn thành</a>
<?php endif ?>
                                        <a href="/work/<?= $data['id'] ?>/del" class="dropdown-item"><i class="fal fa-trash"></i> Xóa truyện</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php endforeach ?>
<?php else: ?>
            <div class="col-md-12 px-3 free-list-item">
                <div class="p-3 border">Bạn chưa có tác phẩm nào
            </div>
<?php endif ?>
        </div>
    </div>
	<?= pagination('/work', $total); ?>
</section>