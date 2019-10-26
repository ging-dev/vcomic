<section class="container-fluid mt-5 pt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/">
                                <span>Trang chủ</span>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="/work/<?= $data_story['slug'] ?>">
                                <span><?= $data_story['title'] ?></span>
                            </a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="#">
                                <span>Chương Mới</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
<section>
    <form class="container pt-2" method="POST">
        <div class="row">
            <div class="mb-3 col-md-12">
                <label><b>Tên chương</b></label>
                <input type="text" name="title_chapter" class="form-control">
            </div>
            <div class="mb-3 col-md-12">
                <label><b>Nội dung chương</b></label>
                <textarea class="form-control" name="content" rows="10"></textarea>
            </div>
            <div class="mb-4" style="min-height: 50px;">
                <label class="d-inline-block float-left mr-3">
                    <b>Xuất bản</b>
                </label>
                <div class="d-inline-block float-left">
                    <div class="onoffswitch">
                        <input type="checkbox" name="status" class="onoffswitch-checkbox" id="status">
                        <label class="onoffswitch-label mb-0" for="status">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                        </label>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary float-right">Lưu</button>
            </div>
        </div>
    </form>
</section>