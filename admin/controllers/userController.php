<?php
function userListAll()
{
    $title = 'Trang users';
    $view = 'users/index';
    $script = 'dataTable';

    $users = listAllForUser();
    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function userShowOne($id)
{
    $user = showOneForUser($id);

    if(empty($user)){
        e404();
    }

    $title = 'Chi tiết ' . $user['u_full_name'];
    $view = 'users/show';
    $script = 'dataTable';

    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function userCreate()
{
    $title = 'Tạo Mới User';
    $view = 'users/create';
    $roles = listAll('role');
    if(!empty($_POST)){

        $data = [
            'full_name'         => $_POST['full_name']  ?? null,
            'email'             => $_POST['email']      ?? null,
            'phone'             => $_POST['phone']      ?? null,
            'address'           => $_POST['address']    ?? null,
            'password'          => $_POST['password']   ?? null,
            'image'             => get_file_upload('image'),
            'role_id'           => $_POST['role_id']    ?? null,
        ];

        $errors = validateUserCreate($data);

        $image = $data['image'];
        if(is_array($image)){
            $data['image'] = upload_file($image, 'uploads/users/');
        }

        insert('users', $data);
        
        $_SESSION['success'] = 'Tạo mới thành công';
        header('location: ' . BASE_URL_ADMIN . '?act=users');
        exit();
    }
    

    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function validateUserCreate($data){
    $errors = [];
    if(empty($data['full_name'])){
        $errors[] = 'Trường full name không được bỏ trống';
    }elseif(strlen($data['full_name']) > 230){
        $errors[] = 'Trường full name không được quá 230 ký tự';
    }elseif(!checkUniqueNameUser('users', $data['full_name'])){
        $errors[] = 'Name đã được sử dụng';
    }
    if(empty($data['email'])){
        $errors[] = 'Trường email không được bỏ trống';
    }else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Trường email không đúng định dang';
    } else if (!checkUniqueEmail('users', $data['email'])) {
        $errors[] = 'Email đã được sử dụng';
    }
    if(empty($data['phone'])){
        $errors[] = 'Trường phone không được bỏ trống';
    }else if (!preg_match('/^0\d{9}$/', $data['phone'])) {
        $errors[] = 'Sai định dạng số điện thoại';
    }
    if(empty($data['address'])){
        $errors[] = 'Trường address không được bỏ trống';
    }
    if(empty($data['password'])){
        $errors[] = 'Trường password không được bỏ trống';
    }else if (strlen($data['password']) > 30 || strlen($data['password']) < 0) {
        $errors[] = 'Trường password có độ dài tối đa là 20';
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
    if($data['role_id'] === null){
        $errors[] = 'Bạn Chưa Chọn Danh Mục Sản Phẩm';
    }else if (!in_array($data['role_id'], [1, 2])) {
        $errors[] = 'Trường role phải là admin hoặc client';
    }

    if(!empty($errors)){
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;

        header('location: ' . BASE_URL_ADMIN . '?act=user-create');
        exit();
    }
}
function userUpdate($id)
{
    
    $user = showOneForUser($id);
    if(empty($user)){
        e404();
    }
    $title = 'Cập Nhật User';
    $view = 'users/update';
    $roles = listAll('role');
    if(!empty($_POST)){

        $data = [
            'full_name'         => $_POST['full_name']  ?? $user['u_full_name'],
            'email'             => $_POST['email']      ?? $user['u_email'],
            'phone'             => $_POST['phone']      ?? $user['u_phone'],
            'address'           => $_POST['address']    ?? $user['u_address'],
            'password'          => $_POST['password']   ?? $user['u_password'],
            'role_id'           => $_POST['role_id']    ?? $user['u_role_id'],
            'image'             => get_file_upload('image', $user['u_image']),
        ];

        $errors = validateUserUpdate($id, $data);
        $image = $data['image'];
        $oldImage = $user['u_image'];
        
        if(is_array($image)){
            $data['image'] = upload_file($image, 'uploads/users/');
            
            if ($data['image'] && $data['image'] !== $oldImage) {
                unlink( PATH_UPLOAD . $oldImage);
            }
        }
        update('users',$id, $data);
        
        $_SESSION['success'] = 'Update thành công';
        header('location: ' . BASE_URL_ADMIN . '?act=user-update&id=' . $id);
        exit();
    }
    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}

function validateUserUpdate($id, $data){
    $errors = [];
    if(empty($data['full_name'])){
        $errors[] = 'Trường full name không được bỏ trống';
    }elseif(strlen($data['full_name']) > 230){
        $errors[] = 'Trường full name không được quá 230 ký tự';
    }elseif(!checkUniqueNameForUpdateUser('users',$id, $data['full_name'])){
        $errors[] = 'Name đã được sử dụng';
    }
    if(empty($data['email'])){
        $errors[] = 'Trường email không được bỏ trống';
    }else if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Trường email không đúng định dang';
    } else if (!checkUniqueEmailForUpdate('users',$id, $data['email'])) {
        $errors[] = 'Email đã được sử dụng';
    }
    if(empty($data['phone'])){
        $errors[] = 'Trường phone không được bỏ trống';
    }else if (!preg_match('/^0\d{9}$/', $data['phone'])) {
        $errors[] = 'Sai định dạng số điện thoại';
    }
    if(empty($data['address'])){
        $errors[] = 'Trường address không được bỏ trống';
    }
    if(empty($data['password'])){
        $errors[] = 'Trường password không được bỏ trống';
    }else if (strlen($data['password']) > 30 || strlen($data['password']) < 0) {
        $errors[] = 'Trường password có độ dài tối đa là 20';
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
    if($data['role_id'] === null){
        $errors[] = 'Bạn Chưa Chọn Danh Mục Sản Phẩm';
    }else if (!in_array($data['role_id'], [1, 2])) {
        $errors[] = 'Trường role phải là admin hoặc client';
    }

    if(!empty($errors)){
        $_SESSION['errors'] = $errors;
        $_SESSION['data'] = $data;

        header('location: ' . BASE_URL_ADMIN . '?act=user-update&id=' . $id);
        exit();
    }
}
function userDelete($id)
{
    $user = showOneForUser($id);
    if(empty($user)){
        e404();
    }
    try{
        delete2('users', $id);
    }catch(Exception $e){
        debug($e);
    }
    if(!empty($user['u_image']) && file_exists(PATH_UPLOAD . $user['u_image'])){
        unlink(PATH_UPLOAD . $user['u_image']);
    }
    
    $_SESSION['success'] = 'Xóa thành công!';
    header('Location: ' . BASE_URL_ADMIN .  '?act=users');
    exit();
}
