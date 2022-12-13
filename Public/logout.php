<?php
session_start();
unset($_SESSION['username']);
   if(session_destroy()){
   	header('location:./login.php?exit');
   }
?>