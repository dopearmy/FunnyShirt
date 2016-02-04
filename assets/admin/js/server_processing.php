<?php
require_once("../application/inc/controllerInit.php");

function db() {
    global $_ApplicationDBConnection;

    if (isset($_ApplicationDBConnection))
        return $_ApplicationDBConnection;

    $maquina = "localhost";
    $utilizador = "root";
    $senha = "";
    $bd = "cetcaw-03";
    $_ApplicationDBConnection = @new mysqli($maquina, $utilizador, $senha, $bd);
    $_ApplicationDBConnection->set_charset("utf8");
    return $_ApplicationDBConnection;
}

function getOrders() {
    $query = "SELECT * FROM encomenda";
    $stmt = db()->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQL_ASSOC);
}

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
 
// DB table to use
$table = 'encomenda';
 
// Table's primary key
$primaryKey = 'IDEncomenda';
 
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = getOrders();
 
// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'cetcaw-03',
    'host' => 'localhost'
);
 
 
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

 
echo json_encode(
    SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns )
);