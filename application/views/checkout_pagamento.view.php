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
                        <li class="">
                            <a href="checkout_shipping.view.php"> <i class="fa fa-map-marker "></i> <span>SHIPPING</span></a>
                        </li>
                        <li class="active">
                            <a href="<?php $_SERVER['PHP_SELF'] ?>"> <i class="fa fa-map-marker "></i> <span>PAGAMENTO</span></a>
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
    <div class="col-lg-12">
    <?php if (isset($msgGlobal)) : ?>
        <div class="<?php echoAlertClass($tipoMsgGlobal); ?>">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <strong><?php echoTipoMensagem($tipoMsgGlobal); ?></strong> <?php echo $msgGlobal; ?>
        </div>
    <?php endif; ?>
    <h2 class="block-title-2">Metodo de Pagamento</h2>
        <p>Todas as transações são seguras e criptografadas, para saber mais conulte a nossa política de privacidade</p>
    <hr>
    </div>
    <div class="col-xs-12 col-sm-12">
    <div class="paymentBox">
        <div class="panel-group paymentMethod" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading panel-heading-custom">
                    <h4 class="panel-title">
                        <a class="cashOnDelivery" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                            <span class="numberCircuil">Opção 1</span> 
                            <strong> Entrega à cobrança</strong> 
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <br>
                        <form action="checkout_XXXXXXXXXXXXXXXXXXXXXXX.php">
                        <label class="radio-inline" for="radios-4">
                            <input name="radios" id="radios-4" value="4" type="radio">
                            À Cobrança</label>
                        <div class="form-group clearfix">
                            <br>
                            <p>CTT Expresso<br>
                            Entrega enviada um dia após a encomenda com entrega prevista de 3 a 5 dias na sua morada.</p>
                        </div>
                        <div class="pull-right">
                            <button type="submit" class="btn btn-primary btn-small">
                                Seguinte &nbsp;<i class="fa fa-arrow-circle-right"></i>
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading panel-heading-custom">
                    <h4 class="panel-title">
                        <a class="masterCard" data-toggle="collapse" data-parent="#accordion" href="#collapseThree"> 
                            <span class="numberCircuil">Opção 2</span>
                            <strong>Cartão Visa</strong> 
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse">
                    <div class="panel-body">
                        <br>
                        <div class="panel open">
                            <form action="checkout_XXXXXXXXXXXXXXXXXXXXXXX.php">
                                <div class="creditCard">
                                    <img src="./images/site/payment/cartaoVisa.png" alt="Visa">

                                    <div<?php echoClassformGroup('telefone', $msgErros, $dadosSubmetidos); ?>>
                                        <label for="idTelefone">Número VISA</label>
                                        <input type="text" id="idVisa" name="visa" value="" placeholder="Escreva os 16 digitos" class="form-control">
                                    <?php echoMsgErro("telefone", $msgErros); ?>
                                    </div>
                                </div>
                                <!--creditCard-->

                                <div class="pull-right">
                                    <button type="submit" class="btn btn-primary btn-small">
                                        Seguinte &nbsp;<i class="fa fa-arrow-circle-right"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading panel-heading-custom">
                    <h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        <span class="numberCircuil">Opção 3</span><strong>&nbsp;PayPal</strong>
                    </a></h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="panel-body">
                        <br>
                        <form action="checkout_XXXXXXXXXXXXXXXXXXXXXXX.php">
                            <label class="radio-inline" for="radios-3">
                                <input name="radios" id="radios-3" value="4" type="radio">
                                <img src="images/site/payment/paypal-small.png" height="18" alt="paypal"> Pagar com paypal 
                            </label>

                            <div class="pull-right">
                                <button type="submit" class="btn btn-primary btn-small">
                                    Seguinte &nbsp;<i class="fa fa-arrow-circle-right"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>