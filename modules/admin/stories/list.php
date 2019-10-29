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

$title = 'Quản Trị Truyện';

if (!$user_id || ($user['role'] < 9)) {
	abort(404);
}

$total = count_all_stories();

switch ($act) {
	case 'del':
		del_story($id);

		redirect('/admin/stories');
		break;
}

require_once('themes/' . THEME_ADMIN . '/layout/head.php');
require_once('themes/' . THEME_ADMIN . '/templates/stories/list.php');
require_once('themes/' . THEME_ADMIN . '/layout/end.php');
