<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dice2.css">
    <title> Dice Game </title>
</head> 
<body>
    <div class="container">
        <div class="leftside">
            <h5> Welcome &nbsp; <?php 
                if(array_key_exists("username",$_SESSION)){
                  echo $_SESSION['username'] ;  
                }
                else if (!array_key_exists('username',$_SESSION)){
                    echo " GUEST " ;
                }
                
            ?> &nbsp; To Play 
            </h5>
            <div class="placeholder">
                <img id ="imaged" src="6.svg"> 
            </div> 
            <h4 id="textscore">Your Score is <p id=score> 0 </p> </h4>
            <button id ="StartGame" name="StartGame">START GAME </button>
            <div class="buttons">
                <button id="Roll" name="Roll"> ROLL </button>
                <button id="Restart" name="Restart"> NEW GAME </button>
                <button id="Save" name="Save"> SAVE </button>
                <button id="Exit" name="Exit"> EXIT </button>
            </div>
        </div>
        <div class="rightside">
            <div class="top">
                <?php
                if(array_key_exists("username",$_SESSION)){
                    echo "
                <h4> Your Total Score is :<p id=totalscore>0</p> </h4> <br>
                <h3> Number of Saves : <p id='savenbr'>0</p></h3> " ;
                }
                else if (!array_key_exists('username',$_SESSION)){
                    echo "<p id='para'>If you need To save Your Score Please Login/Register</p> <br>" ;
                    echo "<a href='../login.php'> <button id=loginbtn > LOGIN </button>  </a>";
                }
                ?>
                
            </div>
            <div class="bottom">
                <h4> Users list: </h4>
                <div class = "contusers"> 
                    <?php
                        $data = file_get_contents("../users.json");
                        $array1 = json_decode($data,true);
                        $array = array_reverse($array1,true);
                        foreach($array as $ar){
                            echo "<div class='us'> <img class='imageusers' src=".".".$ar['pic']."> <p class='name'>".$ar['name']."</p> <p class='score'> Score : ".$ar['score']."</p></div>" ;
                        }
                    ?>  
                </div> 
            </div>
        </div>
    </div>
    <script src="script.js"></script>
        
</body>
</html>