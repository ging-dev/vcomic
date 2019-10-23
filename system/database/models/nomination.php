<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

function count_nomination($story_id)
{
	return vco_fetchColumn('SELECT COUNT(*) FROM `' . VCO_NOMINATIONS . '` WHERE `story_id` = ' . $story_id);
}

function get_nomination($story_id, $user_id)
{
	return vco_fetchAll('SELECT * FROM `' . VCO_NOMINATIONS . '` WHERE `story_id` = ' . $story_id . ' AND `user_id` = ' . $user_id);
}

function insert_nomination($story_id, $user_id)
{
	return vco_execute('INSERT INTO `' . VCO_NOMINATIONS . '` (story_id, user_id) VALUES (' . $story_id . ', ' . $user_id . ')');
}
