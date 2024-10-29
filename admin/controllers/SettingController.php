<?php

function settingShowForm(){
    $title = 'Danh Sách Setting';
    $view = 'settings/form';

    $settings = settingPluckKeyValue();

    require_once PATH_VIEW_ADMIN . 'layout/master.php';
}
function settingSave(){
    $settings = settingPluckKeyValue();

    foreach($_POST as $key => $value){
        if(isset($settings[$key])){
            if($value != $settings[$key]){
                settingUpdateByKey($key, ['value' => $value]);
            }else{
                insert('settings', [
                    'key' => $key,
                    'value' => $value
                ]);
            }
        }
    }
    $_SESSION['success']= 'Thao Tác Thành Công';
    header('location: ' . BASE_URL_ADMIN . '?act=setting-form');
    exit();
}

function settingPluckKeyValue() {
    $data = listAll('settings');

    $settings = [];
    foreach ($data as $item) {
        $settings[$item['key']] = $item['value'];

    }

    return $settings;
}