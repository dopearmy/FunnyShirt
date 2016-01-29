<div class="row">
    <div class="col-lg-9 col-md-9 col-sm-7 col-xs-6 col-xxs-12 text-center-xs">
        <h1 class="section-title-inner"><span><i class="glyphicon glyphicon-shopping-cart"></i> Checkout - Finalizar</span></h1>
    </div>
    <div class="col-lg-3 col-md-3 col-sm-5 rightSidebar col-xs-6 col-xxs-12 text-center-xs">
        <h4 class="caps"><a href="produtos.php"><i class="fa fa-chevron-left"></i> Voltar à loja </a></h4>
    </div>
</div>
<!--/.row-->

<div class="row">
    <div class="col-lg-9 col-md-9 col-sm-12">
        <div class="row userInfo">
            <div class="col-xs-12 col-sm-12">
                <div class="w100 clearfix">
                    <ul class="orderStep orderStepLook2">
                        <li class="">
                            <a href="checkout_dados.php"> <i class="fa fa-map-marker "></i> <span>DADOS</span></a>
                        </li>
                        <li class="">
                            <a href="checkout_shipping.php"> <i class="fa fa-map-marker "></i> <span>SHIPPING</span></a>
                        </li>
                        <li class="">
                            <a href="checkout_pagamento.php"> <i class="fa fa-map-marker "></i> <span>PAGAMENTO</span></a>
                        </li>
                        <li class="active">
                            <a href="checkout_finalizar.php"><i class="fa fa-check-square "></i><span>FINALIZAR</span></a>
                        </li>
                        <li class="">
                            <a href="XXXX.php"><i class="fa fa-thumbs-o-up "></i><span>OBRIGADO</span></a>
                        </li>
                    </ul>
                    <!--/.orderStep end-->
                </div>

                <div class="w100 clearfix">
                    <div class="row userInfo">
                        <div class="col-lg-12">
                            <h2 class="block-title-2">Detalhes da Encomenda</h2>
                        </div>
                        <div class="col-xs-12 col-sm-12">
                            <div class="cartContent w100 checkoutReview ">
                                <table class="cartTable table-responsive" style="width:100%">
                                    <tbody>
                                        <tr class="CartProduct cartTableHeader">
                                            <td style="width:15%">Produto</td>
                                            <td style="width:40%">Nome</td>
                                            <td style="width:10%">Preço Unid.</td>
                                            <td style="width:10%">QTD</td>
                                            <td style="width:15%">Total</td>
                                        </tr>
                                        <?php if (empty($infoCart)): ?>
                                            <tr>
                                                <td class="text-center" colspan="6"><h2><a href="produtos.php">O seu carrinho está vazio!</a></h2></td>
                                            </tr>
                                        <?php else:
                                            foreach ($infoCart as $linha) {
                                                ?>
                                                <tr class="CartProduct">
                                                    <td class="CartProductThumb text-center">
                                                        <div >
                                                            <a href="produtoDetalhes.php?ID=<?php echo $linha["ID"] ?>">
                                                                <img src="images/product/t_shirt_<?php echo $linha["ID"] ?>.png" alt="img" class="img-responsive"> 
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="CartDescription">
                                                            <h4><a href="produtoDetalhes.php?ID=<?php echo $linha["ID"] ?>"><?php echo $linha["Nome"] ?></a></h4>
                                                        </div>
                                                    </td>
                                                    <td class="delete">
                                                        <span><?php echo number_format($linha['Preco'], 2, '.', '') . '&nbsp€'; ?></span>
                                                    </td>
                                                    <td>
                                                        &nbsp;<?php echo $linha['qtd'] ?>&nbsp;
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

                            <div class="w100 costDetails">
                                <div class="table-block" id="order-detail-content">
                                    <table class="std table" id="cart-summary">
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
                                        <tr class="cart-total-price ">
                                            <td><strong>Total:</strong><br>
                                                *taxas incl
                                            </td>
                                            <td id="total-price">
                                                <?php
                                                //controllerInit
                                                echo $totalCarrinho . '&nbsp€';
                                                ?>
                                            </td>
                                        </tr>
                                        
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--/costDetails-->
                            <!--/row-->
                        </div>
                    </div>
                </div>
                <!--/row end-->

                <div class="cartFooter w100">
                    <div class="box-footer">
                        <div class="pull-left"><a class="btn btn-default" href="checkout-4.html">
                            <i class="fa fa-arrow-left"></i> &nbsp; Pagamento</a>
                        </div>
                        <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                            <div class="pull-right">
                                <input type="hidden" value="<?php ?>" id="hide" name="xxx">
                                <button type="submit" class="btn btn-primary btn-small ">
                                    Confirmar Encomenda &nbsp; <i class="fa fa-check"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!--/ cartFooter -->
        </div>
    </div>
    <!--/row end-->

    <!--rightSidebar-->
<?php require_once('./application/views/checkout_sidebar.subview.php'); ?>
    <!--/rightSidebar-->

</div>
<!--/row-->