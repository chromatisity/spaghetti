<?php
session_start();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" type="text/css" href="stylesheet1.css">
    <script type="text/javascript" src="js.js"></script>
    <title></title>
    
</head>
<body>
    <form method="POST">
        <div id="Wrapper">
            <a href="index.php">register</a>
            <div>Username :<input type="text" name="username"/></div>
            <div>Password :<input type="text" name="password"/></div>
            <input type="submit" value="Login" />
        </div>
            <?php
           
                $DBconnection = mysqli_connect('127.0.0.1', 'pesho', 'maina123', 'users');
                if (!$DBconnection) {
                    echo 'no connection to db';
                } else {

                    if ($_POST) {
                        if ($_POST['username'] ==null && $_POST['password'] !=null) {
                             echo '<div id="error">Enter a username!</div>';
                        }
                        elseif ($_POST['username'] !=null && $_POST['password']==null) {
                             echo '<div id="error">Enter a password!</div>';
                        }
                        elseif ($_POST['username']==null && $_POST['password'] == null) {
                            echo '<div id="error">Both fields are empty!</div>';
                        }
                        
                        if ($_POST['username'] != null && $_POST['password'] != null) {
                            $username = trim($_POST['username']);
                            $username = mysqli_real_escape_string($DBconnection, $username);
                            $password = $_POST['password'];
                            mysqli_set_charset($DBconnection, 'utf8');
                            $password = md5($password);
                            $usernameAndPassword = " ('" . $username . "','" . $password . "')";


                            $result = mysqli_query($DBconnection, "SELECT * FROM `registry` WHERE username='" . $username . "'");
                            $row = mysqli_fetch_assoc($result);
                            if ($password == $row['password']) {
                                $_SESSION['username']=$username;
                                header('Location: userprofile.php');
                            }
                           else {
                                echo '<div id="error">Password is incorrect!</div>';
                           }
                        }
                    }

                    mysqli_close($DBconnection);
                }
            ?>
            
    </form>
    <canvas id="canvas">

        </canvas>
</body>
</html>

