<?php
    session_start();
    $data = file_get_contents("users.json");
    $array = json_decode($data ,true);
    if(isset($_POST["Username"]) && isset($_POST["Password"])){

            foreach($array as $ar){
                if($ar["username"] == $_POST["Username"] && $_POST["Password"] == $ar["password"]){
                    $_SESSION['username'] = $_POST["Username"] ;
                    $_SESSION['pic'] = $ar['pic'];
                    header("location: index.php");
                }
                else if ($ar["username"] != $_POST["Username"] || $_POST["Password"] != $ar["password"]){
                    $a = 1 ;
                }   
            }
            if($a==1){
                echo "<p id='passinc'> There is Something Wrong </p>" ;
            }

            
    }
    //session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/stylelog.css">
    <title> LOGIN </title>
</head>
<body>
    <div class="container">
        <!-- 
            if(isset($_GET["Disconnect"])){
                echo "You are Disconnect" ;
            }
        -->
        <h4> LOGIN </h4>
        <img id="PhotoLogin" src="./Images/index.png" alt="PhotoLogin" width="95px">
        <form action="login.php" method="POST">
            <label for=""> Username :</label> <br>
            <input type="text" name="Username" placeholder="Username"> <br><br>
            <label for=""> Password :</label> <br>
            <input type="text" name="Password" placeholder="Password"> <br> <br>
            <input type="submit" value="LOGIN">
            <p> Not a member ? <a href="Register.php">Create Account </a><p>
        </form>
    </div>
</body>
</html>