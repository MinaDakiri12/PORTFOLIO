<?php 
//Helper Functions

function redirect($location)
{
    header("location: $location");
}

// Set up your messgae
function set_message($type,$msg)
{
    if($type === "error"){
        !empty($msg) ? $_SESSION['message-err'] = $msg : $msg = "";
    }   
    if($type === "info"){
        !empty($msg) ? $_SESSION['message-info'] = $msg : $msg = "";
    }   
    if($type === "success"){
        !empty($msg) ? $_SESSION['message-success'] = $msg : $msg = "";
    }   
    
}

// Display your message

function display_msg()
{
    if (isset($_SESSION['message-err'])) {
        echo "<script>toastr.error('{$_SESSION['message-err']}', 'Error');</script>";
        unset($_SESSION['message-err']);
    }
    if (isset($_SESSION['message-info'])) {
        echo "<script>toastr.info('{$_SESSION['message-info']}', 'info');</script>";
        unset($_SESSION['message-info']);
    }
    if (isset($_SESSION['message-success'])) {
        echo "<script>toastr.success('{$_SESSION['message-success']}', 'success');</script>";
        unset($_SESSION['message-success']);
    }
}

//**------  Handling  Images Uploads-------*/
function upload_image($name, &$cover_id)
{
    global $pdo;
    //**------  Handling  Image -------*/
    if (!empty($_FILES[$name]['name'])) {

        //Insert the request information
        //into our media and event table.
        $cover_pic_name = $_FILES[$name]['name'];
        $ext = pathinfo($cover_pic_name, PATHINFO_EXTENSION);
        $cover_pic_type = $_FILES[$name]['type'];
        $cover_pic_size = $_FILES[$name]['size'];
        $size = ($cover_pic_size / 1000) . "KB";
        $cover_pic_temp = $_FILES[$name]['tmp_name'];
        $upload_path = '../uploads/'; //setting up ulpoad folder
        $uploadfile = $upload_path . basename($cover_pic_name);
        $dest = '../uploads/thumbnails/' . basename($cover_pic_name);
        // cover image validation, size and extension
        if ($cover_pic_type == "image/jpg" || $cover_pic_type = "image/jpeg" || $cover_pic_type = "image/png" || $cover_pic_type = "image/gif") // check file extension
        {
            // You should also check filesize here.
            if ($cover_pic_size < 2000000) { //check if file size below 2mb
                move_uploaded_file($cover_pic_temp, $uploadfile); // move upload file temperory directory to your upload folder
                make_thumb($uploadfile, $ext, $dest, 100);
            } else {
                set_message('error', 'Your file To large PLease Upload 5mb size');
            }

        } else {
            set_message('error', 'Upload jpg, jpeg, png, gif file format..... check file extension');
        }
        //The SQL statement.
        $image_query = "INSERT INTO `media` (`id`, `file_name`, `file_type`, `file_size`, `file_location`, `media_type`, `thumbnail`, `timestamp`, `is_deleted`) VALUES (NULL, ?, ?, ?, ?, 'image', ?, CURRENT_TIMESTAMP, '0')";
        //Prepare our INSERT SQL statement.
        $statment = $pdo->prepare($image_query);
        //Execute the statement and insert the data.
        $statment->execute([$cover_pic_name, $ext, $size, $uploadfile, $dest]);
        //Get the ID of the row we just inserted.
        $cover_id = $pdo->lastInsertId();
    } else {
        $cover_id = 1;
    }
}

/*Function to create thumbnails*/
function make_thumb($src,$ext , $dest, $desired_width) {
    /* read the source image */
    $ext == 'png' ? $source_image = imagecreatefrompng($src) : $source_image = imagecreatefromjpeg($src);
    // $source_image = imagecreatefromjpeg($src);
    $width = imagesx($source_image);
    $height = imagesy($source_image);
  
    /* find the “desired height” of this thumbnail, relative to the desired width  */
    $desired_height = floor($height * ($desired_width / $width));
  
    /* create a new, “virtual” image */
    $virtual_image = imagecreatetruecolor($desired_width, $desired_height);
  
    /* copy source image at a resized size */
    imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
  
    /* create the physical thumbnail image to its destination */
    imagejpeg($virtual_image, $dest);
  }




// require_once('component/loginComponent.php');




//function for sending emails
function send_email($message, $email){
    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.googlemail.com';  //gmail SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'dakrimailers@gmail.com';   //username
        $mail->Password = '';   //password
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;                    //smtp port

         

        // HTML Message Ends here

        $mail->setFrom('2aimailerstmp@gmail.com', 'password reset');
        $mail->addAddress($email, 'password reset');
     
     
        $mail->isHTML(true);
        $mail->Subject = "Forgot password Portfolio";
        $mail->Body    = $message;
     
        
        
        if($mail->send()){
        // Message if mail has been sent
        echo "<script>toastr.success('password reset link has been sent', 'success');</script>";
        }else{
            // Message if mail has been not sent
            echo "<script>toastr.error('Try again later', 'Error');</script>";       
        }
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: '. $mail->ErrorInfo;
    }
}


require_once('component/loginComponent.php');
require_once('component/projectsComponent.php');
require_once('component/testimonialsComponent.php');


?>
