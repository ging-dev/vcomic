<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

function count_notif_not_seen($user_id)
{
	return vco_fetchColumn('SELECT COUNT(*) FROM `' . VCO_NOTIFICATIONS . '` WHERE `receiver_id` = ' . $user_id . ' AND `seen` = 0');
}

function count_notif($user_id)
{
	return vco_fetchColumn('SELECT COUNT(*) FROM `' . VCO_NOTIFICATIONS . '` WHERE `receiver_id` = ' . $user_id);
}

function get_notif($user_id, $total)
{
	return vco_fetchAll('SELECT * FROM `' . VCO_NOTIFICATIONS . '` WHERE `receiver_id` = ' . $user_id . ' ORDER BY `id` DESC' . get_page($total));
}

function update_seen($user_id)
{
	return vco_execute('UPDATE `' . VCO_NOTIFICATIONS . '` SET `seen` = 1 WHERE `receiver_id` = ' . $user_id);
}

function update_checked($receiver_id, $notif_id)
{
	return vco_execute('UPDATE `' . VCO_NOTIFICATIONS . '` SET `checked` = 1 WHERE `receiver_id` = ' . $user_id . ' AND `id` = ' . $notif_id . ' LIMIT 1');
}

function insert_notif($msg, $receiver_id, $created_at)
{
	return vco_execute('INSERT INTO `' . VCO_NOTIFICATIONS . '` (msg, receiver_id, created_at) VALUES ("' . $msg . '", ' . $receiver_id . ', ' . $created_at . ')');
}
