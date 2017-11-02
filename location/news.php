<?php
if (!defined('MCR')) exit;
 
loadTool('catalog.class.php');
$category = Filter::input('cid', 'get', 'int');
 
if ($category) $news_manager = new NewsManager($category, 'news/', 'index.php?cid='.$category.'&');
else $news_manager = new NewsManager(-1, 'news/');

/* Default vars */

$page    = lng('PAGE_NEWS');

/* Get \ Post options */

$curlist = Filter::input('l', 'get', 'int');
if ($curlist <= 0) $curlist = 1;  

$menu->SetItemActive('main');

$content_main .= $news_manager->ShowNewsListing($curlist);
$content_main .=  $news_manager->ShowCategorySelect();

$news_manager->destroy();
unset($news_manager); 
