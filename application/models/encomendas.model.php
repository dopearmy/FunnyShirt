<?php
require_once("./application/inc/db.php");
require_once("./application/inc/dbUtils.php");



/*
 * @return todas as encomendas
 * 
 */

function getOrders() {
    $query = "SELECT * FROM encomenda";
    $stmt = db()->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQL_ASSOC);
}


/*
 * @return info encomenda WHERE IDEncomenda= xxx AND IDCliente= xxx
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

/*
 * @return info de um Cliente
 * 
 */
function getOrdersCliente($ClienteID) {
    try {
        $query = "SELECT * FROM encomenda WHERE IDCliente= ?";
        $stmt = db()->prepare($query);
        $stmt->bind_param("i", $ClienteID);
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


/*
 * Confirmar encomenda pelo ID
 * 
 */

function confirmOrder($idOrder) {
    $entregue = 1;
    try {
        $query = "UPDATE encomenda SET Entregue=? WHERE IDEncomenda=?";
        $stmt = db()->prepare($query);
        $stmt->bind_param("ii", $entregue, $idOrder);
        $stmt->execute();
        // Nota: Se o update correu bem, a propriedade affected_rows deve ter os seguintes valores:
        // 1 - foi alterado um registo
        // 0 - a operação correu bem, mas não foi alterado nada (não afetou nenhum registo)
        if ((db()->affected_rows > 1) || (db()->affected_rows < 0))
            throw new Exception("Erro - algo se passou");
    } catch (Exception $e) {
        return false;
    }
    return true;
}


/*
 * Apagar encomenda pelo ID
 * 
 */

function apagarOrder($idOrder) {
    $query = "DELETE FROM encomenda WHERE IDEncomenda = ?";
    $stmt = db()->prepare($query);
    $stmt->bind_param("i", $idOrder);
    $stmt->execute();
    $result = $stmt->get_result();
}
