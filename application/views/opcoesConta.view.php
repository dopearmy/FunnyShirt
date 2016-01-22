<?php require_once("./application/inc/viewUtils.php") ?> 
<div class="row">
    <div class="breadcrumbDiv col-lg-12">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href="conta.php">Conta</a></li>
            <li class="active"><?php echo isset($tituloPagina) ? $tituloPagina : "Título Desconhecido"; ?></li>
        </ul>
    </div>
</div>
<div class="col-lg-12 clearfix">
    <ul class="pager">
        <li class="previous pull-right"><a href="index.php"> <i class="fa fa-home"></i> Ir para Loja</a>
        </li>
        <li class="next pull-left"><a href="conta.php"> &larr; Voltar Minha Conta</a></li>
    </ul>
    <?php if (isset($msgGlobal)) : ?>
        <div class="<?php echoAlertClass($tipoMsgGlobal); ?>">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong><?php echoTipoMensagem($tipoMsgGlobal); ?></strong> <?php echo $msgGlobal; ?>
        </div>
    <?php endif; ?>
</div>
<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#infoPessoal" class="collapseWill">
                    Minha Informação Pessoal<span class="pull-left"><i class="fa fa-caret-right"></i></span>
                </a>
            </h4>
        </div>
        <?php
        foreach ($infoCliente as $linha) {
            $linha['IDCliente'];
            $linha['Nome'];
            $linha['NumContribuinte'];
            $linha['Telefone'];
            $linha['Endereco'];
            $linha['DataNascimento'];
            $linha['UserID'];
        }
        ?>
        <div id="infoPessoal" class="panel-collapse collapse in">
            <div class="panel-body">
                <form class="form-horizontal" action="editDadosCliente.php" method="POST">
                    <input type="hidden" value="<?php $data = date_create($linha['DataNascimento']);
        echo date_format($data, "d/m/Y") ?>" id="defaultDateNasc">
                    <fieldset>
                        <legend></legend>
                        <div class="col-lg-12">
                            <h1 class="section-title-inner">
                                <span><i class="glyphicon glyphicon-user"></i>Informação Pessoal</span>
                            </h1>
                            <div class="row userInfo">
                                <div class="col-lg-12">
                                    <h2 class="block-title-2">Mantenha sempre os seus dados Atualizados!</h2>
                                </div>
                                <div class="col-xs-12 col-sm-8">
                                    <div<?php echoClassformGroup('nome', $msgErros, $dadosSubmetidos); ?>>
                                        <label for="idNome">Nome Completo</label>
                                        <input type="text" id="idNome" name="nome" value="<?php echo $linha['Nome']; ?>" class="form-control">
<?php echoMsgErro("nome", $msgErros); ?>
                                    </div>    
                                    <div<?php echoClassformGroup('contribuinte', $msgErros, $dadosSubmetidos); ?>>
                                        <label for="idContribuinte">Numero Contribuinte</label>
                                        <input type="text" id="idContribuinte" name="contribuinte" value="<?php echo $linha['NumContribuinte']; ?>" class="form-control">
<?php echoMsgErro("contribuinte", $msgErros); ?>
                                    </div>
                                    <div<?php echoClassformGroup('telefone', $msgErros, $dadosSubmetidos); ?>>
                                        <label for="idTelefone">Telefone</label>
                                        <input type="text" id="idTelefone" name="telefone" value="<?php echo $linha['Telefone']; ?>" class="form-control">
<?php echoMsgErro("telefone", $msgErros); ?>
                                    </div>
                                    <div<?php echoClassformGroup('endereco', $msgErros, $dadosSubmetidos); ?>>
                                        <label for="idEndereco">Morada</label>
                                        <input type="text" id="idEndereco" name="endereco" value="<?php echo $linha['Endereco']; ?>" class="form-control">
<?php echoMsgErro("endereco", $msgErros); ?>
                                    </div>
                                    <div<?php echoClassformGroup('dataNasc', $msgErros, $dadosSubmetidos); ?>>
                                        <label for="idDataNasc">Data Nascimento</label>
                                        <input type="text" id="datePicker" name="dataNasc" value="" class="form-control">
<?php echoMsgErro("dataNasc", $msgErros); ?>
                                    </div>
                                    <div class="form-group">

                                    </div>
                                </div>
                                <!--                                <div class="col-lg-12">
                                                                    <div class="form-group ">
                                                                        <p class=" clearfix">
                                                                            <input type="checkbox" value="1" name="newsletter" id="newsletter">
                                                                            <label for="newsletter">Assinar a nossa newsletter!</label>
                                                                        </p>
                                                                    </div>
                                                                </div>-->
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp; Guardar</button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <a data-toggle="collapse" href="#changePWD" class="collapseWill">
                    Mudar Password<span class="pull-left"><i class="fa fa-caret-right"></i></span>
                </a>
            </h4>
        </div>
        <div id="changePWD" class="panel-collapse collapse in">
            <div class="panel-body">
                <form action="changePassword.php" method="POST" class="form-horizontal">

                    <fieldset>
                        <div class="col-lg-12">
                            <input type="hidden" name="redirectTo"<?php echoFieldValue("redirectTo", $data); ?>>
                            <div<?php echoClassformGroup('senhaAtual', $msgErros, $dadosSubmetidos); ?>>
                                <label for="idSenhaAtual">Password Atual</label>
                                <input type="password" id="idSenhaAtual" name="senhaAtual"<?php echoFieldValue("senhaAtual", $data); ?>class="form-control" placeholder="Senha Atual">
<?php echoMsgErro("senha", $msgErros); ?>
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
                            <div class="text-center"> 
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp; Guardar</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

