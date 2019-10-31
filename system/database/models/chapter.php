<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

function count_chapters($story_id)
{
	return vco_fetchColumn('SELECT COUNT(*) FROM `' . VCO_CHAPTERS . '` WHERE `story_id` = ' . $story_id);
}

function count_status_chapt($story_id, $status)
{
	return vco_fetchColumn('SELECT COUNT(*) FROM `' . VCO_CHAPTERS . '` WHERE `story_id` = ' . $story_id . ' AND `is_published` = ' . $status);
}

function get_chapter($story_id)
{
	return vco_fetchAll('SELECT * FROM `' . VCO_CHAPTERS . '` WHERE `story_id` = ' . $story_id . ' AND `is_published` = 1 ORDER BY `id`');
}

function get_all_chapter($story_id)
{
	return vco_fetchAll('SELECT * FROM `' . VCO_CHAPTERS . '` WHERE `story_id` = ' . $story_id . ' ORDER BY `id` DESC');
}

function get_data_chapter($slug)
{
	return vco_fetch('SELECT * FROM `' . VCO_CHAPTERS . '` WHERE `slug` = "' . $slug . '" AND `is_published` = 1');
}

function get_next_chapter($chapter_id, $story_id)
{
	return vco_fetch('SELECT * FROM `' . VCO_CHAPTERS . '` WHERE `id` > ' . $chapter_id . ' AND `story_id` = ' . $story_id . ' AND `is_published` = 1 ORDER BY `id` LIMIT 1');
}

function update_chapt_one_col($col, $val, $slug)
{
	return vco_execute('UPDATE `' . VCO_CHAPTERS . '` SET `' . $col . '` = "' . $val . '" WHERE `slug` = "' . $slug . '"');
}

function insert_chapter($title, $slug, $content, $is_published, $story_id, $created_at)
{
	return vco_execute('INSERT INTO `' . VCO_CHAPTERS . '` (title, slug, content, is_published, story_id, created_at) VALUES 
		("' . $title . '", "' . $slug . '", "' . $content . '", ' . $is_published . ', ' . $story_id . ', ' . $created_at . ')');
}

function del_chapter($slug)
{
	return vco_execute('DELETE FROM `' . VCO_CHAPTERS . '` WHERE `slug` = "' . $slug . '"');
}
