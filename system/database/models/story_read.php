<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

function count_story_read($user_id)
{
	return vco_fetchColumn('SELECT COUNT(*) FROM `' . VCO_STORIES_READ . '` WHERE `user_id` = ' . $user_id);
}

function check_story_read($user_id, $story_id)
{
	return vco_fetchAll('SELECT * FROM `' . VCO_STORIES_READ . '` WHERE `user_id` = ' . $user_id . ' AND `story_id` = ' . $story_id);
}

function insert_story_read($user_id, $story_id)
{
	return vco_execute('INSERT INTO `' . VCO_STORIES_READ . '` (user_id, story_id) VALUES (' . $user_id . ', ' . $story_id . ')');
}
