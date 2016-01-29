<?php
require_once("./application/inc/db.php");
require_once("./application/inc/dbUtils.php");
require_once("./application/inc/paginacao.php");
require_once("./application/inc/parametros.php");


/*
 * @return info do produto
 * 
 */

function getOrderByID($orderID, $ClienteID) {
    try {
        $query = "SELECT * FROM encomenda WHERE IDEncomenda= ? AND IDCliente= ?";
        $stmt = db()->prepare($query);
        $stmt->bind_param("ii", $orderID, $ClienteID);
        $stmt->execute();
        $result = $stmt->get_result();

        if (!$stmt->execute()) {
            throw new Exception("A encomenda não existe");
        }
    } catch (Exception $e) {
        return -1;
    }
    return $result->fetch_all(MYSQL_ASSOC);
}
