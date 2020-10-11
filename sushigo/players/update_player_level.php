<?PHP
require '../configure.php';

if(isset($_GET['Name']) && isset($_GET['Level'])){
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