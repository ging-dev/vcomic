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

function get_stories_read($user_id, $total)
{
	return vco_fetchAll('SELECT * FROM `' . VCO_STORIES . '` 
		INNER JOIN `' . VCO_STORIES_READ . '` 
		ON `' . VCO_STORIES_READ . '`.story_id = `' . VCO_STORIES . '`.id
		WHERE `' . VCO_STORIES_READ . '`.user_id = ' . $user_id . ' 
		AND `is_published` = 1 
		ORDER BY `id` DESC' . get_page($total));
}

function get_stories_category($category_id, $total)
{
	return vco_fetchAll('SELECT * FROM `' . VCO_STORIES . '` WHERE `category_id` = ' . $category_id . ' AND `is_published` = 1 ORDER BY `id` DESC' . get_page($total));
}

function get_stories_tag($tag_id, $total)
{
	return vco_fetchAll('SELECT * FROM `' . VCO_STORIES . '` 
		INNER JOIN `' . VCO_TAG_STORY . '` 
		ON `' . VCO_STORIES . '`.id = `' . VCO_TAG_STORY . '`.story_id 
		WHERE `' . VCO_TAG_STORY . '`.tag_id = ' . $tag_id);
}

function get_stories($slug)
{
	return vco_fetch('SELECT * FROM `' . VCO_STORIES . '` WHERE `slug` = "' . $slug . '" AND `is_published` = 1');
}

function get_stories_id($data_id)
{
	return vco_fetch('SELECT * FROM `' . VCO_STORIES . '` WHERE `id` = "' . $data_id . '" AND `is_published` = 1');
}

function get_same_stories($category_id, $story_id)
{
	return vco_fetchAll('SELECT * FROM `' . VCO_STORIES . '` WHERE `category_id` = ' . $category_id . ' AND `id` <> ' . $story_id . ' AND `is_published` = 1 ORDER BY `id` DESC');
}

function update_view($story_id)
{
	return vco_execute('UPDATE `' . VCO_STORIES . '` SET `views` = `views` + 1 WHERE `id` = ' . $story_id . ' LIMIT 1');
}
