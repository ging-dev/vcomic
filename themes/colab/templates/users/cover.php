<section>
    <div class="container pt-5">
        <div class="mb-4">
            <form class="row" method="POST" enctype="multipart/form-data">
                <div class="col-md-12">
                    <img src="<?= get_cover($user_id) ?>" height="200" alt="Image preview...">
                    <input type="file" name="cover" onchange="previewFile()" />
                    <button type="submit" class="btn btn-outline-custom btn-sm">Đồng Ý</button>
                </div>
            </form>
        </div>
    </div>
</section>