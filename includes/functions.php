
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


    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    // Hàm gửi email 
    function sendMail($emailTo, $subject, $content) {
        
        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        // Kiểm thử đã chạy chưa
        // echo 'ok';
        // die();

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_OFF;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'vi.nguyendaivi@gmail.com';                     //SMTP username
            $mail->Password   = 'hgkqulvsbeeztlzs';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('vi.nguyendaivi@gmail.com', 'Hienu Course');
            $mail->addAddress($emailTo);     //Add a recipient


            //Nội dung email
            $mail->CharSet = 'UTF-8'; // Hỗ trợ tiếng việt
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = $content;


            //Custom connection options
            //Note that these settings are INSECURE
            $mail->SMTPOptions = array(
                'ssl' => [
                    'verify_peer' => true,
                    'verify_depth' => 3,
                    'allow_self_signed' => true,
                ],
            );

            // Kiểm thử
            //    echo 'ok';
            //   die();


            return $mail->send();

            } catch (Exception $e) {
                echo "Gửi thất bại. Mailer Error: {$mail->ErrorInfo}";
            }
        }

?>


