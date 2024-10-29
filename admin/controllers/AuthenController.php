<?php

function showFormLogin(){
    if(isset($_POST['submit-from-login'])){
        $email = $_POST['email'];
        $password = $_POST['password'];
        $errors = [];

        if(empty($email) || empty($password)){
            $errors[] = 'Email hoặc mật khẩu không được bỏ trống.';
        } else {
            $user = showOneForUserByEmail($email);
            
            if ($user === false) {
                $errors[] = 'Email không tồn tại.';
            } else {
                if ($password !== $user['u_password']) {
                    $errors[] = 'Mật khẩu không chính xác.';
                }
            }
            if (empty($errors)) {
                if($user['u_role_id'] === 1){
                    $_SESSION['user_admin'] = $user;
                    $_SESSION['user_admin_name'] = $user['u_full_name'];
                    echo '<script> window.location.href = "'. BASE_URL_ADMIN.'";</script>';
                } elseif($user['u_role_id'] === 2){
                    $_SESSION['user_client'] = $user;
                    $_SESSION['user_client_name'] = $user['u_full_name'];
                    echo '<script> window.location.href = "'. BASE_URL.'";</script>';
                }
                return; // Thoát khỏi hàm nếu đăng nhập thành công
            }
        }

        $_SESSION['error'] = $errors;
    }

    require_once PATH_VIEW_ADMIN . 'authen/login.php';
}



function logout(){
    if (!empty($_SESSION['user_client'])) {
        session_unset();
        session_destroy();
    }
    if (!empty($_SESSION['user_admin'])) {
        session_destroy();
    }

    header('location: ' . BASE_URL);
}