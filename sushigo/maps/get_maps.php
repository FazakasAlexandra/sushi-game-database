<?php
require '../configure.php';
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type");

$db = new mysqli(server, user, password, database_name);
$arr = array();

// get single map
if (isset($_GET['level'])) {
    $level = $_GET['level'];
    $SQL = $db->prepare('SELECT * from maps WHERE level=?');
    $SQL->bind_param('s', $level);
    $SQL->execute();
    $result = $SQL->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        print json_encode($row);
    } else {
        echo 'map for level '.$level.' does not exist';
    }

    $SQL->close();
    $db->close();

    return;
    // get all maps
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $SQL = $db->prepare('SELECT * from maps WHERE player=?');
    $SQL->bind_param('i', $id);
    $SQL->execute();
    $result = $SQL->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        print json_encode($row);
    } else {
        echo 'maps for player with id '.$id .' were not found';
    }

    $SQL->close();
    $db->close();

    return;
}

if (isset($_GET['player_id'])) {
    $player_id = $_GET['player_id'];
    $SQL = $db->prepare('SELECT * from maps WHERE player_FK=?');

    $SQL->bind_param('i', $player_id);
    $SQL->execute();

    $result = $SQL->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        while ($row = mysqli_fetch_assoc($result)) {
            array_push($arr, $row);
        }
        
        echo json_encode($arr);

    } else {
        echo $player_id.' is not a valabile player id';
    }

    $SQL->close();
    $db->close();
    return;
}

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
        echo $id.' is not a valabile map id';
    }

    $SQL->close();
    $db->close();

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
