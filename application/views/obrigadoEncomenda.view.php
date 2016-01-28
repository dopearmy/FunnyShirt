<div class="row">
    <div class="col-lg-12 ">
        <div class="row userInfo">
            <div class="thanxContent text-center">
                <h1>Obrigado pela sua compra! <br><br> Encomenda número <a href="order-status.html">#99999</a></h1>
            </div>
            <div class="col-lg-7 col-center">
                <h4></h4>
                <div class="cartContent table-responsive w100">
                    <?php if (isset($msgGlobal)) : ?>
                        <div class="<?php echoAlertClass($tipoMsgGlobal); ?>">
                            <a href="#" class="close" data-dismiss="alert">&times;</a>
                            <strong><?php echoTipoMensagem($tipoMsgGlobal); ?></strong> <?php echo $msgGlobal; ?>
                        </div>
                    <?php endif; ?>
                    <table style="width:100%" class="cartTable cartTableBorder">
                        <tbody>
                            <?php foreach ($infoCart as $linha) { ?>
                            <tr class="CartProduct cartTableHeader">
                                <td></td>
                                <td>Detalhes</td>
                                <td>QTD</td>
                                <td>Total</td>
                            </tr>
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
                                <td>
                                    &nbsp;<?php echo $linha['qtd'] ?>&nbsp;
                                </td>
                                <td class="price"><?php echo number_format($linha['subTotal'], 2, '.', '') . '&nbsp€'; ?></td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!--/row end-->

    </div>

    <!--/rightSidebar-->

</div>
<!--/row-->