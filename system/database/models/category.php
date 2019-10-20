<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

function get_category($slug)
{
	return vco_fetch('SELECT * FROM `' . VCO_CATEGORIES . '` WHERE `slug` = "' . $slug . '"');
}

function get_category_id($data_id)
{
	return vco_fetch('SELECT * FROM `' . VCO_CATEGORIES . '` WHERE `id` = ' . $data_id);
}