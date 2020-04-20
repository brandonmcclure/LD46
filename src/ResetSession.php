<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$_SESSION = array();
session_destroy();

header( "refresh:.01;url=StartGame.php" );
