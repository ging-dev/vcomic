<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

function count_stories($user_id)
{
	return vco_fetchColumn('SELECT COUNT(*) FROM `stories` WHERE `user_id` = ' . $user_id);
}