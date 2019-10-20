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