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
                        <li class="active">
                            <a href="checkout_dados.php"> <i class="fa fa-map-marker "></i> <span>DADOS</span></a>
                        </li>
                        <li class="">
                            <a href="checkout_shipping.php"> <i class="fa fa-map-marker "></i> <span>SHIPPING</span></a>
                        </li>
                        <li class="">
                            <a href="checkout_pagamento.php"> <i class="fa fa-map-marker "></i> <span>PAGAMENTO</span></a>
                        </li>
                        <li class="">
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

                    <form class="form-horizontal" action="editDadosCliente.php" method="POST">
                        <input type="hidden" value="<?php
                        $data = date_create($linha['DataNascimento']);
                        echo date_format($data, "d/m/Y")
                        ?>" id="defaultDateNasc">
                        <fieldset>
                            <legend><h2 class="block-title-2">Confirme os seus dados</h2></legend>
                            <div class="col-lg-12">
                                <div class="row userInfo">
                                    <div class="col-xs-12 col-sm-8">
                                        <div<?php echoClassformGroup('nome', $msgErros, $dadosSubmetidos); ?>>
                                            <label for="idNome">Nome Completo</label>
                                            <input type="text" id="idNome" name="nome" value="<?php echo $linha['Nome']; ?>" class="form-control" disabled="">
                                            <?php echoMsgErro("nome", $msgErros); ?>
                                        </div>    
                                        <div<?php echoClassformGroup('contribuinte', $msgErros, $dadosSubmetidos); ?>>
                                            <label for="idContribuinte">Numero Contribuinte</label>
                                            <input type="text" id="idContribuinte" name="contribuinte" value="<?php echo $linha['NumContribuinte']; ?>" class="form-control" disabled="">
                                            <?php echoMsgErro("contribuinte", $msgErros); ?>
                                        </div>
                                        <div<?php echoClassformGroup('telefone', $msgErros, $dadosSubmetidos); ?>>
                                            <label for="idTelefone">Telefone</label>
                                            <input type="text" id="idTelefone" name="telefone" value="<?php echo $linha['Telefone']; ?>" class="form-control" disabled="">
                                            <?php echoMsgErro("telefone", $msgErros); ?>
                                        </div>
                                        <div<?php echoClassformGroup('endereco', $msgErros, $dadosSubmetidos); ?>>
                                            <label for="idEndereco">Morada</label>
                                            <input type="text" id="idEndereco" name="endereco" value="<?php echo $linha['Endereco']; ?>" class="form-control" disabled="">
                                            <?php echoMsgErro("endereco", $msgErros); ?>
                                        </div>
                                        <div<?php echoClassformGroup('dataNasc', $msgErros, $dadosSubmetidos); ?>>
                                            <label for="idDataNasc">Data Nascimento</label>
                                            <input type="text" id="datePicker" name="dataNasc" value="" class="form-control" disabled="">
                                            <?php echoMsgErro("dataNasc", $msgErros); ?>
                                        </div>
                                        <div class="form-group">
                                            <a class="btn btn-primary btn-small " href="conta_opcoes.php?ID=conta_opcoes.php?ID=<?php echo getUserInfo()["UserID"];?>">
                                           Atualizar Dados&nbsp; <i class="fa fa-edit"></i> </a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="cartFooter w100">
                                <div class="box-footer">
                                    <div class="pull-left">
                                        <a class="btn btn-default" href="produtos.php"> 
                                            <i class="fa fa-arrow-left"></i> &nbsp; Retroceder
                                        </a>
                                    </div>
                                    <div class="pull-right">
                                        <a class="btn btn-primary btn-small " href="checkout_shipping.php">
                                            Seguinte &nbsp; <i class="fa fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!--/ cartFooter -->
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
        <!--/row end-->

    </div>
    
    <!--rightSidebar-->
    <?php require_once('./application/views/checkout_sidebar.subview.php');?>
    <!--/rightSidebar-->
    
</div>
<!--/row-->
