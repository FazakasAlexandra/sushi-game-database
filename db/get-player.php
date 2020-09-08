<?PHP
require 'configure.php';
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type");

if (isset($_GET["Name"])) {
    $db = new mysqli(server, user, password, database_name);
    $name = $_GET["Name"];

    if ($db) {
        $SQL = $db->prepare('SELECT * FROM player WHERE Name=?');
        $SQL->bind_param('s', $name);
        $SQL->execute();
        $result = $SQL->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            print json_encode($row);
        } else {
            print $name . ' is not a player';
        }

        $SQL->close();
        $db->close();
    } else {
        echo 'database not found';
    }
}
