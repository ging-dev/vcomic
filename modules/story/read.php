<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

require_once('system/bootstrap.php');
require_model('story');
require_model('story_read');

if (!$user_id) {
	abort(404);
}

$title = 'Truyện đã đọc';

$total = count_story_read($user_id);
$list_stories_read = get_stories_read($user_id, $total);

require_once('themes/' . THEME . '/layout/head.php');
require_once('themes/' . THEME . '/templates/story/read.php');
require_once('themes/' . THEME . '/layout/end.php');