<div id="page-wrapper">
    <div id="page-inner">
            <div class = "col-md-12">
                <?php if (isset($msgGlobal)) : ?>
                    <div class="<?php echoAlertClass($tipoMsgGlobal); ?>">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echoTipoMensagem($tipoMsgGlobal); ?></strong> <?php echo $msgGlobal; ?>
                    </div>
                <?php endif;?>
                <!--Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>Editar Cliente</span>
                    </div>
                    <div class="col-md-6">
                        <h3>Dados do Cliente</h3>
                        <?php foreach ($clientes as $linha) { ?>
                            <form class="form-horizontal" action="cp_editDadosCliente.php" method="POST">
                                <input type="hidden" value="<?php $data = date_create($linha['DataNascimento']); echo date_format($data, "Y/m/d") ?>" id="defaultDateNasc">
                                <input type="hidden" value="<?php echo (int)$_GET['ID']?>" name="IDCliente" id="idCliente">
                                <fieldset>
                                    <legend></legend>
                                    <div class="col-lg-12">
                                        <div class="row userInfo">
                                            <div class="col-xs-12">
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
                                            </div>
                                            <div class="col-lg-12 text-center">
                                                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp; Guardar</button>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        <?php } ?>
                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>
</div>
