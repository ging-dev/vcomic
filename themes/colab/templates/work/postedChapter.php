<section class="pt-4">
    <div class="container">
        <div class="row my-3">
            <div class="col-8 pl-3">
                <h3 class="font-weight-bold">Danh sách chương</h3>
                <span class="small-text"><?= $data_story['title'] ?></span>
            </div>
            <div class="col-4 text-right pr-3">
                <a class="btn btn-custom btn-sm" href="/work/<?= $data_story['slug'] ?>/new">
                    <i class="fal fa-plus"></i> <span class="d-none d-md-inline-block">Chương mới</span>
                </a>
            </div>
        </div>
    <?php if ($total):
        foreach ($list_chapts as $data):
            $count_comment = count_comment($data['id']);
        ?>
            <div class="row my-3 free-list">
                <div class="col-md-12 px-3 free-list-item">
                    <div class="p-3 border bg-white">
                        <div class="row mx-0 px-0">
                            <div class="col-9">
                                <h5 class="chapter-name"><?= $data['title'] ?></h5>
                                <div class="info d-inline-block mr-3 mb-2">
                                    <?= ($data['is_published'] == 1) ? '<span class="text-success font-weight-bold">Đã xuất bản</span>' : '<span class="text-danger font-weight-bold">Bản Thảo</span>'; ?> <span class="small-text">Cập nhật: <?= date('H:i | d-m-Y', $data['created_at']) ?></span>
                                </div>
                                <div class="stats d-inline-block text-info">
                                    <span class="">
                                        <i class="fa fa-comment"></i> <?= $count_comment ?>
                                    </span>
                                </div>
                            </div>
                            <div class="col-3 px-0">
                                <div class="controller text-right">
                                    <div class="dropdown d-inline-block">
                                        <a class="btn btn-outline-custom btn-sm w-100" href="#" data-toggle="dropdown">
                                            <i class="fa fa-cog"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right p-1" style="font-size: 15px;">
<?php if ($data['is_published'] == 1): ?>
                                            <a href="/chapter/<?= $data_story['id'] ?>/<?= $data['slug'] ?>/draft" class="dropdown-item"><i class="fal fa-file"></i> Chuyển thành bản thảo</a>
<?php else: ?>
                                            <a href="/chapter/<?= $data_story['id'] ?>/<?= $data['slug'] ?>/publish" class="dropdown-item"><i class="fal fa-file"></i> Chuyển thành bản chính</a>
<?php endif ?>
                                            <a href="/chapter/<?= $data_story['id'] ?>/<?= $data['slug'] ?>/del" class="dropdown-item"><i class="fal fa-trash"></i> Xóa chương</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    <?php else: ?>
            <div class="row my-3 free-list">
                <div class="col-md-12 px-3 free-list-item">
                    Chưa có chương nào được đăng
                </div>
            </div>
        <?php echo pagination('/work/' . $id, $total); ?>
    <?php endif ?>
    </div>
</section>