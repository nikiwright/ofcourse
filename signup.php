<?php

include 'nwloginvariables.php';

//CAN THE USERS DATABASE BE ACCESSED WITH THESE LOGIN CREDENTIALS?

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

session_start();
?>

<html>
<head>
    <title>Sign Up Page</title>
    <link rel="stylesheet" href="./css/style.css">
    <style>
        body {
            background-color:#9BA2FF;
        }

        #box1 {
            background-color:#7BC950;
        }

        #submit {
            background-color:#7BC950;
        }
        h3{
            text-align: center;
        }
    </style>
</head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-7HR3PWKYET"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-7HR3PWKYET');
</script>
<body>
<?php
include 'sitenav.php';
?>

<h1 id="resultheader">SIGN UP</h1><br>

<div id="mainbox">
    <div id="box1">
        Already have an account? <a href="login.php"> Log In </a>
    </div>
    <div id="box2">

        <form action ="" method="post">
            <table width="250" border="0">
                <tr>
                    <td> First Name: </td>
                    <td><input type="text" name="firstName" required></td>
                </tr>
                <tr>
                    <td> Last Name: </td>
                    <td><input type="text" name="lastName" required></td>
                </tr>
                <tr>
                    <td> Username: </td>
                    <td><input type="text" name="username" minlength="5" required></td>
                </tr>
                <tr>
                    <td> Password: </td>
                    <td><input type="text" name="password" minlength="8" required></td>
                </tr>
                <tr>
                    <td> <br> <input type="submit" name="signup" value="SIGN UP" id="submit" class="button"></td>
                    <td></td>
                </tr>

            </table>


        </form>

    <?php


    if ($_SESSION['logged_in'] == "yes")   // Checking whether the session is already there or not
    {
        // all good
//            echo "Logged in!";
//            print_r($_SESSION);
        header('Location:user_profile.php');

    }

      if ((empty($_POST['firstName']))
        &(empty($_POST['lastName']))
        &(empty($_POST['username']))
        &(empty($_POST['password']))) {
        echo "";
        exit();
    } else {

          $sql2 = "SELECT * FROM users WHERE 
                        username='" . $_POST['username'] . "'";

          $results2 = $mysql->query($sql2);

          if (!$results2) {
              echo "<hr>Your SQL:<br> " . $sql2 . "<br><br>";
              echo "SQL Error: " . $mysql->error . "<hr>";
              exit();
          }

          if ($results2->num_rows === 1) {

              $row2 = mysqli_fetch_array($results2);

              if ($row2['username'] ===  $_POST['username']) {
                  echo "Sorry! This username is already taken, try another one. If this is your account, " .
                      "click" . "<a href='login.php'> here </a>" . " to log in!";
                  exit();

              } else {
                  $sql = "INSERT INTO users 
                 (user_firstName, user_lastName, username, password) 
    
                 VALUES ('" . $_POST['firstName'] . "',
                 '" . $_POST['lastName'] . "',
                 '" . $_POST['username'] . "',
                 '" . $_POST['password'] . "' )";

                  $results = $mysql->query($sql);

                  if (!$results) {
                      echo "<hr>Your SQL:<br> " . $sql . "<br><br>";
                      echo "SQL Error: " . $mysql->error . "<hr>";
                      exit();
                  } else {
//                      echo $results;
                      echo "You have successfully created an account! ";
                      echo "Click" . "<a href='login.php'> here </a>" . " to log in!";
                  }

              }

          } else {
              $sql = "INSERT INTO users 
                 (user_firstName, user_lastName, username, password) 
    
                 VALUES ('" . $_POST['firstName'] . "',
                 '" . $_POST['lastName'] . "',
                 '" . $_POST['username'] . "',
                 '" . $_POST['password'] . "' )";

              $results = $mysql->query($sql);

              if (!$results) {
                  echo "<hr>Your SQL:<br> " . $sql . "<br><br>";
                  echo "SQL Error: " . $mysql->error . "<hr>";
                  exit();
              } else {
//                  echo $results;
                  echo "You have successfully created an account! ";
                  echo "Click" . "<a href='login.php'> here </a>" . " to log in!";
              }

          }
      }
    ?>

    </div>
</div>




</body>


</html>