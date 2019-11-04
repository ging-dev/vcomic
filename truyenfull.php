<?php

require_once('system/bootstrap.php');

require_model('chapter');
require_model('story');

// >_ gingdev
$slug_stories = 'linh-vu-thien-ha';

$data_story = get_stories('slug', $slug_stories);
$data_chapters = get_all_chapters($data_story['id']);

$url = 'https://truyenfull.vn/linh-vu-thien-ha/'; // Link truyện
$start = '1';
$end = '40';

for ($i = $start; $i <= $end; $i++) {
    $data = curl($url . 'chuong-' . $i . '/');
    preg_match('#<span class="chapter-text"><span>(.*?)<\/a><\/h2>#si', $data, $title);
    preg_match('#<div id="chapter-c" class="chapter-c">(.*?)<\/div>#si', $data, $content);

    if (array_search(str_slug(strip_tags($title[1])), array_column($data_chapters, 'slug')) === false) {
        insert_chapter(
            strip_tags($title[1]),
            str_slug(strip_tags($title[1])),
            _e(str_replace('<br>', "\n", $content[1])),
            1,
            $data_story['id'],
            time()
        );
        
        echo '<div style="background: #000; color: #42f5ef; margin: 4px 0; padding: 7px 15px">Đã leech ' . strip_tags($title[1]) . '</div>';
    } else {
        echo '<div style="background: #000; color: red; margin: 4px 0; padding: 7px 15px">Đã leech rồi</div>';
    }
}
