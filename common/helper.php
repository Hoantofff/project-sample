<?php

if (!function_exists('require_file')) {
    function require_file($pathFolder)
    {
        $flies = array_diff(scandir($pathFolder), ['.', '..']);

        foreach ($flies as $file) {
            require_once $pathFolder . $file;
        }
    }
}

if (!function_exists('debug')) {
    function debug($data)
    {
        echo "<pre>";

        print_r($data);

        die;
    }
}

if (!function_exists('e404')) {
    function e404()
    {
        echo "404 Not found";
        die;
    }
}

if (!function_exists('upload_file')) {
    function upload_file($files, $pathFolderUpload)
    {
        $uploadFile = [];
        if (is_array($files['name'])) {
            foreach ($files['name'] as $key => $value) {
                $imagePath = $pathFolderUpload . time() . '-' . basename($value);

                if (move_uploaded_file($files['tmp_name']['key'], PATH_UPLOAD . $imagePath)) {
                    $uploadFile[] = $imagePath;
                }
            }
        } else {
            $imagePath = $pathFolderUpload . time() . '-' . basename($files['name']);

            if (move_uploaded_file($files['tmp_name'], PATH_UPLOAD . $imagePath)) {
                $uploadFile[] = $imagePath;
            }
        }
        return implode(',',$uploadFile);
    }
}

if (!function_exists('get_file_upload')) {
    function get_file_upload($field, $default = null)
    {

        if (isset($_FILES[$field]) && $_FILES[$field]['size'] > 0) {

            return $_FILES[$field];
        }
        return $default ?? null;
    }
}

if (!function_exists('authen_check')) {
    function authen_check($act)
    {
        if ($act == 'login') {
            if (!empty($_SESSION['user_admin'])) {
                header('location: ' . BASE_URL_ADMIN);
                exit();
            }
        } elseif (empty($_SESSION['user_admin'])) {
            header('location: ' . BASE_URL_ADMIN . '?act=login');
            exit();
        }
    }
}
