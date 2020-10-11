<?php

function get_maps_by_player_id($db){
    $player_maps = array();

    if (isset($_GET['player_id'])) {

        $player_id = $_GET['player_id'];
        $SQL = $db->prepare('SELECT * from maps WHERE player_FK=?');
        $SQL->bind_param('i', $player_id);
        $SQL->execute();
    
        $result = $SQL->get_result();
    
        if ($result->num_rows >= 1) {
    
            while ($row = mysqli_fetch_assoc($result)) {
                array_push($player_maps, $row);
            }
            
        }
        
        echo json_encode($player_maps);
    
        $SQL->close();
        $db->close();
        return true;
    }

}