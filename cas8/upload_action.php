<?php
session_start();
    $errors = array(
        UPLOAD_ERR_INI_SIZE => "File is larger than maximum upload size.",
        UPLOAD_ERR_FORM_SIZE => "File is larger than max post size.",
        UPLOAD_ERR_PARTIAL => "File partialy uploaded",
        UPLOAD_ERR_NO_FILE => "No files selected",
        UPLOAD_ERR_NO_TMP_DIR => "No tmp dir",
        UPLOAD_ERR_CANT_WRITE => "Upload folder permission errors",
        UPLOAD_ERR_EXTENSION => "Extension not supported",
    );
    if(isset($_POST['submit'])){
        if(isset($_FILES['avatar']) && $_FILES['avatar']['error'] == 0){
            move_uploaded_file($_FILES['avatar']['tmp_name'], "avatars/".$_FILES['avatar']['name']);
            $_SESSION['upload_success'] = "File uploaded successfully";
        }elseif ($_FILES['avatar']['error'] != 0){
            $_SESSION['upload_error'] = $errors[$_FILES['avatar']['error']];
        }
       header("location: upload.php");
    }
?>