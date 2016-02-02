<div id="page-wrapper">
    <div id="page-inner">
        <hr>
        <a href="cp_produtos_inserir.php" class="btn btn-success">Inserir T-Shirt</a>
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
                                            <td><?php echo number_format($linha['Preco'], 2, '.', ''). " €" ?></td>
                                            <td><?php echo $linha['DataEntrada'] ?></td>
                                            <td>
                                                <a class='btn btn-info btn-xs' href='cp_produtos_editar.php?ID=<?php echo $linha['ID'] ?>'><i class="fa fa-edit"></i></a>
                                            </td>
                                            <td>    
                                                <a class='btn btn-danger btn-xs' href='cp_produtos_remover.php?ID=<?php echo $linha['ID'] ?>'><i class="fa fa-times"></i></a>
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
