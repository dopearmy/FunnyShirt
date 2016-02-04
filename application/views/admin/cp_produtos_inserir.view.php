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
                        <span>Nova T-Shirt</span>
                    </div>
                    <div class="col-md-6">
                        <h3>Dados do Produto</h3>
                        
                        <form class="form-horizontal" action="<?php $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
                            <fieldset>
                                <legend></legend>
                                <div class="col-lg-12">
                                    <div class="row userInfo">
                                        <div class="col-xs-12">
                                            <div<?php echoClassformGroup('imgProduto', $msgErros, $dadosSubmetidos); ?>>
                                                <label for="idImgProduto">Imagem Produto</label>
                                                    <input type="file" name="nomeCampo">
                                                    <br>
                                                <?php echoMsgErro("imgProduto", $msgErros); ?>
                                            </div> 
                                            <div<?php echoClassformGroup('id', $msgErros, $dadosSubmetidos); ?>>
                                                <label for="idProduto">ID Produto</label>
                                                <input type="text" id="idProduto" name="id" value="<?php echo $totalProduto?>" class="form-control" disabled="">
                                            </div>  
                                            <div<?php echoClassformGroup('nome', $msgErros, $dadosSubmetidos); ?>>
                                                <label for="idNome">Nome Produto</label>
                                                <input type="text" id="idNome" name="nome" value="" class="form-control">
                                                <?php echoMsgErro("nome", $msgErros); ?>
                                            </div>    
                                            <div<?php echoClassformGroup('preco', $msgErros, $dadosSubmetidos); ?>>
                                                <label for="idPreco">Preço</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon">€</span>
                                                    <input style="z-index: 1" type="number" name="preco" value="19.99" min="0" step="0.01" data-number-to-fixed="" data-number-stepfactor="100" class="form-control currency" id="c2">
                                                    <?php echoMsgErro("preco", $msgErros); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 text-center">
                                            <button type="submit" class="btn btn-primary" onclick="//alert('TODO')"><i class="fa fa-save"></i> &nbsp; Inserir</button>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>
</div>
