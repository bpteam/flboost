<?php
/**
 * Created by PhpStorm.
 * User: EC
 * Date: 19.11.13
 * Time: 22:01
 * Project: free-notify
 * @author: Evgeny Pynykh bpteam22@gmail.com
 */
ini_set('display_errors',1);
require_once dirname(__FILE__).'/../lib3_stable/get_content/include.php';
require_once dirname(__FILE__).'/cfg.php';
$url = 'https://www.fl.ru/rss/all.xml?subcategory=37&category=5';
$gc = new GetContent\cGetContent();
$gc->setEncodingName('utf8');
$content = $gc->getContent($url);
$feed = array();
if(preg_match('%\(Все проекты:\s(?<category>((?!\s-\s).)*)((?:\s-\s)(?<subcategory>[^<]+))?\)</title>%ims', $content, $match)){
	$feed['category'] = $match['category'];
	if(isset($match['subcategory'])){
		$feed['subcategory'] = $match['subcategory'];
	}
}
if(preg_match_all('%<item>\s*<title><\!\[CDATA\[(?<title>.*)\]\]></title>\s*<link>(?<link>.*)</link>\s*<description><\!\[CDATA\[(?<description>.*)\]\]></description>\s*<guid>(?<guid>.*)</guid>\s*<category>(?<category>.*)</category>\s*<pubDate>(?<pubdate>.*)</pubDate>\s*</item>%imsU',$content,$matches)){
	foreach($matches['title'] as $keyRow => $valRow){
		$row['title'] = $matches['title'][$keyRow];
		$row['link'] = $matches['link'][$keyRow];
		$row['id'] = preg_replace('%^.*/(\d+)/.*$%ims','$1',$row['link']);
		$row['description'] = $matches['description'][$keyRow];
		$row['guid'] = $matches['guid'][$keyRow];
		$category = $matches['category'][$keyRow];
		$category = explode( '<br/>', $category);
		$row['category'] = $category;
		$row['pubdate'] = strtotime($matches['pubdate'][$keyRow]);
		$feed['row'][] = $row;
	}
}
$reg = '#(парсер|собрать|парс|parser|pars|сбор|парсинг)#imsu';
foreach($feed['row'] as $project){
	if(preg_match($reg,$project['title']) || preg_match($reg,$project['description'])){
		echo 'SEND!';
		mail('zking.nothingz@gmail.com','ALERT NEW PJ ' . date('h:i:s d/m/Y'),$project['title'] . ' ' . $project['description']);
	}
}
echo 'done!';