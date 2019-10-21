<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

function count_comment($chapter_id)
{
	return vco_fetchColumn('SELECT COUNT(*) FROM `' . VCO_COMMENTS . '` WHERE `chapter_id` = ' . $chapter_id);
}

function get_list_comment($chapter_id, $total)
{
	return vco_fetchAll('SELECT * FROM `' . VCO_COMMENTS . '` WHERE `chapter_id` = ' . $chapter_id . ' ORDER BY `id` DESC' . get_page($total));
}

function insert_comment($content, $user_id, $chapter_id, $created_at)
{
	return vco_execute('INSERT INTO `' . VCO_COMMENTS . '` 
		(content, user_id, chapter_id, created_at) VALUES ("' . $content . '", ' . $user_id . ', ' . $chapter_id . ', ' . $created_at . ')');
}
