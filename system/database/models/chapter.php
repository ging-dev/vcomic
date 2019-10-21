<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

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
