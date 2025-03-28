<?php
init();

function get_db_name() {

    $name = "database.db";

    if (isset($_ENV['SIMULATION_DB'])) {
        $name = $_ENV['SIMULATION_DB'];
    }

    return $name;
}

function init(){

    $db = new SQLite3(get_db_name());

    $statement = 
    "CREATE TABLE visit(
        id INTEGER,
        ip TEXT,
        dns TEXT,
        date TEXT,
        PRIMARY KEY(id ASC))
    ";

    @$db->exec($statement);
    $db->close();
}


function insert_record($ip, $dns) {
    $date = date("Y-m-d H:i:s");
    $statement = 
    "INSERT INTO visit(ip, dns, date)
        values('$ip', '$dns', '$date')
        ";
    $db = new SQLite3(get_db_name());
    $db->exec($statement);
    $db->close();
}

function fetch_visits($unique) {
    $statement = "SELECT * FROM visit";

    if ($unique) {
        $statement = "SELECT DISTINCT ip, dns FROM visit";
    }

    $db = new SQLite3(get_db_name());
    $result = $db->query($statement);

    $visits = [];

    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $visits[] = (object) $row;
    }

    return $visits;
}

function query_statement($statement) {
    $db = new SQLite3(get_db_name());
    $result = $db->query($statement);
    $output = [];
    while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $output[] = (object) $row;
    }
    return $output;
}