<?php
if($_FILES['upload']['error'] === 0) {

    $target_dir = "video/";
    $target_file_and_dir = $target_dir . basename($_FILES["upload"]["name"]);
    // Check to see if it exists of not
//    if (file_exists($target_file_and_dir)) {
//        $upload_passed = false;
//    }


    // Upload image to the folder
    if(move_uploaded_file($_FILES["upload"]["tmp_name"], $target_file_and_dir)){
        echo '<div class="alert alert-primary" role="alert">' . basename($_FILES["upload"]["name"]) . ' is uploaded</div>';

    }else{
        echo '<div class="alert alert-danger" role="alert">Failed to upload video..</div>';
    }

}
else
{
    echo "<div class='alert alert-warning' role='alert'>File failed to upload because of " . $_FILES['upload']['error'] . "</div>";
}
