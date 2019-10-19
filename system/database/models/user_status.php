<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

function count_status($user_id)
{
	return vco_fetchColumn('SELECT COUNT(*) FROM `' . VCO_USER_STATUS . '` WHERE `user_id` = ' . $user_id);
}

function get_status($user_id, $total)
{
	return vco_fetchAll('SELECT * FROM `' . VCO_USER_STATUS . '` WHERE `user_id` = ' . $user_id . ' ORDER BY `id` DESC' . get_page($total));
}

function insert_status($user_id, $msg, $private, $created_at)
{
	return vco_execute('INSERT INTO `' . VCO_USER_STATUS . '` (user_id, msg, private, created_at) 
		VALUES (' . $user_id . ', "' . $msg . '", ' . $private . ', ' . $created_at . ')');
}