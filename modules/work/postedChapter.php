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

$title = 'Quản Lý Chapter';

$data_story = get_story_id($id);

if (!$data_story) {
	abort(404);
}

$total = count_chapters($data_story['id']);

if ($total) {
	$list_chapts = get_all_chapter($data_story['id']);
}

require_once('themes/' . THEME . '/layout/head.php');
require_once('themes/' . THEME . '/templates/work/postedChapter.php');
require_once('themes/' . THEME . '/layout/end.php');
