
<?php 

    if(!defined('_HIENU')) {
        die('Truy cập không hợp lệ');
    }

    

    // Set Session
    function setSession($key, $value) {
        if(!empty(session_id())) {
            $_SESSION[$key] = $value;
            return true;
        }

        return false;
    }


    // Lấy dữ liệu từ session
    function getSession($key = '') {
        if(empty($key)) {
            return $_SESSION;
        } else {
            if(isset($_SESSION[$key])) {
                return $_SESSION[$key];
            }
        }
        // Nếu không xảy ra các trường hợp trên mặc định trả về flase
        return false;
    }


    // Xóa session
    function removeSession($key = '') {
        if(empty($key)) {
            // Nếu rỗng xóa toàn bộ session hiện có 
            session_destroy();
            return true;
        } else {
            // Nếu tồn tại
            if(isset($_SESSION[$key])) {
                unset($_SESSION[$key]);
            }
            return true;
        }
        return false;
    }


    // INCLUDES: SESSION
    // Tạo session flash
    function setSessionFlash($key, $value) {
        $key = $key .'Flash';
        $rel = setSession($key, $value);
        return $rel;

    }


    // INCLUDES: SESSION
    // Lấy session flash  
    // Chức năng: lấy dữ liệu ra sử dụng xong rồi xóa
    function getSessionFlash($key) {
        $key = $key .'Flash';
        $rel = getSession($key);
        removeSession($key);
        return $rel;

    }
