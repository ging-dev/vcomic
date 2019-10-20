<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

function count_stories($user_id)
{
	return vco_fetchColumn('SELECT COUNT(*) FROM `' . VCO_STORIES . '` WHERE `user_id` = ' . $user_id . ' AND `is_published` = 1');
}

function count_stories_category($category_id)
{
	return vco_fetchColumn('SELECT COUNT(*) FROM `' . VCO_STORIES . '` WHERE `category_id` = ' . $category_id . ' AND `is_published` = 1');
}

function get_stories_category($category_id, $total)
{
	return vco_fetchAll('SELECT * FROM `' . VCO_STORIES . '` WHERE `category_id` = ' . $category_id . ' AND `is_published` = 1 ORDER BY `id` DESC' . get_page($total));
}

function get_stories($slug)
{
	return vco_fetch('SELECT * FROM `' . VCO_STORIES . '` WHERE `slug` = "' . $slug . '" AND `is_published` = 1');
}

function get_same_stories($category_id, $story_id)
{
	return vco_fetchAll('SELECT * FROM `' . VCO_STORIES . '` WHERE `category_id` = ' . $category_id . ' AND `id` <> ' . $story_id . ' AND `is_published` = 1 ORDER BY `id` DESC');
}

function update_view($story_id)
{
	return vco_execute('UPDATE `' . VCO_STORIES . '` SET `views` = `views` + 1 WHERE `id` = ' . $story_id . ' LIMIT 1');
}

function get_story_read($user_id, $story_id)
{
	return vco_fetchAll('SELECT * FROM `' . VCO_STORIES_READ . '` WHERE `user_id` = ' . $user_id . ' AND `story_id` = ' . $story_id);
}

function insert_story_read($user_id, $story_id)
{
	return vco_execute('INSERT INTO `' . VCO_STORIES_READ . '` (user_id, story_id) VALUES (' . $user_id . ', ' . $story_id . ')');
}
