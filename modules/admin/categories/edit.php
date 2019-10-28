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


$title = 'Sửa Thư Mục';

if (!$user_id || ($user['role'] < 9)) {
	abort(404);
}

$data = get_category_id($id);

$error = false;
$name = isset($_POST['name']) ? _e(trim($_POST['name'])) : $data['name'];
$slug = str_slug($name);

if ($request_method == 'POST') {
	if (!$name) {
		$error = 'Không được bỏ trống tên thư mục';
	} else {
		update_category($name, $slug, $id);

		redirect('/admin/categories');
	}
}

require_once('themes/' . THEME_ADMIN . '/layout/head.php');
require_once('themes/' . THEME_ADMIN . '/templates/categories/edit.php');
require_once('themes/' . THEME_ADMIN . '/layout/end.php');
