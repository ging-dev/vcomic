<section class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/">
                                <span>Trang chủ</span>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="/story/<?= $data_story['slug'] ?>">
                                <span><?= $data_story['title'] ?></span>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="#">
                                <span><?= $data_chapter['title'] ?></span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="background-custom">
    <div class="container">
        <div class="text-center">
            <h3 class="title"><?= $data_chapter['title'] ?></h3>
        </div>
        <div class="text-center mt-3">
            <div class="btn btn-light btn-sm setup-btn">
                <i class="fa fa-cog"></i> Thiết lập
            </div>
<?php if ($data_next_chapter): ?>
            <a href="/story/<?= $data_story['slug'] ?>/<?= $data_next_chapter['slug'] ?>" class="btn btn-light btn-sm">
                Chương sau <i class="far fa-angle-right"></i>
            </a>
<?php else: ?>
            <a class="btn btn-light btn-sm">
                Hết Truyện
            </a>
<?php endif ?>
        </div>
        <center class="setup bg-light rounded d-none">
            <div class="my-3 p-2" style="max-width: 500px">
                <div class="row m-0">
                    <div class="col-6 font-weight-bolder text-right py-2">
                        Màu nền:
                    </div>
                    <div class="col-6">
                        <select class="background-chooser bg-light rounded p-1 mt-1">
                            <option value="white">Trắng thuần</option>
                            <option value="medium">Vàng nhạt</option>
                            <option value="dark">Tối</option>
                        </select>
                    </div>
                    <div class="col-6 font-weight-bolder text-right py-2">
                        Cỡ chữ:
                    </div>
                    <div class="col-6">
                        <input type="number" class="fontsize-chooser bg-light rounded p-1 mt-1 border" style="width:50px" value="18">px
                    </div>
                </div>
            </div>
        </center>
        <div class="my-3 clickable content-text chapter-content" style="font-size: 18px;"><?= nl2br($data_chapter['content']) ?></div>
        <div class="text-center my-3">
<?php if ($data_next_chapter): ?>
            <a href="/story/<?= $data_story['slug'] ?>/<?= $data_next_chapter['slug'] ?>" class="btn btn-light btn-sm">
                Chương sau <i class="far fa-angle-right"></i>
            </a>
<?php else: ?>
            <a class="btn btn-light btn-sm">
                Hết Truyện
            </a>
<?php endif ?>
        </div>
        <div class="comment mb-3">
            <div class="free-title">
                <div class="content">
                    Bình luận chương
                </div>
            </div>
<?php if ($user_id): ?>
            <form class="mb-3" method="POST">
                <textarea class="form-control mb-1" name="msg" placeholder="Nhập bình luận..." required></textarea>
                <div style="height: 30px" class="clear-fix">
                    <button type="submit" class="btn btn-custom btn-sm float-right">Đăng</button>
                </div>
            </form>
<?php endif ?>
        </div>
<?php if (count_comment($data_chapter['id'])):
    foreach ($list_comment as $data_comment):
    ?>
            <div class="comment-list my-4">
                <div class="p-3 rounded border media mb-3 shadow-sm">
                    <img class="lazy avatar" data-original="<?= get_avatar($data_chapter['user_id']) ?>" />
                    <div class="media-body ml-3">
                        <div class="top-line">
                            <div class="name">
                                <a href="/<?= get_info_id($data_chapter['user_id'])['username'] ?>" class="text-dark font-weight-bolder">
                                    <?= get_info_id($data_chapter['user_id'])['fullname'] ?>
                                </a>
                            </div>
                            <div class="time small-text font-italic">
                                <?= date('H:i d-m-Y', $data_comment['created_at']) ?>
                            </div>
                        </div>
                        <div class="content-line mt-2">
                            <div style="font-size: 15px"><?= $data_comment['content'] ?></div>
                        </div>
                    </div>
                </div>
            </div>
    <?php endforeach;
    pagination('/story/' . $data_story['slug'] . '/' . $data_chapter['slug'], count_comment($data_chapter['id']));
    else: ?>
        <div class="comment-list my-4">
            Không có bình luận. Hãy đặt dấu chân đầu tiên nào ~~
        </div>
<?php endif ?>
    </div>
</section>