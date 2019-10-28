<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

require_once('system/bootstrap.php');
require_model('category');
require_model('story');

$title = 'Sửa Truyện';

if (!$user_id || ($user['role'] < 9)) {
	abort(404);
}

$data = get_story_id($id);

$error = false;
$name = isset($_POST['name']) ? _e(trim($_POST['name'])) : $data['title'];
$slug = str_slug($name);
$summary = isset($_POST['summary']) ? _e(trim($_POST['summary'])) : $data['summary'];
$author = isset($_POST['author']) ? _e(trim($_POST['author'])) : $data['author'];
$is_published = (isset($_POST['is_published']) == true) ? 1 : 0;
$is_completed = (isset($_POST['is_completed']) == true) ? 1 : 0;

if ($request_method == 'POST') {
	if (!$name || !$summary || !$author) {
		$error = 'Không được bỏ trống thông tin';
	} else {
		update_story($name, $slug, $summary, $author, $is_published, $is_completed, $id);

		redirect('/admin/stories');
	}
}

require_once('themes/' . THEME_ADMIN . '/layout/head.php');
require_once('themes/' . THEME_ADMIN . '/templates/stories/add.php');
require_once('themes/' . THEME_ADMIN . '/layout/end.php');
