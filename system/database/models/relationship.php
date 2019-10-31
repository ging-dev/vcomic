<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

function get_user_rela($user_id, $type)
{
	return vco_fetchAll('SELECT * FROM `' . VCO_RELATIONSHIPS . '` WHERE `user_id` = ' . $user_id . ' AND `type` = ' . $type);
}

function check_rela($user_id, $relation_user_id, $type)
{
    return vco_fetchColumn('SELECT COUNT(*) FROM `' . VCO_RELATIONSHIPS . '` 
    	WHERE `user_id` = ' . $user_id . ' 
    	AND `relation_user_id` = ' . $relation_user_id . ' 
    	AND `type` = ' . $type);
}

function count_rela($data_user_id, $type)
{
	return vco_fetchColumn('SELECT COUNT(`user_id`) FROM `' . VCO_RELATIONSHIPS . '` 
    	WHERE `user_id` = ' . $data_user_id . ' 
    	AND `type` = ' . $type);
}

function count_one_rela($user_id, $type)
{
	return vco_fetchColumn('SELECT COUNT(*) FROM `' . VCO_RELATIONSHIPS . '` 
    	WHERE `user_id` = ' . $user_id . ' 
    	AND `type` = ' . $type);
}

function insert_rela($data_user_id, $relation_user_id, $type)
{
	return vco_execute('INSERT INTO `' . VCO_RELATIONSHIPS . '` 
		(user_id, relation_user_id, type) VALUES (' . $data_user_id . ', ' . $relation_user_id . ', ' . $type . ')');
}

function del_rela($data_user_id, $relation_user_id, $type)
{
	return vco_execute('DELETE FROM `' . VCO_RELATIONSHIPS . '` 
		WHERE `user_id` = ' . $data_user_id . ' 
		AND `relation_user_id` = ' . $relation_user_id . ' 
		AND `type` = ' . $type . ' LIMIT 1');
}
