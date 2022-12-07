<?php

$error = "";


if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    
    if(!$DB = new PDO("mysql:host=localhost;dbname=pub","root",""))
    {
        die("could not coonect to the database");
    }

    
    //save to database

    $arr['user_name'] = $_POST['user_name'];
    $arr['names'] = $_POST['name'];
    $arr['gender'] = $_POST['gender'];
    $arr['email'] = $_POST['email'];
    $arr['dob'] = $_POST['dob'];
    $arr['password'] = hash('sha1', $_POST['password']);
    
 $arr['rank'] = "user";
    
    $query = "insert into user (user_name,names,gender,email,dob,password,rank) values (:user_name,:names,:gender,:email,:dob,:password,:rank)";

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
            header("location: login.php");
            die;
        }
    }

}

?>

<?php include("header.php");?>

<h1 style="text-align: center; color: red;">SignUp Form</h1>

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

            background-color: skyblue;
            margin: auto;
            width: 300px;
            padding: 20px;
            border-radius: 10px;
        }
    </style>

<script>
 function checkForName() {
 var targetField = document.getElementById("nameField");
 if (targetField.value.length === 0) {
 alert("Please enter your Name");
 targetField.focus();
 targetField.style.background = "yellow";
 return false;
 }
 targetField.style.background = "white";
 }
        
        
        
        
        
    </script>


<div id="box">
<!--    signup form-->
<form method="Post" onSubmit="return checkForName();">
    
<input class="input" type="text" name="user_name" required placeholder="User Name"><br><br>
    
<input class="input" type="text" name="name" placeholder="Names" id="nameField" ><br><br>
    
    <p style="padding: 10px; margin: 4px;">Gender&nbsp&nbsp<label><select name="gender"><option value="Male">Male</option>
        
        <option value="Female">Female</option></select></label></p>
    
    <input class="input" type="email" name="email" required placeholder="Email"><br><br>
    <input class="input" type="date" name="dob"><br><br>
    <input class="input" type="password" name="password" required placeholder="Password"><br><br>

    <input class="button" type="submit" value="SignUp"><br><br>
    
</form>
</div><br><br>
<!--cautioning user-->

<div style="width:100%;border-top: 3px solid #5fa625; padding: 3px;font-size: 20px;color: #000000 !important;text-align: center;font-size:11px !important; font-family: Arial, Helvetica, sans-serif !important;">
		We and our partners share information on your use of this website to help improve your experience. 

	</div>
<?php include("footer.php");?>
