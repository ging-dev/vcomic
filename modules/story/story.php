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
require_model('notification');
require_model('story');
require_model('story_read');
require_model('tag');

$data = get_stories('slug', $slug);

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
				insert_notif(
					'<a href=\"/story/' . $data['slug'] . '\">' . $user['fullname'] . ' vừa yêu thích truyện của bạn!</a>', 
					$data['user_id'], 
					time()
				);
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
			if ($user['role'] < 3) {
				abort(404);
			}

			if ($user_id == $data['user_id']) {
				abort(404);
			}
			
			if (!get_nomination($data['id'], $user_id)) {
				insert_nomination($data['id'], $user_id);
				insert_notif(
					'<a href=\"/' . $user['username'] . '\">' . $user['fullname'] . ' vừa đề cử truyện của bạn!</a>', 
					$data['user_id'], 
					time()
				);

				redirect('/story/' . $slug);
			} else {
				redirect('/story/' . $slug);
			}
			break;

		case 'donate':
			$error = false;

			if ($user_id == $data['user_id']) {
				abort(404);
			}

			if ($user['coin'] < $coin) {
				$error = 'Bạn không đủ tiền!';
			} else {
				$error = 'Bạn đã donate cho tác giả ' . $coin;
				transfer_coin($coin, $user_id, $data['user_id']);
				insert_notif(
					'<a href=\"/' . $user['username'] . '\">' . $user['fullname'] . ' vừa donate ' . $coin . ' xu bạn!</a>', 
					$data['user_id'], 
					time()
				);
			}
			break;
	}
}

$title = $data['title'];

$count_nomination = count_nomination($data['id']);
$data_cate = get_category('id', $data['category_id']);
$data_chapter = get_chapter($data['id']);
$data_same_stories = get_same_stories($data['category_id'], $data['id']);
$data_user = get_info_id($data['user_id']);
$list_tags = get_list_tag($data['id']);

require_once('themes/' . THEME . '/layout/head.php');
require_once('themes/' . THEME . '/templates/story/story.php');
require_once('themes/' . THEME . '/layout/end.php');
