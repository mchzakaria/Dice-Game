let btnroll = document.querySelector("#Roll");
let btnrestart = document.querySelector("#Restart");
let btnsave = document.querySelector("#Save");
let btnexit = document.querySelector("#Exit");
let btnstartgame = document.querySelector("#StartGame");
let textscore = document.querySelector("#textscore"); 
let plchdr = document.querySelector(".placeholder");
let sc1 = document.querySelector("#score");
let savenbr = document.querySelector("#savenbr");
let scrtotal = document.querySelector("#totalscore");
let image = document.getElementById("imaged");

/*DEFAULT START GAME*/
    btnexit.style.display = 'none' ;
    btnroll.style.display = 'none' ;
    btnrestart.style.display = 'none' ;
    btnsave.style.display = 'none' ;
    plchdr.style.display = 'none';
    image.style.display = 'none';
    textscore.style.display = 'none';
    btnstartgame.style.display='flex';
/** */
//btnstartgame.style.display='none';
let scr = 0 ;

function diceroll(){
    let x = Math.floor((Math.random() * 6) + 1);
    //plchdr.textContent = x ;
    image.setAttribute("src",x+".svg");
    sc1.textContent = parseInt(sc1.textContent) + x;
    if(x==1){
        sc1.textContent = 0 ;
        btnroll.removeEventListener('click',diceroll);
    }
    if(sc1.textContent >= 100){
        alert("You Win");
        RestartGame(); 
    }
}
btnroll.addEventListener('click',diceroll);

/*Restart button */

function RestartGame(){
    sc1.textContent = 0 ;
    image.setAttribute("src",6+".svg");  
    x=0;
}
btnrestart.addEventListener('click',RestartGame);

/* Save button */
let saven = 1 ;
function SaveScore(){
    let totalscore = sc1.textContent ;
    scrtotal.textContent = parseInt(scrtotal.textContent) + parseInt(totalscore);
    y = saven++ ;
    savenbr.textContent = y ;
    RestartGame();
}
btnsave.addEventListener('click',SaveScore);

/* EXIT GAME */
function exitgame(){
    RestartGame();
    btnexit.style.display = 'none' ;
    btnroll.style.display = 'none' ;
    btnrestart.style.display = 'none' ;
    btnsave.style.display = 'none' ;
    plchdr.style.display = 'none';
    image.style.display = 'none';
    textscore.style.display = 'none';
    btnstartgame.style.display='flex';
}

btnexit.addEventListener('click',exitgame);

/* START GAME */
function Startgame(){
    btnexit.style.display = 'flex' ;
    btnroll.style.display = 'flex' ;
    btnrestart.style.display = 'flex' ;
    btnsave.style.display = 'flex' ;
    plchdr.style.display = 'flex';
    image.style.display = 'flex';
    textscore.style.display = 'flex';
    btnstartgame.style.display='none';
}
btnstartgame.addEventListener('click',Startgame);
    
