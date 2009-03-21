<?php
$username="demo";
$password="password";
if($_POST["username"]==$username && $_POST["password"]==$password){
    session_start();
    $_SESSION["username"]=$_POST["username"];
    $_SESSION["permission"]="admin";
    header("location: main.php");
}else{ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <p>errore</p>
    </body>
</html>
<?php } ?>

