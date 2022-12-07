<?php

include ("config.php");
$pub_id = $_GET["pub_id"];
//echo $pno;

$sql = "SELECT * FROM publication WHERE pub_id = '$pub_id';";
$row = mysqli_fetch_assoc(mysqli_query($con, $sql));

if(isset($_POST["submit"]))
{    
   // include("config.php");
    $pub_name = $_POST["pub_name"];
    $date = $_POST["date"];
    
    $sql = "update publication set pub_name = '$pubname',date = '$date'";
    //echo $sql;
    
    if(mysqli_query($con, $sql)){
        
        ?>
    <script type="text/javascript">
        alert("Publication Successfully edited");
        window.location = "viewPub.php";
    
    </script>
    
    <?php
    }
        
}

?>

<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="">
    
    <script>
    
        function myOnClickFn(){
            
            document.location.href="viewPub.php";
        }
    
    </script>
    
    <style type="text/css">
    
    .input{
border-radius: 5px;
border: solid thin grey;
padding: 10px;
margin: 4px;
    }

        
    .button{
border-radius: 5px;
border: solid thin;
padding: 10px;
margin: 4px;
cursor: pointer;
    }
    
#box{

            background-color: cadetblue;
            margin: auto;
            width: 300px;
            padding: 20px;
            border-radius: 5px;
        }
    </style>
    
</head>

<body>
    
    
     <h1 style="text-align: center; color: green;">Publication Edit Form</h1>
    
<div id="box">
    
    
<!--    Publication form-->
    
<form method="POST">
    
    <table><tr>
        <td>Publication Name</td><td>
 <input class="input" type="text" name="pub_name"  value="<?php echo $row['pub_name'];?>">
        </td></tr>

        <tr>
        <td>Date of Publication</td><td>
 <input class="input" type="date" name="date" value="<?php echo $row['date'];?>">
        </td></tr>

        <tr><td>
    <input class="button" type="submit" value="Edit" onclick="alert('Publication successfully edited!')">
            </td></tr>
    </table>
    
</form>
</div><br><br>

<!--    <a href="viewPub.php" style="text-align: center;">View changes</a>-->
    
</body>
</html>

