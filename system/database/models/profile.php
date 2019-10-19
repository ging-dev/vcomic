<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

function get_profile($user_id)
{
    return vco_fetch('SELECT `' . VCO_PROFILE_USERS . '`.* FROM ' . VCO_PROFILE_USERS . ' 
        INNER JOIN ' . VCO_USERS . ' 
        ON `' . VCO_USERS . '`.`id` = ' . VCO_PROFILE_USERS . '.`user_id`
        WHERE ' . VCO_PROFILE_USERS . '.`user_id` = ' . $user_id);
}

function update_profile($facebook, $about, $user_id)
{
	return vco_execute('UPDATE `' . VCO_PROFILE_USERS . '` 
		SET `facebook` = "' . $facebook . '", `about` = "' . $about . '" 
		WHERE `user_id` = ' . $user_id . ' LIMIT 1');
}

function insert_profile($facebook, $about, $user_id)
{
	return vco_execute('INSERT INTO `' . VCO_PROFILE_USERS . '`
		(user_id, about, facebook) VALUES (' . $user_id . ', "' . $about . '", "' . $facebook . '")
		WHERE `user_id` = ' . $user_id . ' LIMIT 1');
}
