<?php
require_once("./application/inc/controllerInit.php");


http_response_code(404);
$tituloPagina = "Recurso não encontrado";

require("./application/views/top.template.php");
require("./application/views/notFound.view.php");
require("./application/views/bottom.template.php");