<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

require_once('system/bootstrap.php');

require_model('tag');
require_model('story');

$data = get_tag($slug);

if (!$data) {
	abort(404);
}

$title = $data['name'];

if (count_story_tags($data['id'])) {
	$list_stories = get_stories_tag($data['id'], count_story_tags($data['id']));
}

require_once('themes/' . THEME . '/layout/head.php');
require_once('themes/' . THEME . '/templates/tag/tag.php');
require_once('themes/' . THEME . '/layout/end.php');
