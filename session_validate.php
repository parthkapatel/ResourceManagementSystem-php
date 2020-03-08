<?php
    session_start();
    if(!isset($_SESSION['Unm']))
      {
        header('location:Login.php');
      }
?>