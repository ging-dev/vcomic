<section class="container-fluid mt-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/">
                                <span>Trang Chủ</span>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">
                                <span><?= $data['name'] ?></span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="view-search pt-2 mb-3">
    <div class="container">
        <div class="free-title">
            <div class="content"><?= $data['name'] ?></div>
            <div class="desc">
                Kết quả từ thể loại: <?= $data['name'] ?>
            </div>
        </div>
        <div class="custom-list-group">
<?php if (count_stories_category($data['id'])): ?>
    <?php foreach ($list_stories as $data_story): ?>
            <div class="item">
                <div class="story-sm">
                    <img class="lazy md-story-cover float-left shadow-sm d-none d-md-block" data-original="/uploads/thumbnail/<?= $data_story['thumbnail'] ?>" />
                    <div class="content px-md-2 pt-md-2 pl-md-4 pb-md-2" style="overflow: hidden; height: max-content">
                        <a href="/story/<?= $data_story['slug'] ?>" class="title font-weight-bold" style="font-size:18px; line-height: 1.2">
                            <?= $data_story['title'] ?>
                        </a>
                        <div class="info mt-2 small-text">
                            <div class="author">
                                <a href="/<?= get_info_id($data_story['user_id'])['username'] ?>"><?= get_info_id($data_story['user_id'])['fullname'] ?></a>
                            </div>
                            <div class="vote">
                                <span class="star">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </span>
                            </div>
                            <span class="view"><i class="fas fa-eye"></i> <?= $data_story['views'] ?></span>
                        </div>
                        <div class="desc my-3"><?= cut_string(nl2br($data_story['summary'])) ?></div>
                    </div>
                </div>
            </div>
    <?php endforeach ?>
    <?= pagination('/category/' . $slug, count_stories_category($data['id'])) ?>
<?php else: ?>
            <div class="item">
                Không có truyện nào cho thể loại <b><?= $data['name'] ?></b>
            </div>
<?php endif ?>
        </div>
    </div>
</section>