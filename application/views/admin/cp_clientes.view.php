<div id="page-wrapper">
    <div id="page-inner">
        <hr>
        <div class="row">
            <div class = "col-md-12">
                <!--Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>Lista de Clientes</span>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" cellspacing="0" id="datatable-clientes">
                                <thead>
                                    <tr>
                                        <th>ID Cliente</th>
                                        <th>Nome</th>
                                        <th>NIF</th>
                                        <th>Telefone</th>
                                        <th>Endereço</th>
                                        <th>Data Nasc</th>
                                        <th>Edit</th>
                                        <th>Del</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <?php foreach ($clientes as $linha) { ?>
                                        <td><?php echo $linha['IDCliente'] ?></td>
                                        <td><?php echo $linha['Nome'] ?></td>
                                        <td><?php echo $linha['NumContribuinte'] ?></td>
                                        <td><?php echo $linha['Telefone'] ?></td>
                                        <td><?php echo $linha['Endereco'] ?></td>
                                        <td><?php echo $linha['DataNascimento'] ?></td>
                                        <td>
                                            <a class='btn btn-info btn-xs' href='cp_clientes_editar.php?idCliente=<?php echo $linha['IDCliente'] ?>'><i class="fa fa-edit"></i></a>
                                        </td>
                                        <td>    
                                            <a class='btn btn-danger btn-xs' href='cp_clientes_remover.php?idCliente=<?php echo $linha['IDCliente'] ?>'><i class="fa fa-times"></i></a>
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