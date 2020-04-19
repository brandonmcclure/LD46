<?php
require_once 'GameState.php';

$curentStateObj = $_SESSION['gameState'];

if ($curentStateObj->getIsDebugMode()) {
    print_r($curentStateObj);
}
