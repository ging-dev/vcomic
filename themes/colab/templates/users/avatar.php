<section>
    <div class="container pt-5">
        <div class="mb-4">
            <form class="row" method="POST" enctype="multipart/form-data">
                <div class="col-md-12">
                    <img class="lazy" id="previewImg" data-original="<?= get_avatar($user_id) ?>" height="200" alt="Image preview..." />
                    <input type="file" name="avatar" onchange="previewFile()" />
                    <button type="submit" class="btn btn-outline-custom btn-sm">Đồng Ý</button>
                </div>
            </form>
        </div>
    </div>
</section>