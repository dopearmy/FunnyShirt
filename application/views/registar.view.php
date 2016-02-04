<?php require_once("./application/inc/viewUtils.php"); ?> 

<div class="row">
    <div class="breadcrumbDiv col-lg-12">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active"><?php echo isset($tituloPagina) ? $tituloPagina: "Título Desconhecido";?></li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="col-lg-9 col-md-9 col-sm-8 col-center">
        <?php if (isset($msgGlobal)) : ?>
            <div class="<?php echoAlertClass($tipoMsgGlobal); ?>">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong><?php echoTipoMensagem($tipoMsgGlobal); ?></strong> <?php echo $msgGlobal; ?>
            </div>
        <?php endif; ?>
        <h1 class="section-title-inner"><span><i class="fa fa-lock"></i>&nbsp;Novo Registo</span></h1>
        <div class="row userInfo">
            <form method="POST" action="registarUserCliente.php" role="form" class="regForm">
            <div class="col-xs-12 col-sm-6">
                <h2 class="block-title-2">Dados Utilizador</h2>
                
                <div<?php echoClassformGroup('username', $msgErros, $dadosSubmetidos); ?>>
                    <label for="idUserName">Nome Utilizador</label>
                    <input type="text" id="idUserName" name="username" value="" class="form-control" placeholder="Username">
                <?php echoMsgErro("username", $msgErros); ?>
                </div>    
                <div<?php echoClassformGroup('email', $msgErros, $dadosSubmetidos); ?>>
                    <label for="idemail">Email</label>
                    <input type="email" id="idemail" name="email" value="" class="form-control" placeholder="Email">
                <?php echoMsgErro("contribuinte", $msgErros); ?>
                </div>
                <div<?php echoClassformGroup('novaSenha1', $msgErros, $dadosSubmetidos); ?>>
                    <label for="idSenha">Nova Password</label>
                    <input type="password" id="idSenha" name="novaSenha1"<?php echoFieldValue("novaSenha1", $data); ?>class="form-control" placeholder="Nova Senha">
                <?php echoMsgErro("senha", $msgErros); ?>
                </div>
                <div<?php echoClassformGroup('novaSenha2', $msgErros, $dadosSubmetidos); ?>>
                    <label for="idSenhaConf">Confirmar Password</label>
                    <input type="password" id="idSenhaConf" name="novaSenha2"<?php echoFieldValue("novaSenha2", $data); ?>class="form-control" placeholder="Confimar Senha">
                <?php echoMsgErro("senha", $msgErros); ?>
                </div>
 
                </div>
                <div class="col-xs-12 col-sm-6">
                    <h2 class="block-title-2"><span>Dados Utilizador</span></h2>
                    <div<?php echoClassformGroup('nome', $msgErros, $dadosSubmetidos); ?>>
                        <label for="idNome">Nome Completo</label>
                        <input type="text" id="idNome" name="nome" value="" class="form-control" placeholder="Nome Completo">
                        <?php echoMsgErro("nome", $msgErros); ?>
                    </div>    
                    <div<?php echoClassformGroup('contribuinte', $msgErros, $dadosSubmetidos); ?>>
                        <label for="idContribuinte">Numero Contribuinte</label>
                        <input type="text" id="idContribuinte" name="contribuinte" value="" class="form-control" placeholder="Nº Contribuinte">
                        <?php echoMsgErro("contribuinte", $msgErros); ?>
                    </div>
                    <div<?php echoClassformGroup('telefone', $msgErros, $dadosSubmetidos); ?>>
                        <label for="idTelefone">Telefone</label>
                        <input type="text" id="idTelefone" name="telefone" value="" class="form-control" placeholder="Telefone">
                        <?php echoMsgErro("telefone", $msgErros); ?>
                    </div>
                    <div<?php echoClassformGroup('endereco', $msgErros, $dadosSubmetidos); ?>>
                        <label for="idEndereco">Morada Completa</label>
                        <input type="text" id="idEndereco" name="endereco" value="" class="form-control" placeholder="Morada">
                        <?php echoMsgErro("endereco", $msgErros); ?>
                    </div>
                    <div<?php echoClassformGroup('dataNasc', $msgErros, $dadosSubmetidos); ?>>
                        <label for="idDataNasc">Data Nascimento</label>
                        <input type="text" id="datePicker" name="dataNasc" value="" class="form-control" placeholder="Data Nascimento">
                        <?php echoMsgErro("dataNasc", $msgErros); ?>
                    </div>
                </div>
                <div class="col-lg-12 text-center"> 
                    <br>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp; Criar Conta</button>
                </div>
            </form>
        </div>
        <!--/row end-->
    </div>
</div>
<!--/row-->

