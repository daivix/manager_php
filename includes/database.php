
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

    // Đếm số vòng trả về 
    function getRows($sql) {
            global $conn;
            $stm = $conn -> prepare($sql);
            $stm -> execute();
            return  $stm -> rowCount();
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

    // Insert dữ liệu
    function insert($table, $data) {
        global $conn;

        $keys = array_keys($data);
        $cot = implode(',', $keys);
        $place = ':'.implode(',:', $keys);
       
        $sql = "INSERT INTO $table ($cot) VALUES ($place)";
           //:name ->placeholder

        //   echo $sql;
          $stm = $conn->prepare($sql); //SQL Injection

          // Thực hiện câu lệnh
          $rel = $stm -> execute($data);
        //   var_dump($rel);
    }

    // Update dữ liệu 
    // Điều kiện nếu bỏ trống thì nó sẽ update toàn bộ
    function update($table, $data, $condition = '') {
        global $conn;
        $update = '';
        // $key là tên các cột
        foreach($data as $key => $value) {
            $update .= $key . '=:' .$key .','; 

        }
        $update = trim($update, ',');
    

        if(!empty($condition)) {
            $sql = "UPDATE $table SET $update WHERE $condition";
        } else {
            $sql = "UPDATE $table SET $update";
        }
      

            // Chuẩn bị câu lệnh sql
            $tmp = $conn->prepare($sql);

            // Thực thi câu lệnh 
            $tmp -> execute($data);
    }



    // Hàm xóa dữ liệu
    function delete($table, $ccondition = '') {

        global $conn;
        if(!empty($condition)) {
            $sql = "DELETE FROM $table WHERE $condition";
        } else {
            $sql = "DELETE FROM $table";
        }


            $stm = $conn -> prepare($sql);
            $stm -> execute();
    }


    // Hàm lấy ID dòng dữ liệu mới insert
    function lastID() {
        global $conn;
        return $conn -> lastInsertId();
    } 