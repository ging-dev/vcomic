<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

require_once('system/bootstrap.php');
require_model('category');
require_model('chapter');
require_model('like');
require_model('nomination');
require_model('story');
require_model('story_read');
require_model('tag');

$data = get_stories($slug);

if (!$data) {
	abort(404);
}

update_view($data['id']);

if ($user_id) {
	if (!check_story_read($user_id, $data['id'])) {
		insert_story_read($user_id, $data['id']);
	}

	switch ($act) {
		case 'like':
			if (!get_story_like($user_id, $data['id'])) {
				insert_story_like($user_id, $data['id']);
				redirect('/story/' . $slug);
			} else {
				redirect('/story/' . $slug);
			}
			break;
		
		case 'unlike':
			del_story_like($user_id, $data['id']);

			redirect('/story/' . $slug);
			break;

		case 'nomination':
			if ($user['vip'] == 0) {
				abort(404);
			}
			
			if (!get_nomination($data['id'], $user_id)) {
				insert_nomination($data['id'], $user_id);
				redirect('/story/' . $slug);
			} else {
				redirect('/story/' . $slug);
			}
			break;
	}
}

$title = $data['title'];

$count_nomination = count_nomination($data['id']);
$data_cate = get_category_id($data['category_id']);
$data_chapter = get_chapter($data['id']);
$data_same_stories = get_same_stories($data['category_id'], $data['id']);

require_once('themes/' . THEME . '/layout/head.php');
require_once('themes/' . THEME . '/templates/story/story.php');
require_once('themes/' . THEME . '/layout/end.php');
