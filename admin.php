<?php 

session_start();

include("access.php");

access('ADMIN');

include("header.php");

?>

<style>
    
    body {
            background-color: lightgoldenrodyellow;
            font-family: sans-serif;
            font-size: auto;
    }
    
</style>

<br><br><a href="dashboard.html">Back to Dasboard</a> &nbsp &nbsp <a href="logout.php">Logout</a> &nbsp &nbsp <a href="viewPub.php">View Publications</a>

<h1>This is the Admin page</h1>

<br>

<p>Please while here, know it that with Great power comes great responsibility</p><br><br>

<?php

$error = "";


if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    
    if(!$DB = new PDO("mysql:host=localhost;dbname=pub","root",""))
    {
        die("could not coonect to the database");
    }

    
    //save to database

    $arr['pub_name'] = $_POST['pub_name'];
    $arr['date'] = $_POST['date'];

    $query = "insert into publication (pub_name,date) values (:pub_name,:date)";

    $stm = $DB->prepare($query);

    if($stm)
    {
        $check = $stm->execute($arr);
        if(!$check)
        {
            $error = "could not save to database";
        }

        if($error == "")
        {
            header("location: viewPub.php");
            die;
        }
    }

}

?>

<?php 

//include("header.php");

?>

<h1 style="text-align: center; color: green;">Publication Entry Form</h1>

<?php

if($error != "")
{
    echo "<br><span style='color:red'>$error</span><br><br>";

}

?>

<style type="text/css">
    
    .input{
border-radius: 5px;
border: solid thin grey;
padding: 10px;
margin: 4px;
    }

        
    .button{
border-radius: 5px;
border: solid thin grey;
padding: 10px;
margin: 4px;
cursor: pointer;
    }
    
#box{

            background-color: grey;
            margin: auto;
            width: 300px;
            padding: 20px;
            border-radius: 10px;
        }
    </style>
<div id="box">
    
<!--    Publication form-->
    
<form method="POST">
    
 <input class="input" type="text" name="pub_name" required placeholder="Publication Name"><br><br>

    <input class="input" type="date" name="date"><br><br>
    
    <input class="button" type="submit" value="Save" onclick="alert('Publication added to database!')"><br><br>
    
</form>
</div><br><br>


<?php include("footer.php");?>
