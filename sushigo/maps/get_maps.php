<?php
require '../configure.php';
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type");

$db = new mysqli(server, user, password, database_name);
$arr = array();

if($db){
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
            echo 'map for level ' . $level . 'does not exist';
        }

    } else {
        $SQL = $db->prepare('SELECT * FROM maps');
        $SQL->execute();
        $result = $SQL->get_result();
    
        while($row = mysqli_fetch_assoc($result)){
            array_push($arr, $row);
        }
        
        print json_encode($arr, JSON_PRETTY_PRINT);
        $SQL->close();
        $db->close();
    }

} else {
    echo 'database does not exist !';
}

?>