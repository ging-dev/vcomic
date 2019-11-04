<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

function count_msg($user_id)
{
	return vco_fetchColumn('SELECT COUNT(DISTINCT `sender_id`) FROM `' . VCO_MESSAGES . '` WHERE `receiver_id` = ' . $user_id);
}

function count_msg_with($sender_id, $receiver_id)
{
	return vco_fetchColumn('SELECT COUNT(*) FROM `' . VCO_MESSAGES . '` WHERE `sender_id` = ' . $sender_id . ' AND `receiver_id` = ' . $receiver_id);
}

function count_new_msg($receiver_id) {
	return vco_fetchColumn('SELECT COUNT(*) FROM `' . VCO_MESSAGES . '` WHERE `receiver_id` = ' . $receiver_id . ' AND `read` = 0');
}

function check_seen($sender_id, $receiver_id)
{
	$data = vco_fetch('SELECT `read` FROM `' . VCO_MESSAGES . '` WHERE `sender_id` = ' . $sender_id . ' AND `receiver_id` = ' . $receiver_id . ' ORDER BY `id` DESC LIMIT 1');
	return $data['read'];
}

function update_seen_msg($sender_id, $receiver_id)
{
	return vco_execute('UPDATE `' . VCO_MESSAGES . '` SET `read` = 1 WHERE `sender_id` = ' . $sender_id . ' AND `receiver_id` = ' . $receiver_id);
}

function get_info_msg($sender_id)
{
	return vco_fetch('SELECT * FROM `' . VCO_MESSAGES . '` WHERE `sender_id` = ' . $sender_id);
}

function get_list_msg($receiver_id) {
	return vco_fetchAll('SELECT * FROM `' . VCO_MESSAGES . '` WHERE `receiver_id` = ' . $receiver_id . ' GROUP BY `sender_id` ORDER BY MAX(`sent_at`) DESC');
}

function get_list_msg_with($sender_id, $receiver_id)
{
	return vco_fetchAll('SELECT * FROM `' . VCO_MESSAGES . '` 
		WHERE (`sender_id` = ' . $sender_id . ' AND `receiver_id` = ' . $receiver_id . ') 
		OR (`sender_id` = ' . $receiver_id . ' AND `receiver_id` = ' . $sender_id . ') ORDER BY `id` DESC');
}

function insert_msg($content, $sender_id, $receiver_id, $sent_at)
{
	return vco_execute('INSERT INTO `' . VCO_MESSAGES . '` 
		(content, sender_id, receiver_id, sent_at) VALUES ("' . $content . '", ' . $sender_id . ', ' . $receiver_id . ', ' . $sent_at . ')');
}
