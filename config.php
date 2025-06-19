

<?php
// <!-- Cấu hình -->
    // Config
    const _HIENU = true; // Đánh giá từng loại truy cập có hợp lệ không

    const _MODULES = 'dashboard'; // Cài đặt mặc định trang khởi chạy
    const _ACTION = 'index';

    // Khai báo database
    const _HOST = 'localhost';
    const _DB = 'manager_hienu';
    const _USER = 'root';
    const _PASS = '';
    const _DRIVER = 'mysql';


    // debug error
    const _DEBUG = true;

    // Thiết lập đường dẫn host đường dẫn google
    define('_HOST_URL', 'http://'. $_SERVER['HTTP_HOST'] . '/manager_course');
    define('_HOST_URL_TEMPLATES', _HOST_URL . '/templates');

    // Thiết lập path đương dẫn thư mục
    define('_PATH_URL', __DIR__);
    define('_PATH_URL_TEMPLATES', _PATH_URL . '/templates');

    
    
    


   