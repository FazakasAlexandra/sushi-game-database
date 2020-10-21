<?php

function is_name_duplicate($players, $name){
    $duplicate = false;

    foreach($players as $player){

        if($player['Name'] === $name){
            $duplicate = true;
        }
        
    }

    return $duplicate;
}