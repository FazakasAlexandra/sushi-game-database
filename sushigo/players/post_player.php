<?PHP
require '../configure.php';
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type");

$connection = mysqli_connect(server, user, password);
$database_found = mysqli_select_db($connection, database_name); 

$requestPayload = file_get_contents('php://input');
$object = json_decode($requestPayload, true);

$name = $object['Name'];
$level = $object['Level'];
$sushi = $object['Sushi'];
$spriteSheet = $object['spriteSheet'];
$width = $object['width'];
$height = $object['height'];

if($database_found){
    $SQL = "INSERT INTO players (Name, Level, Sushi, spriteSheet, width, height) 
            VALUES ('$name', '$level', '$sushi', '$spriteSheet', '$width', '$height')";

    mysqli_query($connection, $SQL);

    $last_id = $connection->insert_id;

    $response = array();
    $response['player_id'] = $last_id;
    $response['message'] = 'player with id '.$last_id.' was successfully added';
    echo json_encode($response);

    mysqli_close( $connection );
    
} else {
    echo $database.' does not exist!';
}

?>