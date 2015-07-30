<?php
/**
 * Created by PHUONGLQ-SOFTPLUS.
 * User: Admin
 * Date: 7/26/2015
 * Time: 1:09 AM
 */
//if (isset($_FILES["file"]["type"])) {
//    $validextensions = array("jpeg", "jpg", "png");
//    $temporary = explode(".", $_FILES["file"]["name"]);
//    $file_extension = end($temporary);
//    if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
//        ) && ($_FILES["file"]["size"] < 100000)//Approx. 100kb files can be uploaded.
//        && in_array($file_extension, $validextensions)
//    ) {
//        if ($_FILES["file"]["error"] > 0) {
//            echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
//        } else {
//            if (file_exists("uploads/" . $_FILES["file"]["name"])) {
//                echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
//            } else {
//                $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
//                $targetPath = "uploads/" . $_FILES['file']['name']; // Target path where file is to be stored
//                move_uploaded_file($sourcePath, $targetPath); // Moving Uploaded file
//                echo "<span id='success'>Image Uploaded Successfully...!!</span><br/>";
//                echo "<br/><b>File Name:</b> " . $_FILES["file"]["name"] . "<br>";
//                echo "<b>Type:</b> " . $_FILES["file"]["type"] . "<br>";
//                echo "<b>Size:</b> " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
//                echo "<b>Temp file:</b> " . $_FILES["file"]["tmp_name"] . "<br>";
//            }
//        }
//    } else {
//        echo "<span id='invalid'>***Invalid file Size or Type***<span>";
//    }
//}
//
//foreach ($_FILES["images"]["error"] as $key => $error) {
//    if ($error == UPLOAD_ERR_OK) {
//        $name = $_FILES["images"]["name"][$key];
//        move_uploaded_file( $_FILES["images"]["tmp_name"][$key], "uploads/" . $_FILES['images']['name'][$key]);
//    }
//}

header("Content-type: application/json"); //'Tell' the browser that it's a JSON response

$uploads_dir = '../uploads/';
$today_dir = date("Ymd") . '/';

$uploads = $uploads_dir . $today_dir;
if (!file_exists($uploads)) {
    mkdir($uploads, 0777, true);
}
foreach ($_FILES["images"]["error"] as $key => $error) {
    if ($error == UPLOAD_ERR_OK) {
        $tmp_name = $_FILES["images"]["tmp_name"][$key];
        $name = $_FILES["images"]["name"][$key];
        if (move_uploaded_file($tmp_name, $uploads . $name))
            $response = array('upload' => true, 'filename' => $today_dir . $name);
    }
}
echo json_encode($response);