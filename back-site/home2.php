<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
}

require_once("php/commons/DBSingleton.php");
$pDatabase = Database::getInstance();

$sql = "SELECT * FROM users WHERE user_id LIKE '" . mysql_real_escape_string($_SESSION['user']) . "'";
$res = $pDatabase->query($sql);
$userRow = mysql_fetch_array($res);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Welcome - <?php echo $userRow['email']; ?></title>
    <!--    <link rel="stylesheet" href="style.css" type="text/css"/>-->
</head>
<body>
<div id="header">
    <div id="left">
        <label>cleartuts</label>
    </div>
    <div id="right">
        <div id="content">
            hi' <?php echo $userRow['username']; ?>&nbsp;<a href="php/logout.php?logout">Sign Out</a>
        </div>
    </div>
</div>
</body>
</html>