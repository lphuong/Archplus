<?php
/**
 * Created by PHUONGLQ-SOFTPLUS.
 * User: Admin
 * Date: 7/26/2015
 * Time: 12:10 AM
 */

session_start();

header("Content-type: application/json"); //'Tell' the browser that it's a JSON response

require_once("commons/DBSingleton.php");
$pDatabase = Database::getInstance();

$inputPostTitle = $_POST['inputPostTitle'];
$inputPostCategory = $_POST['inputPostCategory'];
$inputPostUploader = $_POST['inputPostUploader'];
$inputPostContent = $_POST['inputPostContent'];
if (!empty($_POST['inputPostUpdateToApp'])) {
    $inputPostUpdateToApp = $_POST['inputPostUpdateToApp'];
} else {
    $inputPostUpdateToApp = "off";
}

$sql = "INSERT INTO posts (post_title, post_category, post_uploader, post_content, post_is_new) VALUES ('$inputPostTitle', '$inputPostCategory', '$inputPostUploader', '$inputPostContent', '$inputPostUpdateToApp')";
$res = $pDatabase->query($sql);

if ($res === false) {
    $response = array('post' => false, 'reasons' => mysql_error());
} else {
    $response = array('post' => true, 'reasons' => '');
}
echo json_encode($response); //Encode $returnData to JSON string