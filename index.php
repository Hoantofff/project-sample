<?php
session_start();
// Require các file trong common
require_once "./common/model.php";
require_once "./common/helper.php";
require_once "./common/env.php";
require_once "./common/connect-db.php";

// require các file trong model và controller

require_file(PATH_CONTROLLER);
require_file(PATH_MODEL);



// Điều hướng
$act = $_GET['act'] ?? '/';

    
match ($act) {
    '/' => homeIndex(),
    // Authen
    'login'                 => showFormLogin(),
    'logout'                => logout(),
    //Product
    'products'              => blogProductListAll(),
    'product-detail'        => blogProductDetail($_GET['id']),
    'category-product'      => blogByCategoriesProduct($_GET['id']),
    //Post
    'blog-posts'            => blogPosts(),
    'post-detail'           => blogPostDetail($_GET['id']),
    'category-post'      => blogByCategoriesPost($_GET['id']),

    default                 => e404(),

};
// disconnect-db
require_once "./common/disconnect-db.php";
