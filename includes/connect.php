
<?php 

    // INCLUDES/CONNECT
    if(!defined('_HIENU')) {
        die('Truy cập không hợp lệ');
    }

    try {
        if (class_exists('PDO')) { // Dòng này kiểm tra xem lớp PDO có tồn tại hay không trong môi trường PHP hiện tại.
            $options = array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8", // Hỗ trợ về tiếng việt
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Đẩy lỗi vào ngoại lệ
            );
            
            $dns =  _DRIVER . ':host='._HOST."; dbname="._DB;
           
            $conn = new PDO($dns, _USER, _PASS, $options);
        }
    } catch (Exception $ex) {
        require_once './modules/errors/404.php';
        die();
    }