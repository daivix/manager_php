

<?php

    date_default_timezone_set('Asia/Ho_Chi_Minh');
    // Xuất thời gian ra màn hình
    // echo date('Y:m:d H:i:s');
    // Output: 2025:06:17 14:40:53

    session_start(); //
    ob_start(); // Tránh xảy ra lỗi header, cookie

    require_once 'config.php';

    require_once './modules/auth/login.php';
    // - Tránh trường hợp truy cập đánh cấp tài khoảng
    // - http://localhost/manager_course/modules/auth/login.php
    // - Sử dụng defined kiểm tra
    // - Truy cập hợp lệ truy cập trực tiếp từ file index
    // - http://localhost/manager_course/

?>