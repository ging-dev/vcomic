<section>
    <div class="container pt-5">
        <div class="row mx-0 mx-md-3 mb-3">
            <div class="col-md-4 border-right border-left mb-3 px-3">
                <h3>Cài đặt</h3>
                <div class="custom-list-group">
                    <a class="item d-block" href="/profile">
                        Thông tin
                    </a>
                    <a class="item d-block" href="/profile/settings">
                        Cài đặt
                    </a>
                    <a class="item d-block" href="/profile/password">
                        Đổi Mật Khẩu
                    </a>
            <?php if ($user['role'] > 1): ?>
                    <a class="item d-block" href="/works">
                        Quản Lý Truyện
                    </a>
            <?php endif ?>
                </div>
            </div>
            <div class="col-md-8 pl-md-4">
                <form class="form-horizontal" method="POST">
                    <div class="form-group">
                        <label for="UserName" class="font-weight-bold">Tên của bạn</label>
                        <input type="text" class="form-control" name="fullname" value="<?= $user['fullname'] ?>" />
                    </div>
                    <div class="form-group">
                        <label for="FBName" class="font-weight-bold">Facebook</label>
                        <input type="text" class="form-control" name="facebook" value="<?= $data_profile['facebook'] ?>" />
                    </div>
                    <div class="form-group">
                        <label for="About" class="font-weight-bold">Giới Thiệu</label>
                        <textarea type="text" class="form-control" name="about"><?= $data_profile['about'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-custom">Đồng Ý</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>