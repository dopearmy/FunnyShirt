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
                                        <th>Edit</th>
                                        <th>Del</th>
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
                                        <td>
                                            <a class='btn btn-info btn-xs' href='cp_clientes_editar.php?idCliente=<?php echo $linha['IDEncomenda'] ?>'><i class="fa fa-edit"></i></a>
                                        </td>
                                        <td>    
                                            <a class='btn btn-danger btn-xs' href='cp_clientes_remover.php?idCliente=<?php echo $linha['IDEncomenda'] ?>'><i class="fa fa-times"></i></a>
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