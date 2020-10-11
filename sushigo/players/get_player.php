<?PHP
require '../configure.php';

if (isset($_GET["Name"])) {
    $name = $_GET["Name"];

    if ($db) {
        $SQL = $db->prepare('SELECT * FROM players WHERE Name=?');
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
?>