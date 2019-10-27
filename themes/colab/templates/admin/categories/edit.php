<div class="col-md-12">
    <div class="card card-user">
        <div class="card-header">
            <h5 class="card-title">Sửa Thư Mục</h5>
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
                            <label>Tên Thư Mục</label>
                            <input type="text" class="form-control" name="name" placeholder="Tên Thư Mục" value="<?= $data['name'] ?>">
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