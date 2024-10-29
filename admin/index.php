<?php
session_start();
// Require các file trong common
require_once "../common/model.php";
require_once "../common/env.php";
require_once "../common/helper.php";
require_once "../common/connect-db.php";

// require các file trong model và controller

require_file(PATH_CONTROLLER_ADMIN);
require_file(PATH_MODEL_ADMIN);



// Điều hướng
$act = $_GET['act'] ?? '/';

authen_check($act);
match ($act) {
    '/'                   => dashboard(),
    // User
    'users'               => userListAll(),
    'user-detail'         => userShowOne($_GET['id']),
    'user-create'         => userCreate(),
    'user-update'         => userUpdate($_GET['id']),
    'user-delete'         => userDelete($_GET['id']),
    // Category product/post
    'categories'          => CategoryListAll(),
    'category-detail'     => categoryShowOne($_GET['id']),
    'category-create'     => categoryCreate(),
    'category-update'     => categoryUpdate($_GET['id']),
    'category-delete'     => categoryDelete($_GET['id']),
    'category-post'          => CategoryPostListAll(),
    'category-post-detail'     => categoryPostShowOne($_GET['id']),
    'category-post-create'     => categoryPostCreate(),
    'category-post-update'     => categoryPostUpdate($_GET['id']),
    'category-post-delete'     => categoryPostDelete($_GET['id']),
    // products
    'products'            => productListAll(),
    'product-detail'      => productShowOne($_GET['id']),
    'product-create'      => productCreate(),
    'product-update'      => productUpdate($_GET['id']),
    'product-delete'      => productDelete($_GET['id']),
    // posts
    'posts'               => postListAll(),
    'post-detail'         => postShowOne($_GET['id']),
    'post-create'         => postCreate(),
    'post-update'         => postUpdate($_GET['id']),
    'post-delete'         => postDelete($_GET['id']),
    // authors
    'authors'               => authorListAll(),
    'author-detail'         => authorShowOne($_GET['id']),
    'author-create'         => authorCreate(),
    'author-update'         => authorUpdate($_GET['id']),
    'author-delete'         => authorDelete($_GET['id']),
    // gallery
    'gallery'             => galleryListAll(),
    'gallery-detail'      => galleryShowOne($_GET['id']),
    'gallery-create'      => galleryCreate(),
    'gallery-update'      => galleryUpdate($_GET['id']),
    'gallery-delete'      => galleryDelete($_GET['id']),
    //setting
    'setting-form'        => settingShowForm(),
    'setting-save'        => settingSave(),
    //authen
    'login'               => showFormLogin(),
    'logout'              => logout(),
    // comment
    'comment'             => CommentListAll(),
    'commentForProduct'   => displayCommentsForProduct($_GET['id']),
    'comment-delete'      => CommentDelete($_GET['id']),


    default               => e404(),
};
// disconnect-db
require_once "../common/disconnect-db.php";
