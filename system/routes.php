<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

$routes = [
	'/' => 'home/home.php',
	'/admin' => 'admin/dashboard.php',
	'/admin/categories' => 'admin/categories/list.php',
	'/admin/category/new' => 'admin/categories/add.php',
	'/admin/category/edit/(.*)' => 'admin/categories/edit.php?id=$1',
	'/admin/category/del/(.*)' => 'admin/categories/list.php?act=del&id=$1',
	'/admin/categories/page/(.*)' => 'admin/categories/list.php?page=$1',
	'/admin/users' => 'admin/users/list.php',
	'/admin/user/new' => 'admin/users/add.php',
	'/admin/user/edit/(.*)' => 'admin/users/edit.php?id=$1',
	'/admin/user/del/(.*)' => 'admin/users/list.php?act=del&id=$1',
	'/admin/user/ban/(.*)' => 'admin/users/list.php?act=ban&id=$1',
	'/admin/user/remove-ban/(.*)' => 'admin/users/list.php?act=remove_ban&id=$1',
	'/admin/users/page/(.*)' => 'admin/users/list.php?page=$1',
	'/admin/stories' => 'admin/stories/list.php',
	'/admin/story/new' => 'admin/stories/add.php',
	'/admin/story/edit/(.*)' => 'admin/stories/edit.php?id=$1',
	'/admin/story/del/(.*)' => 'admin/stories/list.php?act=del&id=$1',
	'/admin/stories/page/(.*)' => 'admin/stories/list.php?page=$1',
	
	'/login' => 'users/login.php',
	'/register' => 'users/register.php',
	'/logout' => 'users/logout.php',
	'/search' => 'search.php',
	'/chat' => 'chat/chat.php',
	'/chat/clear' => 'chat/chat.php?act=clear',
	'/chat/del/(.*)' => 'chat/chat.php?act=del&id=$1',
	'/chat/page/(.*)' => 'chat/chat.php?page=$1',

	'/modules/auth' => 'auth.php',
	'/modules/ajax/new_msg' => 'ajax.php?act=message',
	'/modules/ajax/new_notif' => 'ajax.php?act=notification',

	'/messages' => 'message/list.php',
	'/messages/page/(.*)' => 'message/list.php?page=$1',
	'/message/(.*)/page/(.*)' => 'message/write.php?username=$1&page=$2',
	'/message/(.*)' => 'message/write.php?username=$1',

	'/category/(.*)/page/(.*)' => 'category/category.php?slug=$1&page=$2',
	'/category/(.*)' => 'category/category.php?slug=$1',
	'/categories/page/(.*)' => 'category/list.php?page=$1',
	'/categories' => 'category/list.php',

	'/tag/(.*)/page/(.*)' => 'tag/tag.php?slug=$1&page=$2',
	'/tag/(.*)' => 'tag/tag.php?slug=$1',

	'/notifications' => 'notification/notification.php',
	'/notifications/check' => 'notification/notification.php?act=check',
	'/notifications/page/(.*)' => 'notification/notification.php?page=$1',

	'/story/read' => 'story/read.php',
	'/story/(.*)/(.*)/notif/(.*)' => 'chapter/chapter.php?act=check_notif&slug=$2&id=$3',
	'/story/read/page/(.*)' => 'story/read.php?page=$1',
	'/story/(.*)/like' => 'story/story.php?slug=$1&act=like',
	'/story/(.*)/nomination' => 'story/story.php?slug=$1&act=nomination',
	'/story/(.*)/donate/(.*)' => 'story/story.php?slug=$1&act=donate&coin=$2',
	'/story/(.*)/notif/(.*)' => 'story/story.php?slug=$1&act=check_notif&id=$2',
	'/story/(.*)/(.*)' => 'chapter/chapter.php?slug=$2',
	'/story/(.*)' => 'story/story.php?slug=$1',

	'/works/story/new' => 'work/createStory.php',
	'/work/page/(.*)' => 'work/postedStory.php?page=$1',
	'/work/(.*)/new' => 'work/createChapter.php?slug=$1',
	'/work/(.*)/publish' => 'work/editStory.php?act=publish&id=$1',
	'/work/(.*)/draft' => 'work/editStory.php?act=draft&id=$1',
	'/work/(.*)/writing' => 'work/editStory.php?act=writing&id=$1',
	'/work/(.*)/complete' => 'work/editStory.php?act=complete&id=$1',
	'/work/(.*)/del' => 'work/editStory.php?act=delete&id=$1',
	'/work/(.*)/page/(.*)' => 'work/postedChapter.php?id=$1&page=$2',
	'/work/(.*)' => 'work/postedChapter.php?id=$1',
	'/works' => 'work/postedStory.php',

	'/chapter/(.*)/(.*)/draft' => 'work/editChapter.php?act=draft&id=$1&slug=$2',
	'/chapter/(.*)/(.*)/publish' => 'work/editChapter.php?act=publish&id=$1&slug=$2',
	'/chapter/(.*)/(.*)/del' => 'work/editChapter.php?act=del&id=$1&slug=$2',

	'/profile' => 'users/profile.php',
	'/profile/page/(.*)' => 'users/profile.php?page=$1',
	'/profile/avatar' => 'users/avatar.php',
	'/profile/cover' => 'users/cover.php',
	'/profile/settings' => 'users/settings.php',
	'/profile/password' => 'users/change_password.php',
	'/users/recover' => 'users/recover.php',
	'/users/recover/set/(.*)/(.*)' => 'users/recover.php?act=set&username=$1&recover_code=$2',
	'/(.*)/page/(.*)' => 'users/index.php?username=$1&page=$2',
	'/(.*)/notif/(.*)' => 'users/index.php?username=$1&act=check_notif&id=$2',
	'/(.*)/follow' => 'users/index.php?username=$1&act=follow',
	'/(.*)/unfollow' => 'users/index.php?username=$1&act=unfollow',
	'/(.*)' => 'users/index.php?username=$1',
];