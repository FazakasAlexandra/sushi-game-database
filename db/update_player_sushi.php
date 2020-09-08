<?PHP
require './configure.php';
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type");

if(isset($_GET['Name']) && isset($_GET['Sushi'])){
    $db = new mysqli(server, user, password, database_name);
    $name = $_GET['Name'];
    $sushiNumber = $_GET['Sushi'];

    if($db){
        $SQL = $db->prepare('UPDATE player SET Sushi=? WHERE Name=?');
        $SQL->bind_param('is', $sushiNumber, $name);
        $SQL->execute();
        echo 'sushi updated';

        $SQL->close();
        $db->close(); 
    
    } else {
        echo 'database does not exist';
    }

} else {
    echo 'no query';
}

?>