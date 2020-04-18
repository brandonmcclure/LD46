<?php

$previousStateObj = $_POST['previousState'];
$nextStateObj = $previousStateObj;
$prevStateEnum = $previousStateObj->getCurrentState();
if ($prevStateEnum = 0){
    $nextStateObj->EnterRandomEventState();
}

if ($prevStateEnum = 1){
    $previousStateObj->EnterRandomEventState();
}