<div class="row">
    <div class="col-lg-12 ">
        <div class="row userInfo">
            <div class="thanxContent text-center">
                <h1>Encomenda número <a href="conta_encomendas.php">#<?php echo $_GET['id']; ?></a></h1>
            </div>
            <div class="col-lg-7 col-center">
                <h4></h4>
                <div class="cartContent table-responsive w100">
                    <table style="width:100%" class="cartTable cartTableBorder">
                        <tbody>
                            <tr class="CartProduct cartTableHeader">
                                <th colspan="2">Informação da encomenda</th>
                            </tr>
                            <tr class="CartProduct text-center">
                                <?php foreach ($order as $linha) { ?>
                                <tr class="CartProduct text-center">
                                    <td><strong>ID Encomenda:</strong></td>
                                    <td>
                                        <div class="text-justify text-temp">
                                            <a href=""><?php echo $linha["IDEncomenda"] ?></a>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="CartProduct text-center">
                                    <td><strong>Total:</strong></td>
                                    <td>
                                        <div class="text-justify text-temp"><?php echo number_format($linha['Total'], 2, '.', '') . '&nbsp€';?></div>
                                    </td>
                                </tr>
                                </tr>
                                <tr class="CartProduct text-center">
                                    <td><strong>Morada Destino:</strong></td>
                                    <td>
                                        <div class="text-justify text-temp"><?php echo $linha["Endereco"] ?></div>
                                    </td>
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