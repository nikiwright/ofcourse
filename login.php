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
?>


<html>
<head>
    <title> Login Page </title>
    <link rel="stylesheet" href="./css/style.css">
    <style>
        body {
            background-color:#9BA2FF;
        }

        #box1 {
            background-color:#FF5E5B;
        }

        #submit {
            background-color:#FF5E5B;
        }

    </style>
</head>

<body id="loginpage">
<?php
include 'sitenav.php';
?>

Session Variables: <em><?= print_r($_SESSION) ?></em>

<h1 id="resultheader">LOG IN</h1><br>
<div id="mainbox">
    <div id="box1">
        Need an account? <a href="signupform.php"> Sign Up </a>
    </div>
    <div id="box2">
        <form action="" method="post">

            <table width="200" border="0">
                <tr>
                    <td> UserName</td>
                    <td><input type="text" name="user"></td>
                </tr>
                <tr>
                    <td> PassWord</td>
                    <td><input type="password" name="pass"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="login" value="LOGIN" id="submit" class="button"></td>
                    <td></td>
                </tr>
            </table>
        </form>

        <?php
        session_start();   // session starts

        $user = ($_POST['user']);
        $pass = ($_POST['pass']);

        if ($_SESSION['loggedin'] == "yes")   // Checking whether the session is already there or not
        {
            // all good
            echo "Logged in!";
            print_r($_SESSION);
            header('Location:user_profile.php');

        } else {

            if (empty(($user)&($pass))) {

                echo "User Name and Password is required";
                exit();

            } else {
                $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
                $results = $mysql->query($sql);

                if (!$results) {
                    echo "<hr>Your SQL:<br> " . $sql . "<br><br>";
                    echo "SQL Error: " . $mysql->error . "<hr>";
                    exit();
                }

                if ($results->num_rows === 1) {

                    $row = mysqli_fetch_array($results);

                    if ($row['username'] === $user && $row['password'] === $pass) {

                        $_SESSION['loggedin'] = "yes";
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['first'] = $row['user_firstName'];
                        $_SESSION['last'] = $row['user_lastName'];
                        $_SESSION['id'] = $row['user_id'];
                        header("refresh: 0.5");
                        exit();

                    } else {
                        echo "invalid Username or Password";
                        exit();
                    }
                } else {
                    echo "Invalid Username or Password, please try again.";
                    exit();
                }

            }

        }
        ?>
    </div>
</div>



</body>
</html>

