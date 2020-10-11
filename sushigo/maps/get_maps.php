<?php
require '../configure.php';
require './get_map_by_level.php';
require './get_maps_by_player_id.php';
require './get_map_by_map_id.php';

$arr = array();

// get single map
if(get_map_by_level($db) || get_maps_by_player_id($db) || get_map_by_map_id($db)){
    return;
}

// get all maps
$SQL = $db->prepare('SELECT * FROM maps');
$SQL->execute();
$result = $SQL->get_result();

while ($row = mysqli_fetch_assoc($result)) {
    array_push($arr, $row);
}

echo json_encode($arr);

$SQL->close();
$db->close();
