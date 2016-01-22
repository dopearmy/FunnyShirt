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
