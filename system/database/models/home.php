<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

function get_categories()
{
	return vco_fetchAll('SELECT `name`, `slug` FROM `' . VCO_CATEGORIES . '`');
}
