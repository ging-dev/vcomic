<!DOCTYPE html>
<html lang="vi">
<head>
	<meta name="mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta name="google-site-verification" content="" />
    <meta name="keywords" content="<?= $env['keywords'] ?>" />
    <meta name="description" content="<?= $env['description'] ?>" />
    <meta property="fb:app_id" content="" />
	<title><?= isset($title) ? $title : $env['title'] ?></title>
	<link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/all.min.css?ver=<?= VERSION ?>" />
	<link rel="stylesheet" href="<?= SITE_URL ?>/assets/css/bootstrap.min.css?ver=<?= VERSION ?>" />
	<link rel="stylesheet" href="<?= SITE_URL ?>/themes/colab/css/swiper.min.css?ver=<?= VERSION ?>" />
	<link rel="stylesheet" href="<?= SITE_URL ?>/themes/colab/css/custom.css?ver=<?= VERSION ?>" />
</head>
<body>
    <section class="loading">
        <div class="loading-content">
            <div class="loader">
                <div class="logo">
                    vComic.
                </div>
                <div class="icon">
                    <div class="sp sp-3balls"></div>
                </div>
            </div>
        </div>
    </section>
    <header style="margin-bottom: 52px;">
        <nav class="custom-nav">
            <div class="custom-nav-brand">
                <a href="/" class="text-white">vComic.</a>
            </div>
            <div class="custom-nav-search">
                <form method="GET">
                    <input type="text" class="nav-search-input" name="search" id="search" placeholder="Nhập từ khóa tìm kiếm" />
                </form>
            </div>
            <div class="custom-nav-item">
                <div class="custom-nav-list">
                    <!-- <a class="item" href="/top">
                        <i class="far fa-hashtag"></i> TOP
                    </a> -->
    <?php if ($user_id): ?>
                    <a class="item" href="/chat">
                        <i class="fal fa-comment-alt-lines"></i> Chat
                    </a>
                    <a class="item" href="/story/read">
                        <i class="far fa-history"></i> Đã Đọc
                    </a>
                    <a class="item" href="/profile">
                        <img class="lazy avatar-sm" data-original="/uploads/avatar/<?= $user['avatar'] ?>?t=<?= time() ?>"> <?= $user['fullname'] ?>
                    </a>
                    <a class="item" href="/logout"><i class="fal fa-door-open"></i></a>
    <?php else: ?>
                    <a class="item" href="#" data-toggle="modal" data-target="#loginModal">
                        <i class="fal fa-sign-in"></i> Đăng Nhập
                    </a>
                    <a class="item" href="#" data-toggle="modal" data-target="#registerModal">
                        <i class="fal fa-user-plus"></i> Đăng Ký
                    </a>
                    <a class="item" href="https://facebook.com/100009162578251" target="_blank">
                        <i class="fab fa-facebook-f"></i> Facebook
                    </a>
    <?php endif ?>
                    <div class="item cursor">
                        <i class="fal fa-list"></i> <span class="list-title">Thể loại</span>
                        <div class="more-item category">
                            <div class="row text-center">
    <?php if (get_categories()): ?>
    <?php foreach (get_categories() as $list_cate): ?>
                                <div class="col-6 sub px-2">
                                    <a href="/category/<?= $list_cate['slug'] ?>" class="text-white"><?= $list_cate['name'] ?></a>
                                </div>
    <?php endforeach ?>
    <?php else: ?>
                                <div class="col-12 sub px-2">
                                    <a href="#" class="text-white">Chưa có danh mục nào!</a>
                                </div>
    <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <!-- MOBILE -->
        <nav class="custom-nav-bottom d-md-none">
            <div class="custom-nav-bottom-list">
    <?php if ($user_id): ?>
                <div class="item">
                    <a href="/chat"><i class="fal fa-comment-alt-lines fa-lg"></i></a>
                </div>
                <div class="item">
                    <a href="/notifications"><i class="fal fa-bell fa-lg"></i></a>
                </div>
                <div class="item active">
                    <a href=""><i class="far fa-home fa-lg"></i></a>
                </div>
                <div class="item">
                    <a href="/user/profile"><i class="fal fa-user-circle fa-lg"></i></a>
                </div>
                <div class="item">
                    <a href="/logout"><i class="fal fa-sign-out-alt fa-lg"></i></a>
                </div>
    <?php else: ?>
                <div class="item">
                    <a href="#" data-toggle="modal" data-target="#loginModal"><i class="fal fa-sign-in fa-lg"></i></a>
                </div>
                <div class="item">
                    <a href="#" data-toggle="modal" data-target="#registerModal"><i class="fal fa-user-plus fa-lg"></i></a>
                </div>
                <div class="item active">
                    <a href=""><i class="far fa-home fa-lg"></i></a>
                </div>
                <div class="item">
                    <a href="/top"><i class="far fa-hashtag"></i></a>
                </div>
                <div class="item">
                    <a href="https://facebook.com/100009162578251/" target="_blank"><i class="fab fa-facebook fa-lg"></i></a>
                </div>
    <?php endif ?>
            </div>
        </nav>
    </header>