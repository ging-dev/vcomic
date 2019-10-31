<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

require_once('system/bootstrap.php');
require_model('notification');
require_model('relationship');
require_model('story');

$title = 'Sửa Truyện';

if (!$user_id || $user['role'] != 4) {
    abort(404);
}

$data = get_story_id($id);
$data_user_follow = get_user_rela($user_id, 1);

if (!$data) {
	abort(404);
}

if ($data['user_id'] != $user_id) {
	abort(404);
}

switch ($act):
    case 'draft':
        update_story_one_col('is_published', 0, $id);
        redirect('/works');
        break;

    case 'publish':
        update_story_one_col('is_published', 1, $id);

		foreach ($data_user_follow as $data_user) {
    		insert_notif(
    			'<a href=\"/story/' . $slug_story . '\">' . $user['fullname'] . ' vừa đăng truyện mới.</a>', 
    			$data_user['relation_user_id'], 
    			time()
    		);
    	}
		
        redirect('/works');
        break;

    case 'complete':
        update_story_one_col('is_completed', 1, $id);

        redirect('/works');
        break;

    case 'writing':
        update_story_one_col('is_completed', 0, $id);
        redirect('/works');
        break;

    case 'delete':
        if ($data['is_published'] == 1) {
            redirect('/works');
        } else {
			del_story($id);
            redirect('/works');
        }
        break;

    case 'info':
    	break;

endswitch;
