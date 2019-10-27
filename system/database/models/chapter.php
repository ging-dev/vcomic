<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

function count_chapters()
{
	return vco_fetchColumn('SELECT COUNT(*) FROM `' . VCO_CHAPTERS . '`');
}

function get_chapter($story_id)
{
	return vco_fetchAll('SELECT * FROM `' . VCO_CHAPTERS . '` WHERE `story_id` = ' . $story_id . ' AND `is_published` = 1 ORDER BY `id`');
}

function get_data_chapter($slug)
{
	return vco_fetch('SELECT * FROM `' . VCO_CHAPTERS . '` WHERE `slug` = "' . $slug . '" AND `is_published` = 1');
}

function get_next_chapter($chapter_id, $story_id)
{
	return vco_fetch('SELECT * FROM `' . VCO_CHAPTERS . '` WHERE `id` > ' . $chapter_id . ' AND `story_id` = ' . $story_id . ' ORDER BY `id` LIMIT 1');
}

function insert_chapter($title, $slug, $content, $is_published, $story_id, $created_at)
{
	return vco_execute('INSERT INTO `' . VCO_CHAPTERS . '` (title, slug, content, is_published, story_id, created_at) VALUES 
		("' . $title . '", "' . $slug . '", "' . $content . '", ' . $is_published . ', ' . $story_id . ', ' . $created_at . ')');
}
