<div class="col-md-12">
    <div class="card card-user">
        <div class="card-header">
            <h5 class="card-title">Thêm Người Dùng</h5>
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
                            <label>Tên Truyện</label>
                            <input type="text" class="form-control" name="name" placeholder="Tên Truyện" value="<?= $data['title'] ?>">
                        </div>
                    </div>
                    <div class="col-md-12 px-3">
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea class="form-control"><?= $data['summary'] ?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 px-3">
                    	<label>Xuất Bản</label>
                    	<div class="d-inline-block float-left">
							<div class="onoffswitch">
								<input type="checkbox" name="is_published" class="onoffswitch-checkbox">
								<label class="onoffswitch-label mb-0" for="is_published">
									<span class="onoffswitch-inner"></span>
									<span class="onoffswitch-switch"></span>
								</label>
							</div>
						</div>
                    </div>
                    <div class="col-md-6 px-3">
                    	<label>Hoàn Thành</label>
                    	<div class="d-inline-block float-left">
							<div class="onoffswitch">
								<input type="checkbox" name="is_completed" class="onoffswitch-checkbox">
								<label class="onoffswitch-label mb-0" for="is_completed">
									<span class="onoffswitch-inner"></span>
									<span class="onoffswitch-switch"></span>
								</label>
							</div>
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