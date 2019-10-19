<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

function check_info($col, $val)
{
    return vco_fetch('SELECT * FROM `' . VCO_USERS . '` WHERE `' . $col . '` = "' . $val . '" LIMIT 1');
}

function get_avatar($user_id) {
    $data = vco_fetch('SELECT `avatar` FROM `' . VCO_USERS . '` WHERE `id` = ' . $user_id . ' LIMIT 1');

    if ($data['avatar'] == null) {
        return '/uploads/avatar/default.jpg';
    } else {
        return '/uploads/avatar/' . $data['avatar'];
    }
}

function get_cover($user_id) {
    $data = vco_fetch('SELECT `cover` FROM `' . VCO_USERS . '` WHERE `id` = ' . $user_id . ' LIMIT 1');

    if ($data['cover'] == null) {
        return '/uploads/cover/default.jpg';
    } else {
        return '/uploads/cover/' . $data['cover'];
    }
}

function get_info($username)
{
	return vco_fetch('SELECT * FROM `' . VCO_USERS . '` WHERE `username` = "' . $username . '" LIMIT 1');
}


function insert_user($username, $email, $password, $fullname, $avatar, $created_at)
{
    return vco_execute('INSERT INTO `' . VCO_USERS . '` 
        (username, email, password, fullname, avatar, created_at) VALUES 
        ("' . $username . '", "' . $email . '", "' . $password . '", "' . $fullname . '", "' . $avatar . '", "' . $created_at . '")');
}

function update_recover_code($recover_code, $recover_time, $user_id)
{
    return vco_execute('UPDATE `' . VCO_USERS . '` SET `recover_code` = "' . $recover_code . '", `recover_time` = ' . $recover_time . ' WHERE `id` = ' . $user_id . ' LIMIT 1');
}

function update_password($password, $user_id)
{
    return vco_execute('UPDATE `' . VCO_USERS . '` SET `recover_code` = "", `password` = "' . $password . '" WHERE `id` = ' . $user_id . ' LIMIT 1');
}

function update_fullname($fullname, $user_id)
{
    return vco_execute('UPDATE `' . VCO_USERS . '` SET `fullname` = "' . $fullname . '" WHERE `id` = ' . $user_id . ' LIMIT 1');
}

function update_avatar($avatar, $user_id) {
    return vco_execute('UPDATE `' . VCO_USERS . '` SET `avatar` = "' . $avatar . '" WHERE `id` = ' . $user_id . ' LIMIT 1');
}

function update_cover($cover, $user_id) {
    return vco_execute('UPDATE `' . VCO_USERS . '` SET `cover` = "' . $cover . '" WHERE `id` = ' . $user_id . ' LIMIT 1');
}

function login_at($time, $user_id)
{
    return vco_execute('UPDATE `' . VCO_USERS . '` SET `login_at` = ' . $time . ' WHERE `id` = ' . $user_id . ' LIMIT 1');
}
