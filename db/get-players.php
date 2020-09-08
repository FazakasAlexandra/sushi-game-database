<?PHP
require 'configure.php';
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type");

$connection = mysqli_connect(server, user, password);
// returns 1 if db exists, 0 otherwise
$db_found = mysqli_select_db($connection, database_name);
$arr = array();

if ($db_found) {
    $SQL = 'SELECT * FROM player';
    $result = mysqli_query($connection, $SQL);

    while($row = mysqli_fetch_assoc($result)){
        // Array_Name[Table_Coulmn_Name] = Value_From_Record
        // prints associative array:
        // print_r($row)."<BR>"; 
        // print $row['Name'].' '.$row['Sushi']."<BR>";
        // echo json_encode($row);
        array_push($arr, $row);
    }
    print json_encode($arr, JSON_PRETTY_PRINT);
    mysqli_close( $connection );
} else {
    
    print "Database not found";
    
}

?>