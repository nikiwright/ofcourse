<?php
session_start();

include '../nwloginvariables.php';

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

$sql = "INSERT INTO fun_classes
        (courseID, className, classBio, classDepartment, instructorName, instructorRating, school_id, interest_id, weekday_id, unit_id)
        VALUES
        ('" . $_REQUEST["courseid"] . "',
        '" . $_REQUEST["classname"] . "',
        '" . $_REQUEST["classbio"] . "',
        '" . $_REQUEST["classdepartment"] . "',
        '" . $_REQUEST["instructorname"] . "',
        '" . $_REQUEST["instructorrating"] . "',
        " . $_REQUEST["school"] . ",
        " . $_REQUEST["interest"] . ",
        " . $_REQUEST["weekday"] . ",
        " . $_REQUEST["unit"] . ")";
echo "<hr>" . $sql;

$results = $mysql->query($sql);

if(!$results) {
    echo "ERROR! " . $mysql->error;
    echo "<hr>" . $sql;
} else {
    echo "<br>SUCCESS! Class added to fun_classes db.";
}