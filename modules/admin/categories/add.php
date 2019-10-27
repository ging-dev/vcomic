<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

require_once('system/bootstrap.php');
require_model('category');

$title = 'Thêm Thư Mục';

if (!$user_id || ($user['role'] < 9)) {
	abort(404);
}

$error    = false;
$name = isset($_POST['name']) ? _e(trim($_POST['name'])) : '';
$slug = str_slug($name);

if ($request_method == 'POST') {
	if (!$name) {
		$error = 'Không được bỏ trống thông tin!';
	} else {
		if (mb_strlen($name) < 4) {
			$error = 'Tên thư mục từ 6-60 ký tự';
		}

		if (get_category($slug)) {
			$error = 'Tên thư mục này đã tồn tại';
		}
	}

	if (!$error) {
		insert_category($name, $slug, time());

		redirect('/admin/categories');
	}
}

require_once('themes/' . THEME . '/layout/admin/head.php');
require_once('themes/' . THEME . '/templates/admin/categories/add.php');
require_once('themes/' . THEME . '/layout/admin/end.php');