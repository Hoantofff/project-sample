<?php

//Product
function blogProductListAll()
{
    $view = 'blog-list-all-product';

    $categories = listAll('categories');
    $productTop6Latest = productTop6Latest();
    $productTop6Trending = productTop6Trending();

    require_once PATH_VIEW . 'layout/master.php';
}

function blogProductDetail($id)
{
    $view = 'blog-product-detail';

    $categories = listAll('categories');
    $product = getProductById($id);
    $ProductRelated = ProductRelated($id);
    $user = showOneForUser('users');
    $showComment = showComment($id);
    if (!empty($_POST)) {
        $userId = $_SESSION['user_client']['u_id'];

        $data = [
            'user_id'       => $userId              ?? null,
            'product_id'    => $id                  ?? null,
            'content'       => $_POST['content']    ?? null,
            'date_comment'  => date('Y-m-d'),
        ];

        insert('comment', $data);

        header('Location: ' . BASE_URL .  '?act=product-detail&id=' . $id);
        exit();
    }
    require_once PATH_VIEW . 'layout/master.php';
}


function blogByCategoriesProduct($categoryId)
{
    $view = 'blog-by-cate-product';
    $categories = listAll('categories');
    $productTop6Latest = productTop6Latest();
    $categoryProduct = ProductForCategory($categoryId);

    require_once PATH_VIEW . 'layout/master.php';
}


// Posts
function blogPosts()
{
    $view = 'blog-posts';

    $categories = listAll('categories');
    $listAllForPost = listAllForPost();
    $category_post = listAll('category_post');


    $postTop3Trending = postTop3Trending();

    require_once PATH_VIEW . 'layout/master.php';
}


function blogPostDetail($id)
{
    $view = 'blog-post-detail';

    $category_post = listAll('category_post');
    $post = getPostById($id);
    $postRelated = PostRelated($id);
    $user = showOneForUser('users');

    require_once PATH_VIEW . 'layout/master.php';
}

function blogByCategoriesPost($categoryId)
{
    $view = 'blog-by-cate-post';
    $category_post = listAll('category_post');

    // $postTop6Latest = postTop6Latest();
    $categoryPost = PostForCategory($categoryId);

    require_once PATH_VIEW . 'layout/master.php';
}
