<?php

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

function fetchArray($stmt) {
    $array = array();
    $stmt->store_result();
    $vars = array();
    $data = array();
    $meta = $stmt->result_metadata();
    while ($field = $meta->fetch_field())
        $vars[] = &$data[$field->name]; // pass by reference
    call_user_func_array(array($stmt, 'bind_result'), $vars);
    $i = 0;
    while ($stmt->fetch()) {
        $array[$i] = array();
        foreach ($data as $chave => $valor)
            $array[$i][$chave] = $valor;
        $i++;
    }
    return $array;
}
