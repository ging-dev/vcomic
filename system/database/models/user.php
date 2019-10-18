<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

function check_info($col, $val)
{
    $data = vco_fetch('SELECT * FROM `' . VCO_USERS . '` WHERE `' . $col . '` = "' . $val . '" LIMIT 1');

    return $data;
}

function get_avatar($user_id) {
    $data = vco_fetch('SELECT `avatar` FROM `' . VCO_USERS . '` WHERE `id` = ' . $user_id . ' LIMIT 1');

    if ($data['avatar'] == null) {
        return '/uploads/avatar/default.jpg';
    } else {
        return '/uploads/avatar/' . $user_id . '.jpg';
    }
}

function get_cover($user_id) {
    $data = vco_fetch('SELECT `cover` FROM `' . VCO_USERS . '` WHERE `id` = ' . $user_id . ' LIMIT 1');

    if ($data['cover'] == null) {
        return '/uploads/cover/default.jpg';
    } else {
        return '/uploads/cover/' . $user_id . '.jpg';
    }
}

function get_info($username)
{
	$data = vco_fetch('SELECT * FROM `' . VCO_USERS . '` WHERE `username` = "' . $username . '" LIMIT 1');

	return $data;
}

function insert_user($username, $email, $password, $fullname, $avatar, $created_at)
{
    $data = vco_execute('INSERT INTO `' . VCO_USERS . '` 
        (username, email, password, fullname, avatar, created_at) VALUES 
        ("' . $username . '", "' . $email . '", "' . $password . '", "' . $fullname . '", "' . $avatar . '", "' . $created_at . '")');

    return $data;
}

function update_recover_code($recover_code, $recover_time, $user_id)
{
    $data = vco_execute('UPDATE `' . VCO_USERS . '` SET `recover_code` = "' . $recover_code . '", `recover_time` = ' . $recover_time . ' WHERE `id` = ' . $user_id . ' LIMIT 1');

    return $data;
}

function update_password($password, $user_id)
{
    $data = vco_execute('UPDATE `' . VCO_USERS . '` SET `recover_code` = "", `password` = "' . $password . '" WHERE `id` = ' . $user_id . ' LIMIT 1');

    return $data;
}

function login_at($time, $user_id)
{
    $data = vco_execute('UPDATE `' . VCO_USERS . '` SET `login_at` = ' . $time . ' WHERE `id` = ' . $user_id . ' LIMIT 1');

    return $data;
}
