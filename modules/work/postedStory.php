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

$title = 'Quản Lý Truyện';

if (!$user_id || $user['role'] != 4) {
    abort(404);
}

$total = count_stories($user_id);

if ($total) {
	$list_stories = get_user_stories($user_id, $total);
}

require_once('themes/' . THEME . '/layout/head.php');
require_once('themes/' . THEME . '/templates/work/postedStory.php');
require_once('themes/' . THEME . '/layout/end.php');
