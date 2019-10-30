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

$data = get_category('slug', $slug);

if (!$data) {
	abort(404);
}

$title = $data['name'];

$total = count_stories_category($data['id']);

if ($total) {
	$list_stories = get_stories_category($data['id'], $total);
}

require_once('themes/' . THEME . '/layout/head.php');
require_once('themes/' . THEME . '/templates/category/category.php');
require_once('themes/' . THEME . '/layout/end.php');
