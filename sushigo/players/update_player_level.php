<?PHP
require '../configure.php';
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type");

if(isset($_GET['Name']) && isset($_GET['Level'])){
    $db = new mysqli(server, user, password, database_name);
    $name = $_GET['Name'];
    $level = $_GET['Level'];

    if($db){
        $SQL = $db->prepare('UPDATE players SET Level=? WHERE Name=?');
        $SQL->bind_param('is', $level, $name);
        $SQL->execute();
        echo 'Congratulations '.$name.', you reached level '.$level.'!';

        $SQL->close();
        $db->close();  
    
    } else {
        echo 'database does not exist';
    } 

} else {
    echo 'no query';
}

?>