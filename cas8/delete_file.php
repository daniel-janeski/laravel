<?php
if(isset($_GET['file'])) {
    $fileName = $_GET['file'];
    if(file_exists("avatars/$fileName")){
        unlink("avatars/$fileName");
    }
}
header('location: upload.php');


?>