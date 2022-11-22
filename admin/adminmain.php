<?php
session_start();

include 'nwloginvariables.php';

$mysql = new mysqli(
    $host,
    $userid,
    $userpw,
    $db
);

if($mysql->connect_errno) {
    echo "db connection error : " . $mysql->connect_error;
    exit();
}
?>
<htmL>
<title>Search Page</title>
<header>
    <link rel="stylesheet" href="./css/style.css">
</header>

<body id="body1">
<div id="nav">
    <br>&nbsp
    <img src="./css/Of-Course-Logo.png" id="logo">
    <a href="userprofile.php" class="navitem">
        USER PROFILES
    </a><br>
    <a href="wellnessblog.php" class="navitem">
        WELLNESS BLOG
    </a><br>
    <a href="sitepurpose.php" class="navitem">
        SITE PURPOSE
    </a><br>
    <a href="class_edit.php.php" class="navitem">
        CLASSES
    </a><br>
    <a href="review_edit.php" class="navitem">
        REVIEWS
    </a><br>
</div>

<div id="header">
    <h1 style="margin-bottom: -10px;">ADMIN PAGE</h1><br>
    <br>
</div>
<br>


<div id="mainbox">
    <div id="box1">
        <p1>EDITING OPTIONS</p1>
    </div>
    <div id="mainadmin">
        <p1>USER PROFILES:</p1>
        <a href="userprofile_add.php" class="adminbutton">
            ADD
        </a>
        <a href="userprofile_edit.php" class="adminbutton">
            EDIT
        </a>
        <a href="userprofile_delete.php" class="adminbutton">
            DELETE
        </a><br><br>
        <p1>WELLNESS BLOG:</p1>
        <a href="wellnessblog_add.php" class="adminbutton">
            ADD
        </a>
        <a href="wellnessblog_edit.php" class="adminbutton">
            EDIT
        </a>
        <a href="wellnessblog_delete.php" class="adminbutton">
            DELETE
        </a><br><br>
        <p1>SITE PURPOSE:</p1>
        <a href="sitepurpose_edit.php" class="adminbutton">
            EDIT
        </a><br><br>
        <p1>CLASSES:</p1>
        <a href="class_add.php" class="adminbutton">
            ADD
        </a>
        <a href="class_edit.php" class="adminbutton">
            EDIT
        </a>
        <a href="class_delete.php" class="adminbutton">
            DELETE
        </a><br><br>
        <p1>REVIEWS:</p1>
        <a href="review_add.php" class="adminbutton">
            ADD
        </a>
        <a href="review_edit.php" class="adminbutton">
            EDIT
        </a>
        <a href="review_delete.php" class="adminbutton">
            DELETE
        </a>
    </div>
</body>
</htmL>
