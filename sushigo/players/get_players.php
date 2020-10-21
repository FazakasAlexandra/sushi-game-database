<?PHP
require '../configure.php';


function get_players($db)
{
    $arr = array();

    $SQL = 'SELECT * FROM players';
    $result = mysqli_query($db, $SQL);

    while ($row = mysqli_fetch_assoc($result)) {
        array_push($arr, $row);
    }

    return $arr;
}
