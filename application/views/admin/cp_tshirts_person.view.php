<div id="page-wrapper">
    <div id="page-inner">
        <hr>
        <div class="row">
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
                        <span>Preço T-Shirt Personalizada</span>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
                            <div class="col-md-4">
                                <div<?php echoClassformGroup('preco', $msgErros, $dadosSubmetidos); ?>>
                                    <label for="idPreco">Preço </label>
                                    <div class="input-group">
                                        <span class="input-group-addon">€</span>
                                        <input style="z-index: 1" type="number" name="preco" value="<?php echo $precoTP ?>" min="0" step="0.01" data-number-to-fixed="" data-number-stepfactor="100" class="form-control currency" id="c2">
                                        <?php echoMsgErro("preco", $msgErros); ?>
                                    </div>
                                </div>
                                <div class="col-lg-12 text-center">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> &nbsp; Guardar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>
</div>
