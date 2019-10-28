<div class="col-md-12">
    <div class="card card-user">
        <div class="card-header">
            <h5 class="card-title">Sửa Người Dùng</h5>
        </div>
        <div class="card-body">
            <form method="POST">
                <?php
                    if ($error == true) {
                        echo '<div class="alert text-primary">' . $error . '</div>';
                    }
                ?>
                <div class="row">
                    <div class="col-md-12 px-3">
                        <div class="form-group">
                            <label>Tên Hiển Thị</label>
                            <input type="text" class="form-control" name="fullname" placeholder="Tên Hiển Thị" value="<?= $data['fullname'] ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 px-3">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" value="<?= $data['email'] ?>">
                        </div>
                    </div>
                    <div class="col-md-6 px-3">
                        <div class="form-group">
                            <label>Chức Vụ</label>
                            <select name="role" class="form-control">
                                <option value="">-- Chức Vụ --</option>
                                <option value="0">BAN</option>
                                <option value="1">MEMBER</option>
                                <option value="3">VIP Member</option>
                                <option value="4">Tác Giả</option>
                                <option value="7">Mod</option>
                                <option value="8">Super Mod</option>
                                <option value="9">Administrator</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 px-3">
                        <button type="submit" class="btn btn-submit btn-block btn-success">Đồng Ý</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>