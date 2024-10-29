<?php
function productListAll()
{
    $title = 'Trang Products';
    $view = 'products/index';
    $script = 'dataTable';

    $products = listAllForProduct();
    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function productShowOne($id)
{
    $product = showOneForProduct($id);

    if(empty($product)){
        e404();
    }

    $title = 'Chi tiết ' . $product['p_title'];
    $view = 'products/show';
    $script = 'dataTable';

    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function productCreate()
{
    $title = 'Tạo Mới product';
    $view = 'products/create';
    $categories = listAll('categories');
    $script = 'description-product';
    if(!empty($_POST)){

        $data = [
            'title'             => $_POST['title']          ?? null,
            'price'             => $_POST['price']          ?? null,
            'discount'          => $_POST['discount']       ?? null,
            'description'       => $_POST['description']    ?? null,
            'cate_id'           => $_POST['cate_id']        ?? null,
            'quantity'          => $_POST['quantity']       ?? null,
            'weight'            => $_POST['weight']         ?? null,
            'image'             => get_file_upload('image'),
        ];

        $errors = validateProductCreate($data);

        $image = $data['image'];
        if(is_array($image)){
            $data['image'] = upload_file($image, 'uploads/products/');
        }

        insert('products', $data);
        
        $_SESSION['success'] = 'Tạo mới thành công';
        header('location: ' . BASE_URL_ADMIN . '?act=products');
        exit();
    }
    

    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function validateProductCreate($data){
    $errors = [];
    if(empty($data['title'])){
        $errors[] = 'Trường title không được bỏ trống';
    }elseif(strlen($data['title']) > 230){
        $errors[] = 'Trường title không được quá 230 ký tự';
    }elseif(!checkUniqueTitleProduct('products', $data['title'])){
        $errors[] = 'title đã được sử dụng';
    }
    if(empty($data['price'])){
        $errors[] = 'Trường price không được để trống';
    }else if((int)$data['price'] < 0 ){
        $errors[] = 'Giá Không tồn tại! Mời nhập lại.';
    }
    if(empty($data['discount'])){
        $errors[] = 'Trường discount không được để trống';
    }else if((int)$data['discount'] < $data['price'] ){
        $errors[] = 'Giá gốc không được nhỏ hơn giá giảm.';
    }
    if(empty($data['quantity'])){
        $errors[] = 'Trường quantity không được để trống';
    }else if((int)$data['quantity'] < 0 ){
        $errors[] = 'Số Lượng Sai';
    }
    if(empty($data['weight'])){
        $errors[] = 'Trường weight không được để trống';
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
        $errors[] = 'Bạn Chưa Chọn Danh Mục Sản Phẩm';
    }
   

    if(!empty($errors)){
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;

        header('location: ' . BASE_URL_ADMIN . '?act=product-create');
        exit();
    }
}
function productUpdate($id)
{
    
    $product = showOneForProduct($id);
    if(empty($product)){
        e404();
    }

    $title = 'Cập Nhật product';
    $view = 'products/update';
    $categories = listAll('categories');
    $script = 'description-product';

    if(!empty($_POST)){

        $data = [
            'title'             => $_POST['title']          ?? $product['p_title'],
            'price'             => $_POST['price']          ?? $product['p_price'],
            'discount'          => $_POST['discount']       ?? $product['p_discount'],
            'description'       => $_POST['description']    ?? $product['p_description'],
            'cate_id'           => $_POST['cate_id']        ?? $product['p_cate_id'],
            'quantity'          => $_POST['quantity']       ?? $product['p_quantity'],
            'weight'            => $_POST['weight']         ?? $product['p_weight'],
            'updated_at'        => date('Y-m-d H:i:s'), 
            'image'             => get_file_upload('image', $product['p_image']),
        ];

        $errors = validateProductUpdate($id, $data);

        $image = $data['image'];
        $oldImage = $product['p_image'];

        if(is_array($image)){
            $data['image'] = upload_file($image, 'uploads/products/');
            if ($data['image'] && $data['image'] !== $oldImage) {
                unlink( PATH_UPLOAD . $oldImage);
            }
        }

        update('products',$id, $data);
        
        $_SESSION['success'] = 'Cập mhật thành công';
        header('location: ' . BASE_URL_ADMIN . '?act=product-update&id=' . $id);
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function validateProductUpdate($id, $data){
    $errors = [];
    if(empty($data['title'])){
        $errors[] = 'Trường title không được bỏ trống';
    }elseif(strlen($data['title']) > 230){
        $errors[] = 'Trường title không được quá 230 ký tự';
    }elseif(!checkUniqueTitleForUpdateProduct('products',$id, $data['title'])){
        $errors[] = 'title đã được sử dụng';
    }
    if(empty($data['price'])){
        $errors[] = 'Trường price không được để trống';
    }else if((int)$data['price'] < 0 ){
        $errors[] = 'Giá Không tồn tại! Mời nhập lại.';
    }
    if(empty($data['discount'])){
        $errors[] = 'Trường discount không được để trống';
    }else if((int)$data['discount'] < $data['price'] ){
        $errors[] = 'Giá gốc không được nhỏ hơn giá giảm.';
    }
    if((int)$data['quantity'] < 0 ){
        $errors[] = 'Số Lượng Sai';
    }
    if(empty($data['weight'])){
        $errors[] = 'Trường weight không được để trống';
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
        $errors[] = 'Bạn Chưa Chọn Danh Mục Sản Phẩm';
    }

    if(!empty($errors)){
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;

        header('location: ' . BASE_URL_ADMIN . '?act=product-update&id=' . $id);
        exit();
    }
}
function productDelete($id)
{
    $product = showOneForProduct($id);
    if(empty($product)){
        e404();
    }
    try{
        delete2('products', $id);
    }catch(Exception $e){
        debug($e);
    }
    if(!empty($product['p_image']) && file_exists(PATH_UPLOAD . $product['p_image'])){
        unlink(PATH_UPLOAD . $product['p_image']);
    }
    
    $_SESSION['success'] = 'Xóa thành công!';
    header('Location: ' . BASE_URL_ADMIN .  '?act=products');
    exit();
}
