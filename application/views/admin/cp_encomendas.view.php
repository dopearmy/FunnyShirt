<div id="page-wrapper">
    <div id="page-inner">
        <hr>
        <div class="row">
            <div class = "col-md-12">
                <!--Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>Lista de Encomendas</span>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table-responsive table-striped table-bordered table-hover" cellspacing="0" id="datatable-encomendas">
                                <thead>
                                    <tr>
                                        <th>ID Order</th>
                                        <th>ID Cliente</th>
                                        <th>Data</th>
                                        <th>Total</th>
                                        <th>Cartão Visa</th>
                                        <th>Endereco</th>
                                        <th>Estado</th>
                                        <th>Confirm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php foreach ($orders as $linha) { ?>
                                            <td><?php echo $linha['IDEncomenda'] ?></td>
                                            <td><?php echo $linha['IDCliente'] ?></td>
                                            <td><?php echo $linha['Data'] ?></td>
                                            <td><?php echo $linha['Total'] ?></td>
                                            <td><?php echo $linha['NumVisa'] ?></td>
                                            <td><?php echo $linha['Endereco'] ?></td>

                                            <td class="text-center">
                                                <?php if ($linha['Entregue'] == 1): ?>
                                                    <span class="label label-success">Entrege</span>
                                                <?php else: ?>
                                                    <span class="label label-primary">Pendente</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center"> 
                                                <?php if ($linha['Entregue'] == 0): ?>
                                                    <a class='btn btn-success btn-xs' href='cp_encomendas_confirmar.php?ID=<?php echo $linha['IDEncomenda'] ?>'><i class="fa fa-check-square-o"></i></a>
                                                <?php else: ?>
                                                    <a class='btn btn-default btn-xs' href='cp_encomendas_confirmar.php?ID=<?php echo $linha['IDEncomenda'] ?>' disabled><i class="fa fa-check-square-o"></i></a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>

</div>
