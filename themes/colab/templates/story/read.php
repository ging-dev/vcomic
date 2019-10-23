<section class="pt-4">
    <div class="container">
        <div class="row my-3">
            <div class="col-8 pl-3">
                <h3 class="font-weight-bold">Truyện đã đọc</h3>
            </div>
        </div>
        <div class="row my-3 free-list">
<?php if ($total): ?>
    <?php foreach (get_stories_read($user_id, $total) as $data): ?>
        <div class="col-md-12 px-3 free-list-item">
            <div class="p-3 border">
                <div class="row mx-0 px-0">
                    <div class="col-md-8 pl-0">
                        <img class="lazy story-sm float-left" data-original="/uploads/thumbnail/<?= $data['thumbnail'] ?>">
                        <div class="pl-3" style="overflow: hidden;">
                            <h5 class="font-weight-bold">
                                <a href="/story/<?= $data['slug'] ?>"><?= $data['title'] ?></a>
                            </h5>
                        </div>
                    </div>
                    <!-- <div class="col-md-4 px-0">
                        <div class="controller mt-1 text-center">
                            <a class="btn btn-custom btn-sm d-inline-block" href="/work/<?= $story['slug'] ?>/">Quản lí chương</a>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    <?php endforeach ?>
<?php else: ?>
            <div class="col-md-12 px-3 free-list-item">
                <div class="p-3 border">Bạn chưa đọc truyện nào
            </div>
<?php endif ?>
        </div>
    </div>
<?php echo pagination('/story/read', count_story_read($user_id)); ?>
</section>