<div id="page-wrapper">
    <div id="page-inner">
        <hr>
        <div class="row">
            <div class = "col-md-12">
                <!--Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>Lista de Produtos</span>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive text-center">
                            <table class="table table-striped table-bordered table-hover table-responsive" id="datatable-produtos">
                                <thead>
                                    <tr>
                                        <th>ID Produto</th>
                                        <th>Nome</th>
                                        <th>Preco</th>
                                        <th>DataEntrada</th>
                                        <th>Edit</th>
                                        <th>Del</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php foreach ($produtos as $linha) { ?>
                                            <td><?php echo $linha['ID'] ?></td>
                                            <td><?php echo $linha['Nome'] ?></td>
                                            <td><?php echo $linha['Preco'] ?></td>
                                            <td><?php echo $linha['DataEntrada'] ?></td>
                                            <td>
                                                <a class='btn btn-info btn-xs' href='cp_clientes_editar.php?idCliente=<?php echo $linha['ID'] ?>'><i class="fa fa-edit"></i></a>
                                            </td>
                                            <td>    
                                                <a class='btn btn-danger btn-xs' href='cp_clientes_remover.php?idCliente=<?php echo $linha['ID'] ?>'><i class="fa fa-times"></i></a>
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
