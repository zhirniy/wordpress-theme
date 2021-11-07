<?php
require get_template_directory() . '/classes/zh-class.php';

$theme = new ZhTheme;
//Including style.css and script.js to theme
$theme->addStyle('theme-styles',  get_stylesheet_uri())
      ->addScript('theme-script', get_template_directory_uri() . '/js/script.js','','',true);

$theme->addSupport('html5', array('search-form', 'script', 'style'))
      ->addSupport('title-tag') ;

$theme->addNavMenus([
    'header-menu' => 'Header menu',
    'footer-menu' => 'Footer menu',
]);

