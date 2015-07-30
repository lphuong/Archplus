<?php
/**
 * Created by PHUONGLQ-SOFTPLUS.
 * User: Admin
 * Date: 7/26/2015
 * Time: 8:12 PM
 */
session_start();

header("Content-type: application/json"); //'Tell' the browser that it's a JSON response

function getDB($db)
{
    require_once("../php/commons/DBSingleton.php");
    $pDatabase = Database::getInstance();

    $sql = "SELECT * FROM " . $db;
    $res = $pDatabase->query($sql);

    $rows = array();

    while ($row = mysql_fetch_object($res)) {
        $rows = array_merge(array($row), $rows);
    }

    return $rows;
}


// This is the API to get json by action.

function getPostList()
{
    $postList = getDB("posts");

    return $postList;
}

function get_user_by_id($id)
{
    $user_info = array();

    // make a call in db.
    switch ($id) {
        case 1:
            $user_info = array("first_name" => "Marc", "last_name" => "Simon", "age" => 21); // let's say first_name, last_name, age
            break;
        case 2:
            $user_info = array("first_name" => "Frederic", "last_name" => "Zannetie", "age" => 24);
            break;
        case 3:
            $user_info = array("first_name" => "Laure", "last_name" => "Carbonnel", "age" => 45);
            break;
    }

    return $user_info;
}

function get_user_list()
{

    $user_list = array(array("id" => 1, "name" => "Simon"), array("id" => 2, "name" => "Zannetie"), array("id" => 3, "name" => "Carbonnel")); // call in db, here I make a list of 3 users.

    return $user_list;
}

$possible_url = array("get_posts_list", "get_user");

$value = "An error has occurred";

if (isset($_GET["action"]) && in_array($_GET["action"], $possible_url)) {
    switch ($_GET["action"]) {
        case "get_posts_list":
            $value = getPostList();
            break;
        case "get_user":
            if (isset($_GET["id"]))
                $value = get_user_by_id($_GET["id"]);
            else
                $value = "Missing argument";
            break;
    }
}

exit(json_encode($value));