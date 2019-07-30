<?php

function slugify($text) {
  $text = preg_replace('~[^\pL\d]+~u', '-', $text);
  $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
  $text = preg_replace('~[^-\w]+~', '', $text);
  $text = trim($text, '-');
  $text = preg_replace('~-+~', '-', $text);
  $text = strtolower($text);

  return $text; 
}

if($_SERVER['REQUEST_URI'] === '/') {
    if(strpos($_SERVER['HTTP_ACCEPT_LANGUAGE'], 'DK') !== false) {
        header('Location: /da/hjem/');
    } else {
        header('Location: /en/home/');
    }

} else {
    require_once(__DIR__ . '/lib/hashbrown-driver/index.php');

    HashBrown\init(__DIR__);

    HashBrown\render_current_page();
}

?>
