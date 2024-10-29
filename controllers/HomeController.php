<?php

function homeIndex(){
    $view = 'home';
    $setting = listAll('settings');
    $categories = listAll('categories');
    $productRand = productTop8Random();
    $productTop6Latest = productTop6Latest();
    $productTop6Trending = productTop6Trending();
    $postRand = postTop3Random();
    
    require_once PATH_VIEW . 'layout/master.php';
}
