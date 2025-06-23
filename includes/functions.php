
<?php 

    if(!defined('_HIENU')) {
        die('Truy cập không hợp lệ');
    }


    function layout($layoutName, $data = []) {

        // Thực hiện kiểm tra đường dẫn 
        // echo _PATH_URL_TEMPLATES . '/layouts/'.$layoutName.'.php';
        // die();
        if(file_exists(_PATH_URL_TEMPLATES . '/layouts/'.$layoutName.'.php')) {
            require_once _PATH_URL_TEMPLATES . '/layouts/'.$layoutName.'.php';
        }
    };



?>


