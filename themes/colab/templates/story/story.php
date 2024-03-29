<section>
    <div class="container-fluid p-0 story-image-background" style="background-image: url('<?= $data['thumbnail'] ?>');z-index: 2">
        <div class="fill">
            <div class="container pt-5 w-md-100">
                <div class="row mb-4">
                    <div class="col-lg-12">
                        <div class="temp-story-cover">
                            <img class="lazy image" data-original="/uploads/thumbnail/<?= $data['thumbnail'] ?>" alt="<?= $data['title'] ?>"/>
                        </div>
                        <div class="temp-story-body">
                            <div class="row px-3 p-md-0">
                                <div class="col-lg-8">
                                    <h2 class="title mb-4"><?= $data['title'] ?></h2>
                                    <div class="author mb-3">
                                        <span class="pr-4">Người Đăng:</span>
                                        <b>
                                        	<a href="/<?= $data_user['username'] ?>">
                                        		<?= display_name($data_user['role'], $data_user['fullname']) ?>
                                        	</a>
                                        </b>
                                    </div>
                                    <div class="type  mb-3">
                                        <span class="pr-4">Thể Loại:</span> <b><a href="/category/<?= $data_cate['slug'] ?>"><?= $data_cate['name'] ?></a></b>
                                    </div>
                                    <div class="tag mb-3">
                                        <span class="pr-4">Tags:</span>
                                        <span class="temp-tag">
                                        <?php foreach ($list_tags as $tag): ?>
                                            <a href="/tag/<?= $tag['slug'] ?>" class="item"><?= $tag['name'] ?></a>
                                        <?php endforeach ?>
                                        </span>
                                    </div>
                                    <div class="progressing mb-3">
                                        <span class="pr-4">Tình trạng:</span> <?= $data['is_completed'] == 1 ? 'Hoàn Thành' : 'Đang Ra'; ?>
                                    </div>
                                    <div class="controller">
                                        <div class="row px-3 p-md-0 justify-content-center justify-content-lg-start">
                                            <div class="col-auto pr-3 pr-md-0">
                                            <?php if ($data_chapter): ?>
                                                <a href="/story/<?= $data['slug'] ?>/<?= $data_chapter[0]['slug'] ?>" class="btn btn-outline-custom btn-sm mr-2">
                                                    <i class="fas fa-glasses-alt"></i> Đọc
                                                </a>
                                            <?php else: ?>
                                                <a href="#" class="btn btn-outline-custom btn-sm mr-2"><i class="fas fa-glasses-alt"></i> Đọc</a>
                                            <?php endif ?>
                                            <?php if ($user_id): ?>
                                                <?php if (!get_story_like($user_id, $data['id'])): ?>
                                                    <button id="submit-like" class="btn btn-outline-custom btn-sm">
                                                        <i class="far fa-heart"></i> Yêu Thích
                                                    </button>
                                                <?php else: ?>
                                                    <button id="submit-like" class="btn btn-outline-custom btn-sm">
                                                        <i class="far fa-heart-broken"></i> Bỏ Thích
                                                    </button>
                                                <?php endif ?>
                                            <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 mt-3">
                                    <center class="rating">
                                        <div class="number">
                                            4.0
                                        </div>
                                        <div class="star mt-3">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fal fa-star"></i>
                                        </div>
                                    </center>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row mx-2 mx-md-0">
            <div class="col-lg-12">
                <p class="story-content"><?= nl2br($data['summary']) ?></p>
            </div>
            <div class="col-lg-12 mb-3">
                <div class="free-title mb-0">
                    <div class="content">
                        Danh sách chương
                    </div>
                </div>
                <div class="custom-list-group row mx-1 mx-md-0" style="height: 500px; overflow-y: scroll">
                <?php if ($data_chapter): ?>
                    <?php foreach ($data_chapter as $chapter): ?>
                        <div class="col-md-6 p-0">
                            <div class="col-item">
                                <a href="/story/<?= $data['slug'] . '/' . $chapter['slug'] ?>"><?= $chapter['title'] ?></a>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php else: ?>
                    <div class="col-md-6 p-0">
                        <div class="col-item">
                            <p>Chưa có chương nào!</p>
                        </div>
                    </div>
                <?php endif ?>
                </div>
            </div>
            <div class="col-lg-12 mb-3">
                <div class="row mx-2 mx-md-0">
                    <div class="col-lg-6">
                        <div class="free-title mb-0">
                            <div class="content">
                                Đề cử
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <img class="lazy story-sm my-4" data-original="/assets/images/nomination.png" alt="" />
                        </div>
                        <div class="d-flex justify-content-center">
                        <?php if (!get_nomination($data['id'], $user_id)): ?>
                            <?php if (!$user_id || $user['role'] < 3): ?>
                                <span class="btn btn-custom btn-sm">
                                    <i class="fal fa-ticket-alt"></i> Bạn phải là VIP
                                </span>
                            <?php else: ?>
                                <?php if ($user_id == $data['user_id']): ?>
                                    <span class="btn btn-custom btn-sm">
                                        <i class="fal fa-ticket-alt"></i> Truyện của bạn được đề cử <?= $count_nomination ?> lượt
                                    </span>
                                <?php else: ?>
                                    <button id="submit-nomination" class="btn btn-outline-custom btn-sm">
                                        <i class="fal fa-ticket-alt"></i> Đề cử <?= $count_nomination ?> lượt
                                    </button>
                                <?php endif ?>
                            <?php endif ?>
                        <?php else: ?>
                            <span class="btn btn-custom btn-sm">
                                <i class="fal fa-ticket-alt"></i> Bạn đã đề cử
                            </span>
                        <?php endif ?>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="free-title mb-0">
                            <div class="content">
                                Donate cho tác giả
                            </div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <div class="mx-5 my-5">
                                <?php
                                    if (isset($error) == true) {
                                        echo '<div>' . $error . '</div>';
                                    }
                                    if ($user_id != $data['user_id']): 
                                ?>
                                <a href="/story/<?= $data['slug'] ?>/donate/1000" class="btn btn-outline-custom btn-sm my-2">
                                    <i class="fal fa-star-christmas"></i> 1.000
                                </a>
                                <a href="/story/<?= $data['slug'] ?>/donate/5000" class="btn btn-outline-custom btn-sm my-2">
                                    <i class="fas fa-star-christmas"></i> 5.000
                                </a>
                                <a href="/story/<?= $data['slug'] ?>/donate/10000" class="btn btn-outline-custom btn-sm my-2">
                                    <i class="fal fa-stars"></i> 10.000
                                </a>
                                <a href="/story/<?= $data['slug'] ?>/donate/20000" class="btn btn-outline-custom btn-sm my-2">
                                    <i class="fas fa-stars"></i> 20.000
                                </a>
                                <a href="/story/<?= $data['slug'] ?>/donate/50000" class="btn btn-outline-custom btn-sm my-2">
                                    <i class="far fa-moon-stars"></i> 50.000
                                </a>
                                <a href="/story/<?= $data['slug'] ?>/donate/100000" class="btn btn-outline-custom btn-sm my-2">
                                    <i class="fas fa-moon-stars"></i> 100.000
                                </a>
                                <a href="/story/<?= $data['slug'] ?>/donate/200000" class="btn btn-outline-custom btn-sm my-2">
                                    <i class="fal fa-sun"></i> 200.000
                                </a>
                                <a href="/story/<?= $data['slug'] ?>/donate/200000" class="btn btn-outline-custom btn-sm my-2">
                                    <i class="fas fa-sun"></i> 200.000
                                </a>
                            <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mb-3">
                <div class="free-title mb-0">
                    <div class="content">
                        Các truyện liên quan
                    </div>
                </div>
                <div class="row custom-list-group mx-1 mx-md-0">
                <?php foreach ($data_same_stories as $story_recommend):
                    $data_user_recommend = get_info_id($story_recommend['user_id']);
                ?>
                    <div class="col-md-6 px-0">
                        <div class="col-item">
                            <div class=" story-sm">
                                <img class="lazy sm-story-cover float-left shadow-sm" data-original="/uploads/thumbnail/<?= $story_recommend['thumbnail'] ?>" style="margin-top: -1px" />
                                <div class="content px-2 pt-2" style="overflow: hidden;">
                                    <h3 href="title" class="title" style="font-size:18px; line-height: 1.2">
                                        <a href="/story/<?= $story_recommend['slug'] ?>"><?= $story_recommend['title'] ?></a>
                                    </h3>
                                    <div class="info mt-2 small-text">
                                        <span class="author">
                                            <a href="/<?= $data_user_recommend['username'] ?>">
                                            	<?= display_name($data_user_recommend['role'], $data_user_recommend['fullname']) ?>
                                            </a>
                                        </span>
                                        <br/>
                                        <div class="vote">
                                            <span class="star">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="far fa-star"></i>
                                            </span><br />
                                            <span class="view">
                                                <i class="far fa-eye"></i> <?= $story_recommend['views'] ?>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="story-tags mt-2 d-md-none d-lg-block">
									<?php foreach(get_list_tag($story_recommend['id']) as $tag_recommend): ?>
                                        <a href="/tag/<?= $tag_recommend['slug'] ?>" class="item"><?= $tag_recommend['name'] ?></a>
									<?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</section>