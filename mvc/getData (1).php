<?php
if (isset($_POST['getData'])) {
    $conn = new mysqli('localhost', 'root', '', 'test');

    $start = $conn->real_escape_string($_POST['start']);
    $limit = $conn->real_escape_string($_POST['limit']);

    $sql = $conn->query("SELECT name, about FROM country LIMIT $start, $limit");
    if ($sql->num_rows > 0) {
        $response = "";

        while ($data = $sql->fetch_array()) {
            $response .= '
                <div>
                    <h2>'.$data['name'].'</h2>
                    <p>'.$data['about'].'</p>
                </div>
            ';
        }

        exit($response);
    } else {
        exit('reachedMax');
    }
}
?>