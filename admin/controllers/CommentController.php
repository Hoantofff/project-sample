<?php 

function CommentListAll(){
    $view = 'comment/index';
    $title = 'Bình Luận';
    $script = 'dataTable';
    $listAllComment = listAllComment();

    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}
function displayCommentsForProduct($id){
    $view = 'comment/show';
    $title = 'Bình Luận Sản Phẩm';
    $script = 'dataTable';
    
    $getCommentForProduct = getCommentForProduct($id);
    $product = showOneForProduct($id);

    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}
function CommentDelete($id)
{
    $comment = showOne('comment', $id);
    
    if (empty($comment)) {
        e404();
    }

    delete2('comment', $id);

    $_SESSION['success'] = 'Xóa thành công!';
    header('Location: ' . BASE_URL_ADMIN .  '?act=commentForProduct&id=' . $comment['product_id'] );
    exit();
}

