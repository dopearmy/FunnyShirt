<div id="page-wrapper">
    <div id="page-inner">
        <hr>
        <div class="row">
            <div class="col-md-12">
                <!--Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>Lista de Clientes</span>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table-responsive table-striped table-bordered table-hover" cellspacing="0" id="datatable-clientes">
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
                                        <td><?php $date = date_create($linha['DataNascimento']); echo date_format($date, 'Y/m/d');?></td>
                                        <td>
                                            <a class='btn btn-info btn-xs' href='cp_clientes_editar.php?ID=<?php echo $linha['IDCliente'] ?>'><i class="fa fa-edit"></i></a>
                                        </td>
                                        <td>    
                                            <a class='btn btn-danger btn-xs' data-toggle="modal" data-target="#apagarModal" href=''><i class="fa fa-times"></i></a>
                                            <div class="modal fade" id="apagarModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title" id="myModalLabel"><i class="fa fa-exclamation-circle fa-2x"></i><strong>&nbsp;Apagar Cliente</strong></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            Deseja mesmo apagar o cliente selecionado? <br><br>
                                                            <strong>Cliente ID: </strong> <?php echo $linha['IDCliente'] ?>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="cp_clientes_remover.php?ID=<?php echo $linha['IDCliente'] ?>" method="POST">
                                                                <button type="submit" class="btn btn-danger">Apagar</button>
                                                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
