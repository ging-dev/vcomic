<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

function count_stories($user_id)
{
	return vco_fetchColumn('SELECT COUNT(*) FROM `' . VCO_STORIES . '` WHERE `user_id` = ' . $user_id);
}

function count_stories_category($category_id)
{
	return vco_fetchColumn('SELECT COUNT(*) FROM `' . VCO_STORIES . '` WHERE `category_id` = ' . $category_id);
}

function get_stories_category($category_id, $total)
{
	return vco_fetchAll('SELECT * FROM `' . VCO_STORIES . '` WHERE `category_id` = ' . $category_id . ' ORDER BY `id` DESC' . get_page($total));
}
