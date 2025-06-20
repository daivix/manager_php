

<?php

// MAIN: INDEX
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    // Xuất thời gian ra màn hình
    // echo date('Y:m:d H:i:s');
    // Output: 2025:06:17 14:40:53

    session_start(); // Tạo mới hoặc tiếp tục phiên làm việc, dùng để 
    // lưu trữ thông tin đăng nhập,...
    ob_start(); // Tránh xảy ra lỗi header, cookie

    require_once 'config.php';
    require_once './includes/connect.php';
    require_once './includes/database.php';

     $data = [
                'name' => 'Hùng Ngọc',
                'slug' => 'hung-ngoc',
     ];


     insert('course_category', $data);
    die();


    // $rel = getAll("SELECT * FROM  course WHERE id = 2");
    // $rel = getOne("SELECT * FROM  course");
    // echo '<pre>';
    // print_r($rel);
    // echo '<pre>';
    die();

    $module = _MODULES;
    $action = _ACTION;

    if(!empty($_GET['module'])) {
        $module = $_GET['module'];
    }

    if(!empty($_GET['action'])) {
        $action = $_GET['action'];
    }

    $path = 'modules/' . $module . '/' . $action . '.php';
    // echo $path;

    if(!empty($path)) {
        // Kiểm tra xem file có tồn tại hay không
        if(file_exists($path)) {
            // Nếu file tồn tại gọi dưới
            echo 'Kết nối thành công';
            require_once $path;
        } else {
            require_once './modules/errors/404.php';
            // Nếu file không tồn tại
            echo  'Lỗi xin vui lòng thử lại sau';
        }
    } else {
        echo 'Truy cập lỗi';
        require_once './modules/errors/500.php';

    }

?>