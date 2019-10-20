<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

function count_chat()
{
	return vco_fetchColumn('SELECT COUNT(*) FROM `' . VCO_CHATS . '`');
}

function get_chat($total)
{
	return vco_fetchAll('SELECT * FROM `' . VCO_CHATS . '` ORDER BY `id` DESC' . get_page($total));
}

function get_user_chat($data_id)
{
	return vco_fetch('SELECT `id`, `username`, `fullname`, `avatar` FROM `users` WHERE `id` = ' . $data_id);
}

function insert_chat($msg, $user_id, $created_at)
{
	return vco_execute('INSERT INTO `' . VCO_CHATS . '` 
		(msg, user_id, created_at) VALUES ("' . $msg . '", ' . $user_id . ', ' . $created_at .')');
}

function del_chat($chat_id)
{
	return vco_execute('DELETE FROM `' . VCO_CHATS . '` WHERE `id` = ' . $chat_id . ' LIMIT 1');
}

function truncate_chat()
{
	return vco_execute('TRUNCATE TABLE `' . VCO_CHATS . '`');
}
