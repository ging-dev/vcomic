<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

$routes = [
	'/' => 'home/home.php',
	'/login' => 'users/login.php',
	'/register' => 'users/register.php',
	'/logout' => 'users/logout.php',
	'/search' => 'search.php',
	'/chat' => 'chat/chat.php',
	'/chat/clear' => 'chat/chat.php?act=clear',
	'/chat/del/(.*)' => 'chat/chat.php?act=del&id=$1',
	'/chat/page/(.*)' => 'chat/chat.php?page=$1',

	'/category/(.*)/page/(.*)' => 'category/category.php?slug=$1&page=$2',
	'/category/(.*)' => 'category/category.php?slug=$1',

	'/tag/(.*)/page/(.*)' => 'tag/tag.php?slug=$1&page=$2',
	'/tag/(.*)' => 'tag/tag.php?slug=$1',

	'/story/read' => 'story/read.php',
	'/story/read/page/(.*)' => 'story/read.php?page=$1',
	'/story/(.*)/like' => 'story/story.php?slug=$1&act=like',
	'/story/(.*)/unlike' => 'story/story.php?slug=$1&act=unlike',
	'/story/(.*)/nomination' => 'story/story.php?slug=$1&act=nomination',
	'/story/(.*)/donate/(.*)' => 'story/story.php?slug=$1&act=donate&coin=$2',
	'/story/(.*)/(.*)' => 'chapter/chapter.php?slug=$2',
	'/story/(.*)' => 'story/story.php?slug=$1',

	'/works/story/new' => 'work/createStory.php',
	'/works/(.*)/new' => 'work/createChapter.php?slug=$1',

	'/profile' => 'users/profile.php',
	'/profile/page/(.*)' => 'users/profile.php?page=$1',
	'/profile/avatar' => 'users/avatar.php',
	'/profile/cover' => 'users/cover.php',
	'/profile/settings' => 'users/settings.php',
	'/profile/password' => 'users/change_password.php',
	'/users/recover' => 'users/recover.php',
	'/users/recover/set/(.*)/(.*)' => 'users/recover.php?act=set&username=$1&recover_code=$2',
	'/(.*)/page/(.*)' => 'users/index.php?username=$1&page=$2',
	'/(.*)/follow' => 'users/index.php?username=$1&act=follow',
	'/(.*)/unfollow' => 'users/index.php?username=$1&act=unfollow',
	'/(.*)' => 'users/index.php?username=$1',
];