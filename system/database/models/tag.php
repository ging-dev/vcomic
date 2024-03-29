<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

function get_list_tag($story_id)
{
	return vco_fetchALl('SELECT `' . VCO_TAGS . '`.* FROM `' . VCO_TAGS . '` 
		INNER JOIN `' . VCO_TAG_STORY . '` 
		ON `' . VCO_TAGS . '`.id = `' . VCO_TAG_STORY . '`.tag_id 
		WHERE `' . VCO_TAG_STORY . '`.story_id = ' . $story_id);
}

function get_tag($slug)
{
	return vco_fetch('SELECT * FROM `' . VCO_TAGS . '` WHERE `slug` = "' . $slug . '"');
}

function count_story_tags($tag_id)
{
	return vco_fetchColumn('SELECT COUNT(*) FROM `' . VCO_TAG_STORY . '` 
		INNER JOIN `' . VCO_TAGS . '` 
		ON `' . VCO_TAG_STORY . '`.tag_id = `' . VCO_TAGS . '`.id 
		WHERE `' . VCO_TAG_STORY . '`.tag_id = ' . $tag_id);
}

function insert_tag($name, $slug)
{
	return vco_execute('INSERT INTO `' . VCO_TAGS . '` (`id`, `name`, `slug`) VALUES (NULL, "' . $name . '", "' . $slug . '")');
}

function insert_tag_story($story_id, $tag_id)
{
	return vco_execute('INSERT INTO `' . VCO_TAG_STORY . '` (story_id, tag_id) VALUES (' . $story_id . ', ' . $tag_id . ')');
}
