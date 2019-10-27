<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

function count_categories()
{
	return vco_fetchColumn('SELECT COUNT(*) FROM `' . VCO_CATEGORIES . '`');
}

function get_list_categories($total)
{
	return vco_fetchAll('SELECT * FROM `' . VCO_CATEGORIES . '` ORDER BY `id` DESC' . get_page($total));
}

function get_category($slug)
{
	return vco_fetch('SELECT * FROM `' . VCO_CATEGORIES . '` WHERE `slug` = "' . $slug . '"');
}

function get_category_id($category_id)
{
	return vco_fetch('SELECT * FROM `' . VCO_CATEGORIES . '` WHERE `id` = ' . $category_id);
}

function update_category($name, $slug, $id)
{
	return vco_execute('UPDATE `' . VCO_CATEGORIES . '` SET `name` = "' . $name . '", `slug` = "' . $slug . '" WHERE `id` = ' . $id);
}

function insert_category($name, $slug, $created_at)
{
	return vco_execute('INSERT INTO `' . VCO_CATEGORIES . '` (name, slug, created_at) VALUES ("' . $name . '", "' . $slug . '", ' . $created_at . ')');
}

function del_category($id)
{
	return vco_execute('DELETE FROM `' . VCO_CATEGORIES . '` WHERE `id` = ' . $id . ' LIMIT 1');
}
