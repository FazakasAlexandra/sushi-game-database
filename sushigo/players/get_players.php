<?PHP
require '../configure.php';


// returns 1 if db exists, 0 otherwise
$arr = array();

if ($db_found) {
    $SQL = 'SELECT * FROM players';
    $result = mysqli_query($db, $SQL);

    while($row = mysqli_fetch_assoc($result)){
        array_push($arr, $row);
    }
    print json_encode($arr, JSON_PRETTY_PRINT);
    mysqli_close( $db );
} else {
    
    print "Database not found";
    
}

?>