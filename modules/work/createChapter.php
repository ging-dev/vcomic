<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

require_once('system/bootstrap.php');
require_model('chapter');
require_model('story');

if (! $user_id || $user['role'] != 4) {
    abort(404);
}

$title        = 'Đăng chương mới';
$error        = false;
$get_title    = isset($_POST['title_chapter']) ? _e($_POST['title_chapter']) : '';
$get_slug     = str_slug($get_title);
$get_content  = isset($_POST['content']) ? _e($_POST['content']) : '';
$status       = (isset($_POST['status']) == true) ? 1 : 0;

$data_story = get_stories('slug', $slug);

if (!$data_story) {
	abort(404);
}

if ($data_story['user_id'] != $user_id) {
	abort(404);
}

if ($request_method == 'POST'):
	insert_chapter($get_title, $get_slug, $get_content, $status, $data_story['id'], time());	

	redirect('/work/' . $data_story['id']);
endif;

require_once('themes/' . THEME . '/layout/head.php');
require_once('themes/' . THEME . '/templates/work/createChapter.php');
require_once('themes/' . THEME . '/layout/end.php');
