<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

require_once('system/bootstrap.php');
require_model('chapter');
require_model('relationship');
require_model('story');

$title = 'Sửa Chapter';

if (!$user_id || $user['role'] != 4) {
    abort(404);
}

$data_story = get_story_id($id);

if (!$data_story) {
	abort(404);
}

if ($data_story['user_id'] != $user_id) {
    abort('404');
}

switch ($act):
    case 'draft':
        update_chapt_one_col('is_published', 0, $slug);
        redirect('/work/' . $data_story['id']);
        break;

    case 'publish':
        update_chapt_one_col('is_published', 1, $slug);
        redirect('/work/' . $data_story['id']);
        break;

    case 'del':
        if ($data_chapter['is_published'] == 1) {
            redirect('/work/' . $data_story['id']);
        } else {
            del_chapter($slug);
            redirect('/work/' . $data_story['id']);
        }
        break;
endswitch;
