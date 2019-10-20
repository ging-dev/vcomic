<?php

/**
 * @package     vComic
 * @author      Nguyễn Thành Nhân <tnit2510>
 * @link        https://facebook.com/100009162578251
 * @version     0.0.1
 */

function _e($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

function show_alert($msg, $type)
{
    exit('<script>$.notify("' . $msg . '", "' . $type . '");</script>');
}

function redirect($url)
{
    header('location: ' . $url);
    exit();
}

function require_model($model)
{
    require_once(ROOT . '/system/database/models/' . $model . '.php');
}

function cut_string($string = '', $size = 100, $link = ' [...]')
{
    $string = strip_tags(trim($string));
    $strlen = strlen($string);
    $str    = substr($string, $size, 20);
    $exp    = explode(" ", $str);
    $sum    = count($exp);
    $yes    = "";
    for($i=0; $i<$sum; $i++)
    {
        if($yes == ""){
            $a = strlen($exp[$i]);
            if($a == 0) { $yes = "no"; $a = 0; }
            if(($a >= 1) && ($a <= 12)) { $yes = "no"; $a; }
            if($a > 12) { $yes = "no"; $a=12; }
        }
    }
    $sub = substr($string, 0, $size+$a);
    if($strlen-$size > 0){ $sub .= $link; }
    return $sub;
}

function set_avatar($username)
{
    $im = imagecreatetruecolor(65, 65);
    $color1 = rand(0,900);
    $color2 = rand(0,900);
    $color3 = rand(0,900);
    $background = imagecolorallocate($im, $color1,$color2,$color3);
    $white = imagecolorallocate($im, 255, 255, 255);
    imagefilledrectangle($im, 0, 0, 65, 65, $background);
    $text = substr($username, 0, 1);
    $text = ucfirst($text);
    $font = ROOT . '/assets/fonts/varela.ttf';
    $save_name = ROOT . '/uploads/avatar/' . $username . '.jpg';
    imagettftext($im, 45, 0, 16, 56, $white, $font, $text);
    imagepng($im, $save_name);
    imagedestroy($im);
}

function str_slug($str){
    $str = mb_strtolower($str);
	$str = html_entity_decode(trim($str), ENT_QUOTES, 'UTF-8');
	$str = str_replace(" - ", " ",$str);
    $str = html_entity_decode(trim($str), ENT_QUOTES, 'UTF-8');
	$str = str_replace(" ","-", $str);$str = str_replace("--","-", $str);
	$str = str_replace("@","-",$str);$str = str_replace("/","-",$str);
	$str = str_replace("\\","-",$str);$str = str_replace(":","",$str);
	$str = str_replace("\"","",$str);$str = str_replace("'","",$str);
	$str = str_replace("<","",$str);$str = str_replace(">","",$str);
	$str = str_replace(",","",$str);$str = str_replace("?","",$str);
	$str = str_replace(";","",$str);$str = str_replace(".","",$str);
	$str = str_replace("[","",$str);$str = str_replace("]","",$str);
	$str = str_replace("(","",$str);$str = str_replace(")","",$str);
	$str = str_replace("´","", $str);
	$str = str_replace("`","", $str);
	$str = str_replace("~","", $str);
	$str = str_replace("?","", $str);
	$str = str_replace("?","", $str);
	$str = str_replace("*","",$str);$str = str_replace("!","",$str);
	$str = str_replace("$","-",$str);$str = str_replace("&","-and-",$str);
	$str = str_replace("%","",$str);$str = str_replace("#","",$str);
	$str = str_replace("^","",$str);$str = str_replace("=","",$str);
	$str = str_replace("+","",$str);$str = str_replace("~","",$str);
	$str = str_replace("`","",$str);$str = str_replace("--","-",$str);
	$str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
	$str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
	$str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
	$str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
	$str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
	$str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
	$str = preg_replace("/(đ)/", 'd', $str);
	$str = str_replace(" ", "-", str_replace("&*#39;","",$str));
	$str = str_replace(",", "", str_replace("&*#39;","",$str));
	return $str;
}

$per_page = 20;

function get_page($total, $return = 0)
{
    global $per_page;
    $page = isset($_GET['page']) ? abs(intval($_GET['page'])) : 1;
    if ($page < 1) {
        $page = 1;
    }
    $max_page = ceil($total / $per_page);
    if ($page > $max_page) {
        $page = $max_page;
    }
    if ($return) {
        return $page;
    }
    return ' LIMIT ' . $per_page . ' OFFSET ' . (($page - 1) * $per_page);
}

function pagination($link, $total)
{
    global $per_page;
    if ($total <= $per_page) {
        return false;
    }
    $max_page = ceil($total / $per_page);
    $current_page = get_page($total, 1);
    $return = '';
    if ($current_page > 1) {
        $return .= '<li class="previous"><a href="' . $link . '/page/' . ($current_page - 1) . '">Trang trước</a></li>';
    } else {
        $return .= '<li class="previous disabled"><a href="#">Trang trước</a></li>';
    }

    if ($current_page < $max_page) {
        $return .= '<li class="next"><a href="' . $link . '/page/' . ($current_page + 1) . '">Trang sau</a></li>';
    } else {
        $return .= '<li class="next disabled"><a href="#">Trang sau</a></li>';
    }

    return '<nav><ul class="pager">' . $return . '</ul></nav>';
}

function abort($code)
{
    require_once(ROOT . '/themes/errors/' . $code . '.html');
    exit();
}

ob_start();
