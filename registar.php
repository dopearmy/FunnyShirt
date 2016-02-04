<?php
require_once("./application/inc/controllerInit.php");


//Se estiver logado redireciona para conta.php
if(!isUserAnonimo()){
    if (headers_sent()) {
        die("O redirecionamento falhou. Por favor, clique neste link: <a href=conta.php>Login</a>");
    }
    else{
        $_SESSION["flash_loginMessage"]="Já tem uma conta associada!";
        $_SESSION["flash_loginRedirectTo"]= $_SERVER["REQUEST_URI"];
        exit(header("Location: conta.php"));
    }
}

// Iniciação das variáveis obrigatórios na vista:
$tituloPagina = "Resgistar";
$operacao = "I";
$data = array();
$msgErros = array();
$dadosSubmetidos= false;


if (!empty($_POST)) { // Formulário foi submetido - é um pedido POST
        $dadosSubmetidos= true;
        $data = $_POST;
        $msgErros = validarDisciplina($data["cursoid"], $data["ano"], $data["semestre"], $data["abr"], $data["nome"], $data["emailProf"]);
        if (count($msgErros)>0){
                $msgGlobal= "Existem valores inválidos no formulário";
                $tipoMsgGlobal = "A";
        }
        else {
                $novoID = inserirDisciplina($data["cursoid"], $data["ano"], $data["semestre"], $data["abr"], $data["nome"], $data["emailProf"]);
                if ($novoID!=-1){
                        $_SESSION["flash_msgGlobal"] = "A disciplina foi criada com sucesso";
                        $_SESSION["flash_tipoMsgGlobal"] = "S";
                        header("Location: disciplina_show.php?id=$novoID");
                        exit;			
                }
                else {
                        $msgGlobal= "Houve um problema ao criar a disciplina";
                        $tipoMsgGlobal = "E";
                }						
        }
}

// Variáveis utilizadas pela vista formDisciplina.view.php

// $tituloPagina (preenchimento obrigatória) - Titulo da página
// $msgErros (preenchimento obrigatória) - array com as mensagens de erro de validação associado a cada campo
                        // a chave é igual ao nome do campo
                        // O array pode estar vazio - não tem nenhuma mensagem de erro
// $data (preenchimento obrigatório) - array com os valores dos campos  
                        // a chave é igual ao nome do campo
                        // o campo escondido "operacao" é sempre preenchido
                        // os restantes campos poderão ficar vazios (não foram ainda preenchidos)
// $dadosSubmetidos (preenchimento obrigatório) - indica se submeteu ou não os dados do formulário

// $msgGlobal (preenchimento opcional) - String com uma mensagem de aviso/erro/sucesso relativa a toda a página
// $tipoMsgGlobal (preenchimento opcional) - Tipo da mensagem global ($msgGlobal):
                // A - Aviso
                // E - Erro
                // I - Informação 
                // S - Sucesso

require("./application/views/top.template.php");
require("./application/views/registar.view.php");
require("./application/views/bottom.template.php");
