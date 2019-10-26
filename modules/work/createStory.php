<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

require_once('system/bootstrap.php');
require_model('category');
require_model('story');
require_model('tag');

$title = 'Quản Lý Truyện';

if (!$user_id || $user['role'] != 4) {
    abort(404);
}

$error      = false;
$_title      = isset($_POST['title']) ? _e($_POST['title']) : '';
$author     = isset($_POST['author']) ? _e($_POST['author']) : '';
$slug_story = str_slug($_title);
$summary    = isset($_POST['summary']) ? _e($_POST['summary']) : '';
$tag        = isset($_POST['tag']) ? explode(",", _e(trim($_POST['tag']))) : '';
$category_id = isset($_POST['category']) ? _e($_POST['category']) : '';
$publish    = (isset($_POST['is_published']) == true) ? 1 : 0;

$data_list_cate = get_list_category();
$data_story = get_stories($slug_story);

if ($request_method == 'POST'):
	$tmp_name    = $_FILES['thumbnail']['tmp_name'];
    $thumbnail   = time() . '-' . $slug_story . '.jpg';
    $target_file = ROOT . '/uploads/thumbnail/' . time() . '-' . $slug_story . '.jpg';

    if ($data_story):
    	$error = 'Tên chuyện này đã tồn tại!';
	else:
		$story_id = insert_story($_title, $slug_story, $summary, $thumbnail, $author, $publish, $user_id, $category_id, time());

		move_uploaded_file($tmp_name, $target_file);
		$tag_id= 0;
		$count_tag = count($tag);
        for ($i = 0; $i < $count_tag; $i++) {
        	if (! get_tag(str_slug($tag[$i]))):
	    		$tag_id = insert_tag($tag[$i], str_slug($tag[$i]));
	        endif;

            insert_tag_story($story_id, get_tag(str_slug($tag[$i]))['id']);
        }
	endif;
endif;

require_once('themes/' . THEME . '/layout/head.php');
require_once('themes/' . THEME . '/templates/work/createStory.php');
require_once('themes/' . THEME . '/layout/end.php');
