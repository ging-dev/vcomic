<section class="profile">
    <div class="container-fluid profile-cover pt-2" style="background-image:url('<?= get_cover($user_id) ?>?t=<?= mt_rand(10000, 99999) ?>');">
        <div class="container fill">
            <div class="cover-change">
                <a href="/user/profile/cover">
                    <div class="button-change">
                        <i class="fal fa-camera-alt fa-lg"></i> <span class="desc-text">Thay đổi ảnh bìa</span>
                    </div>
                </a>
            </div>
            <div class="profile-avatar">
                <img src="<?= get_avatar($user_id) ?>?t=<?= mt_rand(10000, 99999) ?>" class="image" />
                <a href="/user/profile/avatar">
                    <div class="change">
                        <i class="fal fa-camera-alt"></i>
                    </div>
                </a>
            </div>
            <div class="name"><?= $user['fullname'] ?></div>
            <p align="center" style="font-size: 20px; color: #fff">@<?= $user['username'] ?></p>
            <div class="stats">
                <div class="row mx-0 mx-md-3">
                    <div class="followers col-6">
                        <div class="font-weight-bolder">
                            <?= $count_followers ?>
                        </div>
                        <div class="font-weight-lighter">
                            Người theo dõi
                        </div>
                    </div>
                    <div class="works col-6">
                        <div class="font-weight-bolder">
                            <?= $count_stories ?>
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
        <a class="item active" href="/user/profile/">
            Thông tin
        </a>
        <a class="item" href="/user/settings">
            Cài đặt
        </a>
<?php if ($user['role'] > 1): ?>
        <a class="item" href="/works/">
            Quản Lý Truyện
        </a>
<?php endif ?>
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
                <div class="mb-3">
                    <form class="form-horizontal" method="POST">
                        <p id="errorStatus"></p>
                        <div class="form-group">
                            <textarea class="form-control mb-1" id="msg" name="msg" placeholder="Nhập bình luận..."></textarea>
                        </div>
                        <div class="form-group">
                            <div class="toolbar position-relative pt-2" style="min-height: 35px;">
                                <div class="float-left">
                                    <select class="btn btn-custom" id="private" name="private">
                                        <option value="0">Công Khai</option>
                                        <option value="1">Chỉ Mình Tôi</option>
                                    </select>
                                </div>
                                <div class="float-right">
                                    <button id="send_status" class="btn btn-custom btn-block text-uppercase shadow-sm">Gửi</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
<?php if ($count_status): ?>
    <?php foreach ($data_status as $data): ?>
                <div class="p-3 rounded border media mb-3 shadow-sm">
                    <img src="<?= get_avatar($user_id) ?>" class="avatar" />
                    <div class="media-body pl-3">
                        <div class="top-line">
                            <div class="name">
                                <a href="#" class="text-dark font-weight-bolder"><?= $user['fullname'] ?></a>
                            </div>
                            <div class="time small-text font-italic">
                                <?= date('d-m-Y', $data['created_at']) ?>
                                <?= ($data['private'] == 0) ? '<i class="fal fa-globe-asia mx-2"></i>' : '<i class="fal fa-user-lock mx-2"></i>' ?>
                            </div>
                        </div>
                        <div class="content-line mt-2">
                            <div style="font-size: 15px"><?= $data['msg'] ?></div>
                        </div>
                    </div>
                </div>
    <?php endforeach ?>
<?php else: ?>
                Bạn chưa có bài viết nào!!!
<?php endif ?>
            </div>
        </div>
    </div>

</section>