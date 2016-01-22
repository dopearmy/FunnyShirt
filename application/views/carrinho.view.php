<?php require_once("./application/inc/viewUtils.php"); ?> 

<div class="row">
    <div class="breadcrumbDiv col-lg-12">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active"><?php echo isset($tituloPagina) ? $tituloPagina : "Título Desconhecido"; ?></li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="col-lg-9 col-md-9 col-sm-7">
        <div class="row userInfo">
            <div class="col-xs-12 col-sm-12">
                <div class="cartContent w100">
                    <?php if (isset($msgGlobal)) : ?>
                        <div class="<?php echoAlertClass($tipoMsgGlobal); ?>">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong><?php echoTipoMensagem($tipoMsgGlobal); ?></strong> <?php echo $msgGlobal; ?>
                        </div>
                    <?php endif; ?>
                    <table class="cartTable table-responsive" style="width:100%">
                        <tbody>
                            <tr class="CartProduct cartTableHeader">
                                <td style="width:15%">Produto</td>
                                <td style="width:40%">Detalhes</td>
                                <td style="width:10%" class="delete">&nbsp;</td>
                                <td style="width:10%">QTD</td>
                                <td style="width:15%">Total</td>
                            </tr>
                        <?php if (empty($infoCart)): ?>
                        <tr>
                            <td class="text-center" colspan="6"><h2><a href="produtos.php">O seu carrinho está vazio!</a></h2></td>
                        </tr>
                        <?php else:
                            foreach ($infoCart as $linha) { ?>
                                <tr class="CartProduct">
                                    <td class="CartProductThumb">
                                        <div>
                                            <a href="produtoDetalhes.php?ID=<?php echo $linha["ID"] ?>">
                                                <img src="images/product/t_shirt_<?php echo $linha["ID"] ?>.png" alt="img" class="img-responsive"> 
                                            </a>
                                        </div>

                                    </td>
                                    <td>
                                        <div class="CartDescription">
                                            <h4><a href="produtoDetalhes.php?ID=<?php echo $linha["ID"] ?>"><?php echo $linha["Nome"] ?></a></h4>
                                            <div class="price">
                                                <span><?php echo number_format($linha['Preco'], 2, '.', '') . '&nbsp€'; ?></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="delete">
                                        <a class="btn btn-danger btn-sm" href="carrinho_remover.php?idProduto=<?php echo $linha['ID'] ?>"><span class="">X</span></a>
                                    </td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="carrinho_sub.php?idProduto=<?php echo $linha["ID"] ?>" role="button">-</a>
                                        &nbsp;<?php echo $linha['qtd'] ?>&nbsp;
                                        <a class="btn btn-success btn-sm" href="carrinho_add.php?idProduto=<?php echo $linha["ID"] ?>" role="button">+</a>
                                    </td>
                                    <td class="price">
                                        <?php echo number_format($linha['subTotal'], 2, '.', '') . '&nbsp€'; ?>
                                    </td>
                                </tr>
                            <?php } endif; ?>
                            </tbody>
                    </table>
                </div>
                <!--cartContent-->

                <div class="cartFooter w100">
                    <div class="box-footer">
                        <div class="pull-left">
                            <button onclick="location.href='produtos.php'" type="button" class="btn btn-default"><i class="fa fa-plus-circle"></i>&nbsp;Continuar Comprar</button>
                        </div>
                        <div class="pull-right">
                            <a type="submit" href="carrinho_limpar.php" class="btn btn-danger" role="button"><i class="fa fa-remove"></i>&nbsp;Limpar Carrinho</a>
                            <!-- <a class="btn btn-info" href="carrinho_confirmar.php" role="button">Confirmar Inscrição</a>-->
                        </div>
                    </div>
                </div>
                <!--/ cartFooter -->
            </div>
        </div>
        <!--/row end-->

    </div>
    <div class="col-lg-3 col-md-3 col-sm-5 rightSidebar">
        <div class="contentBox">
            <div class="w100 costDetails">
                <div class="table-block" id="order-detail-content">
                    <a class="btn btn-primary btn-lg btn-block" title="checkout" href="checkout_dados.php" style="margin-bottom:20px"> Finalizar Compra&nbsp; <i class="fa fa-arrow-right"></i></a>
                    <div class="w100 cartMiniTable">
                        <table id="cart-summary" class="std table">
                            <tbody>
                                <tr>
                                    <td><strong>Total:</strong><br>
                                        *sem taxas incl
                                    </td>
                                    <td class="price">
                                        <?php
                                        //controllerInit
                                        echo $totalCarrinho . '&nbsp€';
                                        ?> 
                                    </td>
                                </tr>
                                <tr style="">
                                    <td><strong>Shipping:</strong></td>
                                    <td class="price"><span class="success">Free shipping!</span></td>
                                </tr>
                                
                                <tr>
                                    <td><strong>Total taxas:</strong></td>
                                    <td class="price" id="total-tax">$0.00</td>
                                </tr>
                                <tr>
                                    <td><strong>Total:</strong><br>
                                        *taxas incl
                                    </td>
                                    <td class=" site-color" id="total-price">
                                        <?php
                                        //controllerInit
                                        echo $totalCarrinho . '&nbsp€';
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <div class="input-append couponForm">
                                            <input class="col-lg-8" id="appendedInputButton" type="text" value="#FreeShipping" placeholder="Código Coupon">
                                            <button class="col-lg-4 btn btn-success" type="button">Aplicar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
