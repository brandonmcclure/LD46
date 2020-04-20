<?php 
require_once 'strings.php';
require_once 'string.php';
require_once 'GameState.php';
require_once 'Entity.php';
require_once 'foodType.php';


$FoodTypeRepository = new FoodTypeRepository();
$RandomEventsRepository = new RandomEventsHardcodedRepository($FoodTypeRepository);
$newGameState = new GameState();


if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

if (!isset($_SESSION['FoodTypeRepository'])){
  $_SESSION['FoodTypeRepository'] = $FoodTypeRepository;
}

if (!isset($_SESSION['RandomEventRepository'])){
  $_SESSION['RandomEventRepository'] = $RandomEventsRepository;
}

if (!isset($_SESSION['gameState'])){
  $_SESSION['gameState'] = $newGameState;
}



$t = <<<e
<html>
<head>
    <title>Space Whale</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="My entry into Ludam Dare 46 - Theme 'Keep it alive'">
    <meta name=" author" content="Brandon McClure Brandonmcclure89@gmail.com">

    
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <!-- Custom styles for this template -->
    <link href="css/app.css" rel="stylesheet">
</head>
<body cover-container d-flex w-100 h-100 p-3 mx-auto flex-column text-center>
<header class="page-header">
    <div class="inner">
      <h3 class="masthead-brand">Ludam Dare 46 - Theme 'Keep it alive'</h3>
      <nav class="nav nav-masthead justify-content-center">
      <a class="button" href="#">Home</a>
        <a class="button" href="https://github.com/brandonmcclure/LD46">Source Code</a>
      </nav>
    </div>
  </header>

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column text-center">

    
e;

echo $t;
