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
                        <span>Editar Produto</span>
                    </div>
                    <div class="col-md-6">
                        <h3>Dados do Produto</h3>
                        <?php foreach ($produtos as $linha) { ?>
                            <form class="form-horizontal" action="cp_editProdutos.php" method="POST">
                                <input type="hidden" value="<?php $data = date_create($linha['DataEntrada']); echo date_format($data, "Y/m/d") ?>" id="defaultDateEntrada">
                                <input type="hidden" value="<?php echo (int)$_GET['ID']?>" name="IDProduto" id="idCliente">
                                <fieldset>
                                    <legend></legend>
                                    <div class="col-lg-12">
                                        <div class="row userInfo">
                                            <div class="col-xs-12">
                                                <div<?php echoClassformGroup('id', $msgErros, $dadosSubmetidos); ?>>
                                                    <label for="idProduto">ID Produto</label>
                                                    <input type="text" id="idProduto" name="id" value="<?php echo $linha['ID']; ?>" class="form-control" disabled="">
                                                    <?php echoMsgErro("id", $msgErros); ?>
                                                </div>  
                                                <div<?php echoClassformGroup('nome', $msgErros, $dadosSubmetidos); ?>>
                                                    <label for="idNome">Nome Produto</label>
                                                    <input type="text" id="idNome" name="nome" value="<?php echo $linha['Nome']; ?>" class="form-control">
                                                    <?php echoMsgErro("nome", $msgErros); ?>
                                                </div>    
                                                <div<?php echoClassformGroup('preco', $msgErros, $dadosSubmetidos); ?>>
                                                    <label for="idPreco">Preço</label>
                                                    <div class="input-group">
                                                        <span class="input-group-addon">€</span>
                                                        <input style="z-index: 1" type="number" name="preco" value="<?php echo number_format($linha['Preco'], 2, '.', ''); ?>" min="0" step="0.01" data-number-to-fixed="" data-number-stepfactor="100" class="form-control currency" id="c2">
                                                        <?php echoMsgErro("preco", $msgErros); ?>
                                                    </div>
                                                </div>
                                                <div<?php echoClassformGroup('dataEntrada', $msgErros, $dadosSubmetidos); ?>>
                                                    <label for="idDataEntrada">Data Entrada</label>
<!--                                                    <input style="z-index: 100" type="text" id="datePickerEntrada" name="dataEntrada" value="" class="form-control" disabled="">-->
                                                    <input type="text" id="idDataEntrada" name="dataEntrada" value="<?php echo $linha['DataEntrada']; ?>" class="form-control" disabled="">
                                                    <?php echoMsgErro("dataEntrada", $msgErros); ?>
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

