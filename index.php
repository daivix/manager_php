

<?php

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    // Xuất thời gian ra màn hình
    // echo date('Y:m:d H:i:s');
    // Output: 2025:06:17 14:40:53

    session_start(); //
    ob_start(); // Tránh xảy ra lỗi header, cookie

    require_once 'config.php';

   

?>