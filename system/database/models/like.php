<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

function get_story_like($user_id, $story_id)
{
	return vco_fetchAll('SELECT * FROM `' . VCO_LIKES . '` WHERE `user_id` = ' . $user_id . ' AND `story_id` = ' . $story_id);
}

function del_story_like($user_id, $story_id)
{
	return vco_execute('DELETE FROM `' . VCO_LIKES . '` WHERE `user_id` = ' . $user_id . ' AND `story_id` = ' . $story_id);
}

function insert_story_like($user_id, $story_id)
{
	return vco_execute('INSERT INTO `' . VCO_LIKES . '` (user_id, story_id) VALUES (' . $user_id . ', ' . $story_id . ')');
}