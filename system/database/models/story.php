<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

function count_all_stories()
{
	return vco_fetchColumn('SELECT COUNT(*) FROM `' . VCO_STORIES);
}

function count_stories($user_id)
{
	return vco_fetchColumn('SELECT COUNT(*) FROM `' . VCO_STORIES . '` WHERE `user_id` = ' . $user_id);
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

function get_all_stories($total)
{
	return vco_fetchAll('SELECT * FROM `' . VCO_STORIES . '` ORDER BY `id` DESC' . get_page($total));
}

function get_user_stories($user_id, $total)
{
	return vco_fetchAll('SELECT * FROM `' . VCO_STORIES . '` WHERE `user_id` = ' . $user_id . ' ORDER BY `id` DESC' . get_page($total));
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

function get_stories($col, $val)
{
	return vco_fetch('SELECT * FROM `' . VCO_STORIES . '` WHERE `' . $col . '` = "' . $val . '" AND `is_published` = 1');
}

function get_story_id($story_id)
{
	return vco_fetch('SELECT * FROM `' . VCO_STORIES . '` WHERE `id` = ' . $story_id . ' LIMIT 1');
}

function get_same_stories($category_id, $story_id)
{
	return vco_fetchAll('SELECT * FROM `' . VCO_STORIES . '` WHERE `category_id` = ' . $category_id . ' AND `id` <> ' . $story_id . ' AND `is_published` = 1 ORDER BY `id` DESC');
}

function update_view($story_id)
{
	return vco_execute('UPDATE `' . VCO_STORIES . '` SET `views` = `views` + 1 WHERE `id` = ' . $story_id . ' LIMIT 1');
}

function update_story_one_col($col, $val, $id)
{
	return vco_execute('UPDATE `' . VCO_STORIES . '` SET `' . $col . '` = "' . $val . '" WHERE `id` = ' . $id . ' LIMIT 1');
}

function update_story($name, $slug, $summary, $author, $is_published, $is_completed, $id)
{
	return vco_execute('UPDATE `' . VCO_STORIES . '` SET 
		`title` = "' . $name . '", 
		`slug` = "' . $slug . '", 
		`summary` = "' . $summary . '", 
		`author` = "' . $author . '", 
		`is_published` = ' . $is_published . ', 
		`is_completed` = ' . $is_completed . ' 
		WHERE `id` = ' . $id . ' LIMIT 1');
}

function insert_story($title, $slug, $summary, $thumbnail, $author, $is_published, $user_id, $category_id, $created_at)
{
	return vco_execute('INSERT INTO `' . VCO_STORIES . '` 
		(title, slug, summary, thumbnail, author, is_published, user_id, category_id, created_at) VALUES 
		("' . $title . '", "' . $slug . '", "' . $summary . '", "' . $thumbnail . '", "' . $author . '", ' . $is_published . ', ' . $user_id . ', ' . $category_id . ', ' . $created_at . ')');
}

function del_story($id)
{
	return vco_execute('DELETE FROM `' . VCO_STORIES . '` WHERE `id` = ' . $id . ' LIMIT 1');
}
