<?php
require_once("./application/inc/controllerInit.php");
require_once("./application/models/autenticacao.model.php");
require_once("./application/models/thirts_personalizadas.model.php");

$tituloPagina = "Imagem Personalizada";

if (isset($_FILES["nomeCampo"])){
    $imagem = $_FILES["nomeCampo"];
    $nomeOriginal= $_FILES["nomeCampo"]["name"];
    $partes = explode(".", $nomeOriginal);
    $extensao= end($partes);
    $novoID= criarRegistoImagem($nomeOriginal, $extensao);
    $filename= "images/personalizadas/img_".$novoID.".".$extensao; 
    move_uploaded_file($_FILES["nomeCampo"]["tmp_name"],$filename);
    inserirNomeIgm($extensao, $filename);

}
$Path = getPathImagem();


require("./application/views/top.template.php");
require("./application/views/thirts_personalizadas.view.php");
require("./application/views/bottom.template.php");
?>
