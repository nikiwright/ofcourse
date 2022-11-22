<?php

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

session_start();   // session starts
?>


<html>
<head>
    <title> User Profile </title>
    <link rel="stylesheet" href="./css/style.css">
    <style>
        body {
            background-color:#9BA2FF;
        }

        #box1 {
            background-color:#FFC72C;
            color: black;
        }

        #a {
            color: black;
            font-weight: bold;
        }

        #submit {
            background-color: #FF5E5B;
        }

    </style>
</head>
<body>
<?php
include 'sitenav.php';
?>

<!--Session Variables: <em>--><?//= print_r($_SESSION) ?><!--</em>-->

<h1 id="resultheader">USER PROFILE</h1><br>
<div id="mainbox">
    <div id="box1">
        <?php
        if ($_SESSION['loggedin'] == "yes") {
       echo "Hello ". $_SESSION['first'] . "!". "<br>". "You are logged in.";
        } else {
           echo "You are not logged in. Click" ."<a id='a' href='login.php'> here </a>" . " to log in/signup!";
        }
        ?>
    </div>
    <div id="box2">
        <?php
        if ($_SESSION['loggedin'] == "yes") {
            echo "First Name: " . $_SESSION['first'] . "<br>" .
                "Last Name: " . $_SESSION['last'] . "<br>" .
                "Username: " . $_SESSION['username'] . "<br>";

            echo "<a href='logout.php'>"."<br>".
                "<input type='submit' name='logout' value='LOGOUT' id='submit' class='button'>".
                "</a>";

        } else {
         echo "Log in/ sign up to view your profile!";
        }
        ?>
    </div>
</div>
</body>
</html>