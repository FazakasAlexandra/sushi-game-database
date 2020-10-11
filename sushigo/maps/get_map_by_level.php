<?php

function get_map_by_level($db)
{
    if (isset($_GET['level'])) {
        $level = $_GET['level'];
        $SQL = $db->prepare('SELECT * from maps WHERE level=?');
        $SQL->bind_param('i', $level);
        $SQL->execute();
        $result = $SQL->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            print json_encode($row);
        } else {
            echo json_encode('map for level ' . $level . ' does not exist');
        }

        $SQL->close();
        $db->close();

        return true;
    }
}
