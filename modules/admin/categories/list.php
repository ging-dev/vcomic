<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

require_once('system/bootstrap.php');
require_model('category');
require_model('chapter');
require_model('story');


$title = 'Quản Trị Thư Mục';

if (!$user_id || ($user['role'] < 9)) {
	abort(404);
}

$total = count_categories();

if ($total) {
	$list_categories = get_list_categories($total);
}

switch ($act) {
	case 'del':
		del_category($id);

		redirect('/admin/categories');
		break;
}

require_once('themes/' . THEME_ADMIN . '/layout/head.php');
require_once('themes/' . THEME_ADMIN . '/templates/categories/list.php');
require_once('themes/' . THEME_ADMIN . '/layout/end.php');
