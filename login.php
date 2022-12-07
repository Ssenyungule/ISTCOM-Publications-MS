<?php

session_start();

$error = "";


if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    
    if(!$DB = new PDO("mysql:host=localhost;dbname=pub","root",""))
    {
        die("could not coonect to the database");
    }

    
    //read from database

    // $arr['name'] = $_POST['Name'];
    $arr['email'] = $_POST['Email'];
    $arr['password'] = hash('sha1', $_POST['Password']);
    
    // $arr['rank'] = "user";
    
    $query = "select * from user where email = :email && password = :password limit 1";

    $stm = $DB->prepare($query);

    if($stm)
    {
        $check = $stm->execute($arr);
        if($check){
            $data = $stm->fetchAll(PDO::FETCH_ASSOC);
            if(is_array($data) && count($data) > 0)
            {
                $_SESSION['myid'] = $data[0]['user_name'];
                $_SESSION['myname'] = $data[0]['names'];
                
                $_SESSION['myrank'] = $data[0]['rank'];

            }else{
                $error = "Wrong username or password";
            }
        }

        
        if($error == "")
        {
            
            header("location: dashboard.html");
            die;
        }
    }

}

?>

<?php include("header.php");?>

<h1 style="text-align: center; color: blue;">Login</h1>

<?php

if($error != "")
{
    echo "<br><span style='color:red'>$error</span><br><br>";

}

?>

<style type="text/css">
    .input {
        border-radius: 5px;
        border: solid thin grey;
        padding: 10px;
        margin: 4px;
    }


    .button {
        border-radius: 5px;
        border: solid thin grey;
        padding: 10px;
        margin: 4px;
        cursor: pointer;
    }

    #box {

        background-color: darkcyan;
        margin: auto;
        width: 300px;
        padding: 20px;
        border-radius: 10px;
    }

</style>

<div id="box">
    <form method="POST">

        <!-- <input class="input" type="text" name="Name" required placeholder="Name"><br><br> -->
        <input class="input" type="email" name="Email" required placeholder="Email"><br><br>
        <input class="input" type="password" name="Password" required placeholder="Password"><br><br>

        <input class="button" type="submit" value="Login"><br><br>

    </form>
</div><br><br>

<div style="width:100%;border-top: 3px solid #5fa625; padding: 3px;font-size: 20px;color: #000000 !important;text-align: center;font-size:11px !important; font-family: Arial, Helvetica, sans-serif !important;">
    Hopefully you had a great experience. Feel free to visit us again at your convinience. :)

</div>
<?php include("footer.php");?>
