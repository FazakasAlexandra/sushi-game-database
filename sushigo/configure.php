<?PHP

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header("Access-Control-Allow-Headers: Content-Type");

$db = new mysqli('localhost', 'root', '', 'sushigo');

?>