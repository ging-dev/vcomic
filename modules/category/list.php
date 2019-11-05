<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

require_once('system/bootstrap.php');
require_model('category');

$title = 'Danh Sách Thư Mục';

$total = count_categories();

if ($total) {
	$list_categories =  get_list_categories($total);
}

require_once('themes/' . THEME . '/layout/head.php');
require_once('themes/' . THEME . '/templates/category/list.php');
require_once('themes/' . THEME . '/layout/end.php');
