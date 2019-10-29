<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

function count_users($ope, $role)
{
    return vco_fetchColumn('SELECT COUNT(*) FROM `' . VCO_USERS . '` WHERE `role` ' . $ope . ' ' . $role);
}

function get_info($col, $val)
{
    return vco_fetch('SELECT * FROM `' . VCO_USERS . '` WHERE `' . $col . '` = "' . $val . '" LIMIT 1');
}

function get_avatar($user_id)
{
    $data = vco_fetch('SELECT `avatar` FROM `' . VCO_USERS . '` WHERE `id` = ' . $user_id . ' LIMIT 1');

    if ($data['avatar'] == null) {
        return '/uploads/avatar/default.jpg';
    } else {
        return '/uploads/avatar/' . $data['avatar'];
    }
}

function get_cover($user_id)
{
    $data = vco_fetch('SELECT `cover` FROM `' . VCO_USERS . '` WHERE `id` = ' . $user_id . ' LIMIT 1');

    if ($data['cover'] == null) {
        return '/uploads/cover/default.jpg';
    } else {
        return '/uploads/cover/' . $data['cover'];
    }
}

function get_list_users($ope, $role, $total)
{
    return vco_fetchAll('SELECT * FROM `' . VCO_USERS . '` WHERE `role` ' . $ope . ' ' . $role . ' ORDER BY `id` DESC' . get_page($total));
}

function get_info_id($user_id)
{
    return vco_fetch('SELECT * FROM `' . VCO_USERS . '` WHERE `id` = "' . $user_id . '" LIMIT 1');
}


function insert_user($username, $email, $password, $role, $fullname, $avatar, $created_at)
{
    return vco_execute('INSERT INTO `' . VCO_USERS . '` 
        (username, email, password, role, fullname, avatar, created_at) VALUES 
        ("' . $username . '", "' . $email . '", "' . $password . '", ' . $role . ', "' . $fullname . '", "' . $avatar . '", "' . $created_at . '")');
}

function update_user($email, $role, $fullname, $id)
{
    return vco_execute('UPDATE `' . VCO_USERS . '` SET 
        `email` = "' . $email . '", 
        `role` = "' . $role . '", 
        `fullname` = "' . $fullname . '" 
        WHERE `id` = ' . $id . ' LIMIT 1');
}

function update_recover_code($recover_code, $recover_time, $user_id)
{
    return vco_execute('UPDATE `' . VCO_USERS . '` SET `recover_code` = "' . $recover_code . '", `recover_time` = ' . $recover_time . ' WHERE `id` = ' . $user_id . ' LIMIT 1');
}

function update_password($password, $user_id)
{
    return vco_execute('UPDATE `' . VCO_USERS . '` SET `recover_code` = "", `password` = "' . $password . '" WHERE `id` = ' . $user_id . ' LIMIT 1');
}

function update_one_col($col, $val, $id)
{
    return vco_execute('UPDATE `' . VCO_USERS . '` SET `' . $col . '` = "' . $val . '" WHERE `id` = ' . $id . ' LIMIT 1');
}

function transfer_coin($coin, $user_id, $receiver_id)
{
    vco_execute('UPDATE `' . VCO_USERS . '` SET `coin` = `coin` - ' . $coin . ' WHERE `id` = ' . $user_id . ' LIMIT 1');
    vco_execute('UPDATE `' . VCO_USERS . '` SET `coin` = `coin` + ' . ($coin - ($coin * 0.05)) . ' WHERE `id` = ' . $receiver_id . ' LIMIT 1');
}

function del_user($id)
{
    return vco_execute('DELETE FROM `' . VCO_USERS . '` WHERE `id` = "' . $id . '" LIMIT 1');
}
