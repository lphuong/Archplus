<?php
/**
 * Created by PHUONGLQ-SOFTPLUS.
 * User: Admin
 * Date: 7/24/2015
 * Time: 11:01 PM
 */

session_start();

header("Content-type: application/json"); //'Tell' the browser that it's a JSON response

require_once("commons/DBSingleton.php");
$pDatabase = Database::getInstance();

$user = $_POST['user'];
$pass = $_POST['pass'];

$sql = "SELECT * FROM users WHERE username LIKE '" . mysql_real_escape_string($user) . "'";
$res = $pDatabase->query($sql);

if (false === $res) {
    $response = array('login' => false, 'reasons' => mysql_error());
} else {
    $row = mysql_fetch_array($res);
    if ($row['password'] == md5($pass)) {
        $_SESSION['user'] = $row['user_id'];
        $response = array('login' => true, 'reasons' => '');
    } else {
        $response = array('login' => false, 'reasons' => 'notAdmin');
    }
}
echo json_encode($response); //Encode $returnData to JSON string
