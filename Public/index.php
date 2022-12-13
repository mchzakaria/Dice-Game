<?php

session_start();

if(isset($_POST["pub"])){
    if(isset($_POST["title"]) && isset($_POST["contenu"])){
        $datapub = file_get_contents("data.json");
        $array = json_decode($datapub ,true);
        $newarray = array(
            "titre" =>$_POST["title"],
            "username" =>$_SESSION['username'],
            "Contenu" =>$_POST["contenu"],
            "Date" => date("d-m-y h:i") 
        );
        $array[] = $newarray ;
        $Incodee  = json_encode($array) ;
        file_put_contents('data.json', $Incodee);
    }
    else {
        echo "Please fill the blank to publy";
    }
}



// if(!array_key_exists("username" , $_SESSION))
//     header("Location:login.php");
    // if(isset($_GET["Disconnect"])){
    //     header('location:login.php');
    // }
//session_destroy();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="./CSS/styleind.css">
    <title> Mon Blog </title>
</head>
<body>
    <div class="bar">
        <h5> Mon Blog </h5>
    </div>

    <header>
        <form action="" method="POST">
        <a title="Home" href="index.php" id="home" name="home">
            <i name="house" class="fa-solid fa-house"></i>
        </a>   
        <?php 
            if(array_key_exists("username",$_SESSION)){
                echo "<a href='logout.php' id='logout' name='logout'> 
                        <i title='Logout' class='fa-solid fa-right-from-bracket'></i>
                     </a> " ;  
            }
            else if (!array_key_exists("username",$_SESSION)){
                echo "<a title='Login' href='login.php' id='login' name='login'>
                        <i class='fa-solid fa-right-to-bracket'></i>
                     </a>  " ;
            }
        ?>
        </form>
        
        <h3> Welcome 
            <?php
            if(array_key_exists("username",$_SESSION)){
                echo $_SESSION["username"];
                echo" <img id='imgsession' src=\"{$_SESSION['pic']}\" />" ;
                //session_destroy();
            }
            else {
                echo"Guest";
                echo" <img id='anonyme' src='./Images/index.png'/>" ;
            }    
            ?>
            <ul>
                <a id ="zonegame" href="./DiceGame/game.php"> Games </a>
                <a id='users'href=""> Users List </a>
            </ul>
        </h3>
        
    </header>
    <?php 
        if(array_key_exists("username",$_SESSION)){
            echo "<div class='blog'>
                <div class='publication'> 
                    <form action'' method='POST'>
                        <label> Title :</label> <br>
                        <input name='title' type='text' placeholder='Title of Publication '>  <br> <br>
                        <label> Publication : </label> <br>
                        <textarea name='contenu' cols='40' rows='10' placeholder=' Write your publication Here !'></textarea> <br> <br>
                        <button name='pub'>Publier</button>
                    </form>
                </div>  
            </div>" ;
            echo '<style type="text/css">
        .articles {
            top: 660px;
        }
        </style>';
        }
        ?>
        
    <div class="articles">
        <?php
            $data = file_get_contents("data.json");
            $array1 = json_decode($data ,true);
            $array =array_reverse($array1,true);
            //var_dump($array); 
            echo"<br> <br>" ;
            
            foreach($array as $ar){
                echo("<form action=\"\" method=\"POST\" >");
                if(array_key_exists("username", $_SESSION)){
                    if($_SESSION['username']== $ar['username'] || $_SESSION['username']=="ADMIN"){
                        echo " <button id='trash' name='trash' title='Supprimer'> <img src='./Images/delete.png' class='trash' > </button>";
                        echo " <button id='edit' name='edit' title='Modifier'> <img src='./Images/editer.png' class='edit' > </button> ";
                    }
                }    
                    echo "<div class='publ'>
                            <p id='titre'>".$ar['titre']."</p>".
                            "<div class='userdate'>
                                <p id='username'>".$ar['username']."</p>
                                <p id='Date_creation'>".$ar['Date']."</p>
                            </div>
                            <p id='Contenu'>".$ar['Contenu']."</p>
                            <div class='heart'></div>
                        </div> " ;
                echo"</form>";
                
            }
            
        ?>
        
    </div>        
            
    
</body>
</html>