<?php
if($_FILES['upload']['error'] === 0) {

    $target_dir = "img/";
    $target_file_and_dir = $target_dir . basename($_FILES["upload"]["name"]);
    $upload_passed = true;

    // Check to see if it is an image
    if (getimagesize($_FILES["upload"]["tmp_name"]) === false) {
        $upload_passed = false;
    }

    // Check to see if it exists of not
//    if (file_exists($target_file_and_dir)) {
//        $upload_passed = false;
//    }

    if ($upload_passed === true) {
        // Upload image to the folder
        if(move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file_and_dir)){
            echo '<div class="alert alert-primary" role="alert">' . basename($_FILES["upload"]["name"]) . ' is uploaded</div>';

        }else{
            echo '<div class="alert alert-danger" role="alert">Failed to upload image..</div>';
        }
    }
}
else
{
    echo "<div class='alert alert-warning' role='alert'>File failed to upload because of " . $_FILES['upload']['error'] . "!Failed</div>";
}
