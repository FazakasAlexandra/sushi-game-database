<?php

function get_map_by_map_id($db){
    if (isset($_GET['map_id'])) {
        $id = $_GET['map_id'];
        $SQL = $db->prepare('SELECT * from maps WHERE id=?');
        $SQL->bind_param('i', $id);
        $SQL->execute();
        $result = $SQL->get_result();
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            print json_encode($row);
        } else {
            echo json_encode($id.' is not a valabile map id');
        }
    
        $SQL->close();
        $db->close();
    
        return true;
    }
}