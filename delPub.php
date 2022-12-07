<?php

include ("config.php");
$pub_id = $_GET["pub_id"];
//echo $pno;
$sql = "DELETE FROM publication WHERE pub_id = '$pub_id';";

?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <p>If redirected, click <a href="viewPub.php">here</a></p>
</body>
</html>
