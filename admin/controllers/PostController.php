<?php
function postListAll()
{
    $title = 'Trang posts';
    $view = 'posts/index';
    $script = 'dataTable';

    $posts = listAllForPost();
    
    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function postShowOne($id)
{
    $post = showOneForPost($id);

    if(empty($post)){
        e404();
    }

    $title = 'Chi tiết ' . $post['p_title'];
    $view = 'posts/show';
    $script = 'dataTable';

    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function postCreate()
{
    $title = 'Tạo Mới post';
    $view = 'posts/create';
    $categories = listAll('category_post');
    $authors = listAll('authors');
    $script = 'excerpt-post';
    if(!empty($_POST)){

        $data = [
            'title'             => $_POST['title']          ?? null,
            'author_id'         => $_POST['author_id']      ?? null,
            'content'           => $_POST['content']        ?? null,
            'cate_id'           => $_POST['cate_id']        ?? null,
            'excerpt'           => $_POST['excerpt']        ?? null,
            'image'             => get_file_upload('image'),
        ];

        $errors = validatePostCreate($data);

        $image = $data['image'];
        if(is_array($image)){
            $data['image'] = upload_file($image, 'uploads/posts/');
        }

        insert('posts', $data);
        
        $_SESSION['success'] = 'Tạo mới thành công';
        header('location: ' . BASE_URL_ADMIN . '?act=posts');
        exit();
    }
    

    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function validatePostCreate($data){
    $errors = [];
    if(empty($data['title'])){
        $errors[] = 'Trường title không được bỏ trống';
    }elseif(strlen($data['title']) > 230){
        $errors[] = 'Trường title không được quá 230 ký tự';
    }elseif(!checkUniqueTitlePost('posts', $data['title'])){
        $errors[] = 'title đã được sử dụng';
    }
    if(empty($data['excerpt'])){
        $errors[] = 'Trường excerpt không được để trống';
    }
    if(empty($data['content'])){
        $errors[] = 'Trường content không được để trống';
    }
    if (empty($data['image'])) {
        $errors[] = 'Trường image là bắt buộc';
    }elseif(is_array($data['image'])){
        $typeImage = ['image/png', 'image/jpg', 'image/jpeg'];
        if ($data['image']['size'] > 2 * 1024 * 1024) {
            $errors[] = 'Trường Image có dung lượng nhỏ hơn 2M';
        } else if (!in_array($data['image']['type'], $typeImage)) {
            $errors[] = 'Trường image chỉ chấp nhận định dạng: png,jpg,jpeg';
        }
    }
    if ($data['cate_id'] === null) {
        $errors[] = 'Bạn Chưa Chọn Danh Mục Post';
    }
    if ($data['author_id'] === null) {
        $errors[] = 'Bạn Chưa Chọn Tác Giả ';
    }
   

    if(!empty($errors)){
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;

        header('location: ' . BASE_URL_ADMIN . '?act=post-create');
        exit();
    }
}
function postUpdate($id)
{
    
    $post = showOneForPost($id);

    if(empty($post)){
        e404();
    }

    $title = 'Cập Nhật post';
    $view = 'posts/update';
    $categories = listAll('category_post');
    $authors = listAll('authors');
    $script = 'excerpt-post';

    if(!empty($_POST)){
        $data = [
            'title'             => $_POST['title']          ?? $post['p_title'],
            'author_id'         => $_POST['author_id']      ?? $post['p_author_id'],
            'content'           => $_POST['content']        ?? $post['p_content'],
            'cate_id'           => $_POST['cate_id']        ?? $post['p_cate_id'],
            'excerpt'           => $_POST['excerpt']        ?? $post['p_excerpt'],
            'updated_at'        => date('Y-m-d H:i:s'), 
            'image'             => get_file_upload('image', $post['p_image']),
        ];

        $errors = validatePostUpdate($id, $data);

        $image = $data['image'];
        $oldImage = $post['p_image'];

        if(is_array($image)){
            $data['image'] = upload_file($image, 'uploads/posts/');
            if ($data['image'] && $data['image'] !== $oldImage) {
                unlink( PATH_UPLOAD . $oldImage);
            }
        }

        update('posts',$id, $data);
        
        $_SESSION['success'] = 'Cập mhật thành công';
        header('location: ' . BASE_URL_ADMIN . '?act=post-update&id=' . $id);
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function validatePostUpdate($id, $data){
    $errors = [];
    if(empty($data['title'])){
        $errors[] = 'Trường title không được bỏ trống';
    }elseif(strlen($data['title']) > 230){
        $errors[] = 'Trường title không được quá 230 ký tự';
    }elseif(!checkUniqueTitleForUpdatePost('posts',$id, $data['title'])){
        $errors[] = 'title đã được sử dụng';
    }
    if(empty($data['excerpt'])){
        $errors[] = 'Trường excerpt không được để trống';
    }else if(strlen($data['excerpt']) > 300 ){
        $errors[] = 'excerpt Không được quá dài';
    }
    if(empty($data['content'])){
        $errors[] = 'Trường content không được để trống';
    }
    if (empty($data['image'])) {
        $errors[] = 'Trường image là bắt buộc';
    }elseif(is_array($data['image'])){
        $typeImage = ['image/png', 'image/jpg', 'image/jpeg'];
        if ($data['image']['size'] > 2 * 1024 * 1024) {
            $errors[] = 'Trường Image có dung lượng nhỏ hơn 2M';
        } else if (!in_array($data['image']['type'], $typeImage)) {
            $errors[] = 'Trường image chỉ chấp nhận định dạng: png,jpg,jpeg';
        }
    }
    if ($data['cate_id'] === null) {
        $errors[] = 'Bạn Chưa Chọn Danh Mục Post';
    }
    if ($data['author_id'] === null) {
        $errors[] = 'Bạn Chưa Chọn Tác Giả ';
    }

    if(!empty($errors)){
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;

        header('location: ' . BASE_URL_ADMIN . '?act=post-update&id=' . $id);
        exit();
    }
}
function postDelete($id)
{
    $post = showOneForPost($id);
    if(empty($post)){
        e404();
    }
    try{
        delete2('posts', $id);
    }catch(Exception $e){
        debug($e);
    }
    if(!empty($post['p_image']) && file_exists(PATH_UPLOAD . $post['p_image'])){
        unlink(PATH_UPLOAD . $post['p_image']);
    }
    
    $_SESSION['success'] = 'Xóa thành công!';
    header('Location: ' . BASE_URL_ADMIN .  '?act=posts');
    exit();
}
