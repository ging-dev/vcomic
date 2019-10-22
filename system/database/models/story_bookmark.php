<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

function get_story_bookmark($user_id)
{
	return vco_fetchColumn('SELECT COUNT(*) FROM `' . VCO_STORIES_BOOKMARK . '` WHERE `user_id` = ' . $user_id);
}

function get_story

