<div class="row">
    <div class="col-lg-9 col-md-9 col-sm-7 col-xs-6 col-xxs-12 text-center-xs">
        <h1 class="section-title-inner"><span><i class="glyphicon glyphicon-shopping-cart"></i> Checkout</span></h1>
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
                        <li class="active">
                            <a href="<?php $_SERVER['PHP_SELF'] ?>"> <i class="fa fa-map-marker "></i> <span>SHIPPING</span></a>
                        </li>
                        <li class="">
                            <a href="checkout_pagamento.php"> <i class="fa fa-map-marker "></i> <span>PAGAMENTO</span></a>
                        </li>
                        <li class="">
                            <a href="checkout_finalizar.php"><i class="fa fa-check-square "></i><span>FINALIZAR</span></a>
                        </li>
                        <li class="">
                            <a href="dadosCompra.php"><i class="fa fa-thumbs-o-up "></i><span>OBRIGADO</span></a>
                        </li>
                        <?php if (isset($msgGlobal)) : ?>
                            <div class="<?php echoAlertClass($tipoMsgGlobal); ?>">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <strong><?php echoTipoMensagem($tipoMsgGlobal); ?></strong> <?php echo $msgGlobal; ?>
                            </div>
                        <?php endif; ?>
                    </ul>
                    <!--/.orderStep end-->
                </div>

                <div class="w100 clearfix">
                    <div class="row userInfo">
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

                    </div>
                    <!--/row end-->

                    <div class="form-group col-lg-12 col-sm-12 col-md-12 -col-xs-12">
                        <table style="width:100%" class="table-bordered table tablelook2">
                            <tbody>
                                <tr>
                                    <td>Modo Transporte</td>
                                    <td>Metodo</td>
                                    <td>Informação</td>
                                    <td>Preço</td>
                                </tr>
                                <tr>
                                    <td><label class="radio">
                                            <input type="radio" name="optionsRadios" id="optionsRadios1"
                                                   value="option1" checked>
                                            <i class="fa  fa-plane fa-2x"></i> </label></td>
                                    <td>Avião</td>
                                    <td>2 dias</td>
                                    <td>Free!</td>
                                </tr>
                                <tr>
                                    <td><label class="radio">
                                            <input type="radio" name="optionsRadios" id="optionsRadios2"
                                                   value="option2">
                                            <i class="fa fa-truck fa-2x"></i> </label></td>
                                    <td>Rodoviário</td>
                                    <td>5 dias</td>
                                    <td>Free!</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="cartFooter w100">
                                <div class="box-footer">
                                    <div class="pull-left">
                                        <a class="btn btn-default" href="produtos.php"> 
                                            <i class="fa fa-arrow-left"></i> &nbsp; Voltar à loja 
                                        </a>
                                    </div>
                                    <div class="pull-right">
                                        <a class="btn btn-primary btn-small " href="checkout-2.html">
                                            Seguinte &nbsp; <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!--/ cartFooter -->
                </div>
            </div>
        </div>
        <!--/row end-->

    </div>
    <div class="col-lg-3 col-md-3 col-sm-12 rightSidebar">
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
        <!--  /cartMiniTable-->

    </div>
    <!--/rightSidebar-->
</div>
<!--/row-->
