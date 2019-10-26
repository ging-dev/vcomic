<section class="profile">
    <div class="container-fluid profile-cover pt-2" style="background-image:url('<?= get_cover($data
    ['id']) ?>');">
        <div class="container fill">
<?php if ($user_id): ?>
            <div class="follow">
                <div class="button-follow">
    <?php if (check_rela($data['id'], $user_id, 1) == 0): ?>
                    <a href="/<?= $data['username'] ?>/follow" class="text-white"><i class="fal fa-user-plus"></i> Theo dõi</a>
    <?php else: ?>
                    <a href="/<?= $data['username'] ?>/unfollow" class="text-white"><i class="fal fa-user-minus"></i> Bỏ theo dõi</a>
    <?php endif ?>
                </div>
            </div>
<?php endif ?>
            <div class="profile-avatar">
                <img class="lazy image" data-original="<?= get_avatar($data['id']) ?>" />
            </div>
            <div class="name"><?= display_name($data['role'], $data['fullname']) ?></div>
            <p align="center" style="font-size: 20px; color: #fff">@<?= $data['username'] ?></p>
            <div class="stats">
                <div class="row mx-0 mx-md-3">
                    <div class="followers col-6">
                        <div class="font-weight-bolder">
                            <?= count_rela($data['id'], 1) ?>
                        </div>
                        <div class="font-weight-lighter">
                            Người theo dõi
                        </div>
                    </div>
                    <div class="works col-6">
                        <div class="font-weight-bolder">
                            <?= count_stories($data['id']) ?>
                        </div>
                        <div class="font-weight-lighter">
                            Tác phẩm
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="">
    <div class="custom-navs" role="tablist" id="myTab">
        <a class="item active" href="#">
            Thông tin
        </a>
    </div>
    <div class="container active">
        <div class="row mx-0 mx-md-3">
            <div class="col-md-4">
                <div class="free-title mb-2">
                    <div class="content">
                        Giới thiệu
                    </div>
                </div>
                <div class="custom-list-group">
                    <div class="item">
                        <?= isset($data_profile['about']) ? $data_profile['about'] : '(trống)' ?>
                    </div>
                    <div class="item">
                        <i class="fab fa-facebook" style="color:var(--facebook-color)"></i> <?= isset($data_profile['facebook']) ? $data_profile['facebook'] : '(trống)' ?>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="free-title">
                    <div class="content">
                        Bài viết
                    </div>
                </div>
<?php if ($count_status):
    foreach ($data_status as $data_stt):
?>
                <div class="p-3 rounded border media mb-3 shadow-sm">
                    <img class="lazy avatar" data-original="<?= get_avatar($data['id']) ?>" />
                    <div class="media-body pl-3">
                        <div class="top-line">
                            <div class="name">
                                <a href="#" class="text-dark font-weight-bolder"><?= display_name($data['role'], $data['fullname']) ?></a>
                            </div>
                            <div class="time small-text font-italic">
                                <?= date('d-m-Y', $data_stt['created_at']) ?> <i class="fal fa-globe-asia mx-2"></i>
                            </div>
                        </div>
                        <div class="content-line mt-2">
                            <div style="font-size: 15px"><?= $data_stt['msg'] ?></div>
                        </div>
                    </div>
                </div>
    <?php endforeach ?>
    <?= pagination('/' . $data['username'], $count_status) ?>
<?php else: ?>
                Chưa có bài viết nào!!!
<?php endif ?>
            </div>
        </div>
    </div>

</section>