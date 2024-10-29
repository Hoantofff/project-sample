<?php

// Category Product
function CategoryListAll()
{
    $title = 'Trang category';
    $view = 'categories/index';
    $script = 'dataTable';

    $catrgories = listAll('categories');
    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function categoryShowOne($id)
{
    $category = showOne('categories', $id);

    if(empty($category)){
        e404();
    }

    $title = 'Chi tiết ' . $category['name'];
    $view = 'categories/show';
    $script = 'dataTable';

    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function categoryCreate()
{
    $title = 'Tạo Mới Danh Mục';
    $view = 'categories/create';
    if(!empty($_POST)){

        $data = [
            'name'         => $_POST['name']  ?? null,
            'image'        => get_file_upload('image'),
        ];

        $errors = validateCategoryCreate($data);

        $image = $data['image'];
        
        if(is_array($image)){
            $data['image'] = upload_file($image, 'uploads/categories/');
           
        }
        insert('categories', $data);
        
        $_SESSION['success'] = 'Tạo mới thành công';
        header('location: ' . BASE_URL_ADMIN . '?act=categories');
        exit();
    }
    

    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function validateCategoryCreate($data){
    $errors = [];
    if(empty($data['name'])){
        $errors[] = 'Trường name không được bỏ trống';
    }elseif(strlen($data['name']) > 230){
        $errors[] = 'Trường name không được quá 230 ký tự';
    }elseif(!checkUniqueName('categories', $data['name'])){
        $errors[] = 'Tên Danh Mục đã được sử dụng';
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

    if(!empty($errors)){
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;

        header('location: ' . BASE_URL_ADMIN . '?act=category-create');
        exit();
    }
}
function categoryUpdate($id)
{
    $category = showOne('categories', $id);

    if(empty($category)){
        e404();
    }
    $title = 'Cập Nhật Danh Mục ' . $category['name'] ??  null;
    $view = 'categories/update';
    $roles = listAll('role');
    if(!empty($_POST)){

        $data = [
            'name'         => $_POST['name']  ?? $category['name'],
            'updated_at'        => date('Y-m-d H:i:s'), 
            'image'             => get_file_upload('image', $category['image']),
        ];

        $errors = validateCategoryUpdate($id, $data);
        $image = $data['image'];
        $oldImage = $category['image'];
        
        if(is_array($image)){
            $data['image'] = upload_file($image, 'uploads/categories/');
            if ($data['image'] && $data['image'] !== $oldImage) {
                unlink( PATH_UPLOAD . $oldImage);
            }
        }
        
        update('categories',$id, $data);
        
        $_SESSION['success'] = 'Update thành công';
        header('location: ' . BASE_URL_ADMIN . '?act=category-update&id=' . $id);
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function validateCategoryUpdate($id, $data){
    $errors = [];
    if(empty($data['name'])){
        $errors[] = 'Trường name không được bỏ trống';
    }elseif(strlen($data['name']) > 230){
        $errors[] = 'Trường name không được quá 230 ký tự';
    }elseif(!checkUniqueNameForUpdate('categories',$id, $data['name'])){
        $errors[] = 'Tên Danh Mục đã được sử dụng';
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

    if(!empty($errors)){
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;

        header('location: ' . BASE_URL_ADMIN . '?act=category-update&id=' . $id);
        exit();
    }
}
function categoryDelete($id)
{
    $category = showOne('categories',$id);
    if(empty($category)){
        e404();
    }
    try{
        delete2('categories', $id);
    }catch(Exception $e){
        debug($e);
    }
    if(!empty($category['image']) && file_exists(PATH_UPLOAD . $category['image'])){
        unlink(PATH_UPLOAD . $category['image']);
    }
    
    $_SESSION['success'] = 'Xóa thành công!';
    header('Location: ' . BASE_URL_ADMIN .  '?act=categories');
    exit();
}

// End Category Product


// Category Post

function CategoryPostListAll()
{
    $title = 'Trang category Post';
    $view = 'category-post/index';
    $script = 'dataTable';

    $category_post = listAll('category_post');
    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function categoryPostShowOne($id)
{
    $category = showOne('category_post', $id);

    if(empty($category)){
        e404();
    }

    $title = 'Chi tiết ' . $category['name'];
    $view = 'category-post/show';
    $script = 'dataTable';

    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function categoryPostCreate()
{
    $title = 'Tạo Mới Danh Mục Post';
    $view = 'category-post/create';
    if(!empty($_POST)){

        $data = [
            'name'         => $_POST['name']  ?? null,
        ];

        $errors = validateCategoryPostCreate($data);

        insert('category_post', $data);
        
        $_SESSION['success'] = 'Tạo mới thành công';
        header('location: ' . BASE_URL_ADMIN . '?act=category-post');
        exit();
    }
    

    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function validateCategoryPostCreate($data){
    $errors = [];
    if(empty($data['name'])){
        $errors[] = 'Trường name không được bỏ trống';
    }elseif(strlen($data['name']) > 230){
        $errors[] = 'Trường name không được quá 230 ký tự';
    }elseif(!checkUniqueName('categories', $data['name'])){
        $errors[] = 'Tên Danh Mục đã được sử dụng';
    }

    if(!empty($errors)){
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;

        header('location: ' . BASE_URL_ADMIN . '?act=category-post-create');
        exit();
    }
}
function categoryPostUpdate($id)
{
    $category = showOne('category_post', $id);

    if(empty($category)){
        e404();
    }
    $title = 'Cập Nhật Danh Mục ' . $category['name'] ??  null;
    $view = 'category-post/update';
    if(!empty($_POST)){

        $data = [
            'name'         => $_POST['name']  ?? $category['name'],
        ];

        $errors = validateCategoryPostUpdate($id, $data);
        
        update('category_post',$id, $data);
        
        $_SESSION['success'] = 'Update thành công';
        header('location: ' . BASE_URL_ADMIN . '?act=category-post-update&id=' . $id);
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function validateCategoryPostUpdate($id, $data){
    $errors = [];
    if(empty($data['name'])){
        $errors[] = 'Trường name không được bỏ trống';
    }elseif(strlen($data['name']) > 230){
        $errors[] = 'Trường name không được quá 230 ký tự';
    }elseif(!checkUniqueNameForUpdate('categories',$id, $data['name'])){
        $errors[] = 'Tên Danh Mục đã được sử dụng';
    }

    if(!empty($errors)){
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;

        header('location: ' . BASE_URL_ADMIN . '?act=category-post-update&id=' . $id);
        exit();
    }
}
function categoryPostDelete($id)
{
    $category = showOne('category_post',$id);
    if(empty($category)){
        e404();
    }
    delete2('category_post', $id);
  
    $_SESSION['success'] = 'Xóa thành công!';
    header('Location: ' . BASE_URL_ADMIN .  '?act=category-post');
    exit();
}

// End Category Post