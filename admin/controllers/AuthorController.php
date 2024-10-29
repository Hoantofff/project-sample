<?php

function authorListAll()
{
    $title = 'Trang author';
    $view = 'authors/index';
    $script = 'dataTable';

    $authors = listAll('authors');

    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function authorShowOne($id)
{
    $author = showOne('authors', $id);

    if(empty($author)){
        e404();
    }

    $title = 'Chi tiết ' . $author['name'];
    $view = 'authors/show';
    $script = 'dataTable';

    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function authorCreate()
{
    $title = 'Tạo Mới Tác Giả';
    $view = 'authors/create';
    if(!empty($_POST)){

        $data = [
            'name'         => $_POST['name']  ?? null,
            'avatar'        => get_file_upload('avatar'),
        ];

        $errors = validateAuthorCreate($data);

        $avatar = $data['avatar'];
        
        if(is_array($avatar)){
            $data['avatar'] = upload_file($avatar, 'uploads/authors/');
           
        }
        insert('authors', $data);
        
        $_SESSION['success'] = 'Tạo mới thành công';
        header('location: ' . BASE_URL_ADMIN . '?act=authors');
        exit();
    }
    

    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function validateAuthorCreate($data){
    $errors = [];
    if(empty($data['name'])){
        $errors[] = 'Trường name không được bỏ trống';
    }elseif(strlen($data['name']) > 230){
        $errors[] = 'Trường name không được quá 230 ký tự';
    }elseif(!checkUniqueName('authors', $data['name'])){
        $errors[] = 'Tên Danh Mục đã được sử dụng';
    }
    if (empty($data['avatar'])) {
        $errors[] = 'Trường avatar là bắt buộc';
    }elseif(is_array($data['avatar'])){
        $typeAvatar = ['image/png', 'image/jpg', 'image/jpeg'];
        if ($data['avatar']['size'] > 2 * 1024 * 1024) {
            $errors[] = 'Trường avatar có dung lượng nhỏ hơn 2M';
        } else if (!in_array($data['avatar']['type'], $typeAvatar)) {
            $errors[] = 'Trường avatar chỉ chấp nhận định dạng: png,jpg,jpeg';
        }
    }

    if(!empty($errors)){
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;

        header('location: ' . BASE_URL_ADMIN . '?act=author-create');
        exit();
    }
}
function authorUpdate($id)
{
    $author = showOne('authors', $id);

    if(empty($author)){
        e404();
    }
    $title = 'Cập Nhật Danh Mục ' . $author['name'] ??  null;
    $view = 'authors/update';
    $roles = listAll('role');
    if(!empty($_POST)){

        $data = [
            'name'         => $_POST['name']  ?? $author['name'],
            'updated_at'        => date('Y-m-d H:i:s'), 
            'avatar'             => get_file_upload('avatar', $author['avatar']),
        ];

        $errors = validateAuthorUpdate($id, $data);
        $avatar = $data['avatar'];
        $oldavatar = $author['avatar'];
        
        if(is_array($avatar)){
            $data['avatar'] = upload_file($avatar, 'uploads/authors/');
            if ($data['avatar'] && $data['avatar'] !== $oldavatar) {
                unlink( PATH_UPLOAD . $oldavatar);
            }
        }
        
        update('authors',$id, $data);
        
        $_SESSION['success'] = 'Update thành công';
        header('location: ' . BASE_URL_ADMIN . '?act=author-update&id=' . $id);
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function validateAuthorUpdate($id, $data){
    $errors = [];
    if(empty($data['name'])){
        $errors[] = 'Trường name không được bỏ trống';
    }elseif(strlen($data['name']) > 230){
        $errors[] = 'Trường name không được quá 230 ký tự';
    }elseif(!checkUniqueNameForUpdate('authors',$id, $data['name'])){
        $errors[] = 'Tên Danh Mục đã được sử dụng';
    }
    if (empty($data['avatar'])) {
        $errors[] = 'Trường avatar là bắt buộc';
    }elseif(is_array($data['avatar'])){
        $typeavatar = ['avatar/png', 'avatar/jpg', 'avatar/jpeg'];
        if ($data['avatar']['size'] > 2 * 1024 * 1024) {
            $errors[] = 'Trường avatar có dung lượng nhỏ hơn 2M';
        } else if (!in_array($data['avatar']['type'], $typeavatar)) {
            $errors[] = 'Trường avatar chỉ chấp nhận định dạng: png,jpg,jpeg';
        }
    }

    if(!empty($errors)){
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;

        header('location: ' . BASE_URL_ADMIN . '?act=author-update&id=' . $id);
        exit();
    }
}
function authorDelete($id)
{
    $author = showOne('authors',$id);
    if(empty($author)){
        e404();
    }
    try{
        delete2('authors', $id);
    }catch(Exception $e){
        debug($e);
    }
    if(!empty($author['avatar']) && file_exists(PATH_UPLOAD . $author['avatar'])){
        unlink(PATH_UPLOAD . $author['avatar']);
    }
    
    $_SESSION['success'] = 'Xóa thành công!';
    header('Location: ' . BASE_URL_ADMIN .  '?act=authors');
    exit();
}