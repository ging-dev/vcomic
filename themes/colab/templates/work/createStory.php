<section>
    <div class="container pt-5">
        <div class="mb-4">
            <form class="row" method="POST" enctype="multipart/form-data">
<?php if ($error == true): ?>
                <?= $error ?>
<?php endif ?>
                <div class="col-md-4">
                    <center>
                        <div class="img-template">
                            <div class="mt-2">
                                <img class="lazy" id="previewImg" data-original="/uploads/thumbnails/default.jpg" height="200" alt="Image preview...">
                            </div>
                        </div>
                    </center>
                </div>
                <div class="col-md-8 px-4">
                    <div class="row mt-0">
                        <div class="col-md-12 mb-4">
                            <label>
                                <b>Thumbnail</b>
                            </label>
                                <input type="file" name="thumbnail" onchange="previewFile()" />
                        </div>
                        <div class="col-md-12 mb-4">
                            <label>
                                <b>Tên truyện</b>
                            </label>
                            <input type="text" name="title" class="form-control" placeholder="">
                        </div>
                        <div class="col-md-12 mb-4">
                            <label>
                                <b>Tác giả truyện</b>
                            </label>
                            <input type="text" name="author" class="form-control" placeholder="">
                        </div>
                        <div class="col-md-12 mb-4">
                            <label>
                                <b>Mô tả truyện</b>
                                <button type="button" class="btn btn-link px-0 text-dark" data-container="body" data-toggle="popover" data-placement="top" data-html="true" data-title="Mô tả truyện" data-content="Mô tả truyện có thể giúp truyện của bạn tiếp cận được nhiều người hơn.<br/><a href='' class='small-text'>Tìm hiểu thêm</a>">
                                    <i class="fal fa-question-circle"></i>
                                </button>
                            </label>
                            <textarea class="form-control" name="summary"></textarea>
                        </div>
                        <div class="col-md-12 mb-4">
                            <label>
                                <b>Thẻ tag</b>
                                <button type="button" class="btn btn-link px-0 text-dark" data-container="body" data-toggle="popover" data-placement="top" data-html="true" data-title="Thẻ tag" data-content="Thêm nhiều thẻ tag sẽ giúp truyện của bản dễ dàng hiển thị hơn trên website và định vị các thể loại của truyện.<br/><a href='' class='small-text'>Tìm hiểu thêm</a>">
                                    <i class="fal fa-question-circle"></i>
                                </button>
                            </label>
                            <input type="text" name="tag" class="form-control" placeholder="">
                        </div>
                        <div class="col-md-12 mb-4">
                            <label>
                                <b>Thể loại</b>
                                <button type="button" class="btn btn-link px-0 text-dark" data-container="body" data-toggle="popover" data-placement="top" data-html="true" data-title="Thể loại truyện" data-content="Chọn một thể loại chính của truyện. Điều đó sẽ giúp truyện của bạn được hiển thị chính xác với đối tượng.<br/><a href='' class='small-text'>Tìm hiểu thêm</a>">
                                    <i class="fal fa-question-circle"></i>
                                </button>
                            </label>
                            <select name="category" class="form-control">
<?php foreach($data_list_cate as $list_cate): ?>
                                <option value="<?= $list_cate['id'] ?>"><?= $list_cate['name'] ?></option>
<?php endforeach ?>
                            </select>
                        </div>
						<div class="mb-4" style="min-height: 50px;">
							<label class="d-inline-block float-left mr-3">
								<b>Xuất bản</b>
							</label>
							<div class="d-inline-block float-left">
								<div class="onoffswitch">
									<input type="checkbox" name="is_published">
								</div>
							</div>
						</div>
                        <div class="col-md-6 mb-4">
                            <button type="submit" class="btn btn-outline-custom btn-sm">Đồng Ý</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>