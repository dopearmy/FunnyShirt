<?php
require_once("./application/inc/controllerInit.php");


// Variáveis usadas pelo do template
$tituloPagina = "Contatos";

require("./application/views/top.template.php");
require("./application/views/contatos.view.php");
require("./application/views/bottom.template.php");
