
<?php 

    if(!defined('_HIENU')) {
        die('Truy cập không hợp lệ');
    }

    // Hàm truy vấn nhiều dòng dữ liệu     
    function getAll($sql) {
         // Truy vấn 
         global $conn;
            $stm = $conn -> prepare($sql);
            $stm -> execute();

            // Lấy dữ liệu trả về dưới dạng bảng kết hợp
            // key chính là tên cột
            // Lấy ra 1 dòng dữ liệu
            $result = $stm -> fetchAll(PDO::FETCH_ASSOC);

            return $result;
    }

    // Truy vấn 1 dòng dữ liệu 
    function getOne($sql) {
         // Truy vấn 
         global $conn;
            $stm = $conn -> prepare($sql);
            $stm -> execute();

            // Lấy dữ liệu trả về dưới dạng bảng kết hợp
            // key chính là tên cột
            // Lấy ra 1 dòng dữ liệu
            $result = $stm -> fetch(PDO::FETCH_ASSOC);

            return $result;
    }