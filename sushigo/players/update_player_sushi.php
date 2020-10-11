<?PHP
require '../configure.php';

if(isset($_GET['Name']) && isset($_GET['Sushi'])){
    $name = $_GET['Name'];
    $sushiNumber = $_GET['Sushi'];

    if($db){
        $SQL = $db->prepare('UPDATE players SET Sushi=? WHERE Name=?');
        $SQL->bind_param('is', $sushiNumber, $name);
        $SQL->execute();
        echo 'Good job '.$name.' !';

        $SQL->close();
        $db->close(); 
    
    } else {
        echo 'database does not exist';
    }

} else {
    echo 'no query';
}

?>