<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

require_once('system/bootstrap.php');
require_model('chapter');
require_model('comment');
require_model('story');

$data_chapter = get_data_chapter($slug);
$title = $data_chapter['title'] . ' | vComic.';

if (!$data_chapter) {
	abort(404);
}

$msg = isset($_POST['msg']) ? _e(trim($_POST['msg'])) : '';
$data_story = get_stories('id', $data_chapter['story_id']);
$data_next_chapter = get_next_chapter($data_chapter['id'], $data_chapter['story_id']);

if ($request_method == 'POST') {
	insert_comment($msg, $user_id, $data_chapter['id'], time());
	redirect('/story/' . $data_story['slug'] . '/' . $data_chapter['slug']);
}

if (count_comment($data_chapter['id'])) {
	$list_comment = get_list_comment($data_chapter['id'], count_comment($data_chapter['id']));
}

require_once('themes/' . THEME . '/layout/head.php');
require_once('themes/' . THEME . '/templates/chapter/chapter.php');
require_once('themes/' . THEME . '/layout/end.php');
