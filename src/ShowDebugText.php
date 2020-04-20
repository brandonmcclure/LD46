<?php
require_once 'GameState.php';

$curentStateObj = $_SESSION['gameState'];

if ($curentStateObj->getIsDebugMode()) {
    echo "<pre>";
    echo print_r($curentStateObj);
     echo "</pre>";
}
