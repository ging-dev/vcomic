<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

function list_banner()
{
	return vco_fetchAll('SELECT * FROM `' . VCO_STORIES . '` ORDER BY `id` DESC LIMIT 5');
}

function list_nomination()
{
	return vco_fetchAll('SELECT `' . VCO_STORIES . '`.*, COUNT(`' . VCO_NOMINATIONS . '`.story_id) AS total FROM `' . VCO_STORIES . '`
		INNER JOIN `' . VCO_NOMINATIONS . '`
		ON `' . VCO_STORIES . '`.id = `' . VCO_NOMINATIONS . '`.story_id
		GROUP BY `' . VCO_NOMINATIONS . '`.story_id
		ORDER BY total DESC');
}
