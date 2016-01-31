<?php

require_once("./application/inc/db.php");


function getInfoClientes() {
    $query = "SELECT * FROM cliente";
    $stmt = db()->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQL_ASSOC);
}

/*
 * @return info de cliente por userID
 * 
 */

function getInfoCliente($userID) {
    $query = "SELECT * FROM cliente WHERE UserID = ?";
    $stmt = db()->prepare($query);
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQL_ASSOC);
}

function validarDadosCliente($nome, $nContribuinte, $telefone, $morada, $dataNasc) {
    $arrayMensagens = array();

    if (trim($nome) == "") {
        $arrayMensagens["Nome"] = "Nome é Obrigatório";
    }

    if (trim($nContribuinte) == "") {
        $arrayMensagens["nContribuinte"] = "Número Contribuinte é obrigatório";
    } else

    if (trim($telefone) == "") {
        $arrayMensagens["telefone"] = "Telefone é obrigatório";
    } else
    if ((strlen($telefone) != 9)) {
        $arrayMensagens["telefone"] = "Telefone tem de ter 9 carateres";
    }

    if ($morada == "") {
        $arrayMensagens["morada"] = "Morada é obrigatória";
    }

    return $arrayMensagens;
}

function validarVisa($visa) {
    $arrayMensagens = array();

    if (trim($visa) == "") {
        $arrayMensagens["visa"] = "Numero Visa é obrigatório";
    } else
    if ((strlen($visa) != 16)) {
        $arrayMensagens["visa"] = "Numero Visa tem de ter 16 carateres";
    }
    
    return $arrayMensagens;
}

function alterarDadosCliente($id, $nome, $nContribuinte, $telefone, $morada, $dataNasc) {
    try {
        $query = "UPDATE cliente SET Nome=?, NumContribuinte=?, Telefone=?, Endereco=?, DataNascimento=? WHERE IDCliente=?";
        $stmt = db()->prepare($query);
        if (trim($dataNasc)=="")
            $dataNasc = NULL;
        $stmt->bind_param("siissi", $nome, $nContribuinte, $telefone, $morada, $dataNasc, $id);
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
