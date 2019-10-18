<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

function get_list_notif($user_id, $total)
{
	return vco_fetchAll('SELECT * FROM `' . VCO_NOTIFICATIONS . '` WHERE `receiver_id` = ' . $user_id . ' AND `is_read` = 0 ORDER BY `id` DESC' . get_page($total));
}

function update_read_notification($user_id)
{
	return vco_execute('UPDATE `' . VCO_NOTIFICATIONS . '` SET `is_read` = 1 WHERE `receiver_id` = ' . $user_id . ' LIMIT 1');
}
