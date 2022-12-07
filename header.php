
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ISTCOM publication</title>
</head>
<style type="text/css">

    body{
        font-family: helvetica;
        font-size: 13px;
    }

    header{
        height:30px;
        padding:10px;
        background-color: #18ebf5;
        color: white;
       
    }

    header a{
        color:white;
        text-decoration: none;
    }
</style>
<body>

   <span><?php 
   if(isset($_SESSION['myname']))
   {
       echo "Hello, " . $_SESSION['myname'];
   }
   ?></span>