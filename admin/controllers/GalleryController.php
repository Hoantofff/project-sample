<?php
function galleryListAll()
{
    $title = 'Trang gallery';
    $view = 'gallery/index';
    $script = 'dataTable';

    $gallery = listAllForGallery();
    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function galleryShowOne($id)
{
    $gallery = showOneForGallery($id);

    if(empty($gallery)){
        e404();
    }

    $title = 'Chi tiết ' . $gallery['p_title'];
    $view = 'gallery/show';
    $script = 'dataTable';

    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function galleryCreate()
{
    $title = 'Tạo Mới gallery';
    $view = 'gallery/create';
    $products = listAllForProduct();
    $script = 'description-gallery';
    if(!empty($_POST)){

        $data = [
            'product_id'            => $_POST['product_id']          ?? null,
            'thumbnail'             => get_file_upload('thumbnail'),
        ];

        $errors = validateGalleryCreate($data);

        $thumbnail = $data['thumbnail'];
        if(is_array($thumbnail)){
            $data['thumbnail'] = upload_file($thumbnail, 'uploads/gallery/');
        }

        insert('gallery', $data);
        
        $_SESSION['success'] = 'Tạo mới thành công';
        header('location: ' . BASE_URL_ADMIN . '?act=gallery');
        exit();
    }
    

    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function validateGalleryCreate($data)
{
    $errors = [];

    if (empty($data['thumbnail'])) {
        $errors[] = 'Trường thumbnail là bắt buộc';
    } elseif (is_array($data['thumbnail']['name'])) {
        $typeThumbnail = ['image/png', 'image/jpg', 'image/jpeg'];
        foreach ($data['thumbnail']['name'] as $key => $name) {
            if ($data['thumbnail']['size'][$key] > 5 * 1024 * 1024) {
                $errors[] = "File $name có dung lượng vượt quá 5MB";
            } elseif (!in_array($data['thumbnail']['type'][$key], $typeThumbnail)) {
                $errors[] = "File $name chỉ chấp nhận định dạng: png, jpg, jpeg";
            }
        }
    } else {
        $errors[] = 'Trường thumbnail không hợp lệ';
    }

    if ($data['product_id'] === null) {
        $errors[] = 'Bạn Chưa Chọn Sản Phẩm';
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;

        header('location: ' . BASE_URL_ADMIN . '?act=gallery-create');
        exit();
    }
}

function galleryUpdate($id)
{
    
    $gallery = showOneForGallery($id);
    if(empty($gallery)){
        e404();
    }

    $title = 'Cập Nhật gallery';
    $view = 'gallery/update';
    $categories = listAll('categories');
    $script = 'description-gallery';

    if(!empty($_POST)){

        $data = [
            'product_id'        => $_POST['title']          ?? $gallery['g_product_id'],
            'updated_at'        => date('Y-m-d H:i:s'), 
            'thumbnail'             => get_file_upload('thumbnail', $gallery['p_thumbnail']),
        ];

        $errors = validateGalleryUpdate($id, $data);

        $thumbnail = $data['thumbnail'];
        if(is_array($thumbnail)){
            $data['thumbnail'] = upload_file($thumbnail, 'uploads/gallery/');
        }

        update('gallery',$id, $data);
        
        $_SESSION['success'] = 'Cập mhật thành công';
        header('location: ' . BASE_URL_ADMIN . '?act=gallery-update&id=' . $id);
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function validateGalleryUpdate($id, $data){
    $errors = [];
    if (empty($data['thumbnail'])) {
        $errors[] = 'Trường thumbnail là bắt buộc';
    }elseif(is_array($data['thumbnail'])){
        $typethumbnail = ['thumbnail/png', 'thumbnail/jpg', 'thumbnail/jpeg'];
        if ($data['thumbnail']['size'] > 2 * 1024 * 1024) {
            $errors[] = 'Trường thumbnail có dung lượng nhỏ hơn 2M';
        } else if (!in_array($data['thumbnail']['type'], $typethumbnail)) {
            $errors[] = 'Trường thumbnail chỉ chấp nhận định dạng: png,jpg,jpeg';
        }
    }
    if ($data['product_id'] === null) {
        $errors[] = 'Bạn Chưa Chọn Sản Phẩm';
    }

    if(!empty($errors)){
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;

        header('location: ' . BASE_URL_ADMIN . '?act=gallery-update&id=' . $id);
        exit();
    }
}
function galleryDelete($id)
{
    $gallery = showOneForGallery($id);
    if(empty($gallery)){
        e404();
    }
    try{
        delete2('gallery', $id);
    }catch(Exception $e){
        debug($e);
    }
    if(!empty($gallery['g_thumbnail']) && file_exists(PATH_UPLOAD . $gallery['g_thumbnail'])){
        unlink(PATH_UPLOAD . $gallery['g_thumbnail']);
    }
    
    $_SESSION['success'] = 'Xóa thành công!';
    header('Location: ' . BASE_URL_ADMIN .  '?act=gallery');
    exit();
}
