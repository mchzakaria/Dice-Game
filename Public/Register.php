<?php 
    // Partie Register //
    if (isset($_POST["submit"])){

        $Name = $_POST["Name"] ;
        $Usern = $_POST["Username"];
        $Pass = $_POST["Password"] ;
        

        if($Name!="" && $Usern!="" && $Pass!=""){
            
            $data = file_get_contents("users.json");
            $array = json_decode($data , true);
            foreach($array as $arr){
                if($Usern==$arr['username']){
                   header('location:Register.php?Duplicate');
                }

            }
            if(strtolower($Usern)=="admin"){
                header('location:Register.php?Error') ;
            }
            
            $new = array(
                "name" =>$Name,
                "username" =>$Usern,
                "password" =>$Pass,
                "pic" => "./Images/Amina.jpeg",
                "score"=> 0
            );
            $array[] = $new ;
            //echo $array["name"];
            $Incode  = json_encode($array) ;
            file_put_contents('users.json', $Incode);
            echo " <p id='Useradd'> User Add Succesfully </p>" ;
        }   
        else {
            echo "<p id='Useradd'> You Miss Something </p>" ;
        }
        
    }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/styleregi.css">
    <title> Register </title>
</head>
<body>
    <div class="container">
        <?php 
            if(isset($_GET["Duplicate"])){
                echo "<p id='Useradd'> This Usename is already exist !  </p>" ;
            }
            if(isset($_GET["Error"])){
                echo "<p id='Useradd'> There is Only one Admin </p>" ;
            }
        ?>
        <h4> Register </h4>
        <form action="" method="POST">
            <label for=""> Name :</label> <br>
            <input type="text" name="Name"  placeholder="Name"> <br> <br>
            <label for=""> Username :</label> <br>
            <input type="text" name="Username"  placeholder="Username"> <br> <br>
            <label for=""> Password :</label> <br>
            <input type="text" name="Password" placeholder="Password"> <br> <br>
            <button type="submit" name="submit"> Register </button>
            <p> You are a member ? <a href="login.php"> Sign In </a><p>
        </form>

    </div>
</body>
</html>