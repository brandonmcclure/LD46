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
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <!-- Custom styles for this template -->
    <link href="css/jumbotron-narrow.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">
</head>

<body>
    <div class="container">

    <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="#">Home</a></li>
            <li role="presentation" class="active"><a href="https://github.com/brandonmcclure/LD46">source code</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">Ludam Dare 46 - Theme 'Keep it alive'</h3>
        </div>
e;

echo $t;
