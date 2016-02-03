<div id="page-wrapper">
    <div id="page-inner">
        <hr>
        <div class="row">
            <div class="col-md-12">
                <!--Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <span>Lista de Utilizadores</span>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table-responsive table-striped table-bordered table-hover" cellspacing="0" id="datatable-users">
                                <thead>
                                    <tr>
                                        <th>ID User</th>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Tipo User</th>
                                        <th>Estado</th>
                                        <th>Ativar Conta</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php foreach ($users as $linha) { ?>
                                            <td><?php echo $linha['UserID'] ?></td>
                                            <td><?php echo $linha['UserName'] ?></td>
                                            <td><?php echo $linha['email'] ?></td>
                                            <td>
                                                <?php if ($linha['TipoUser'] == "G"): ?>
                                                    <span class="label label-danger">Gestor</span>
                                                <?php elseif($linha['TipoUser'] == "C"): ?>
                                                    <span class="label label-warning">Cliente</span>
                                                <?php elseif($linha['TipoUser'] == "F"): ?>
                                                    <span class="label label-info">Funcionário</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <?php if ($linha['ativo'] == 1): ?>
                                                    <span class="label label-success">Ativo</span>
                                                <?php elseif($linha['ativo'] == 0): ?>
                                                    <span class="label label-danger">Inativo</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center"> 
                                                <?php if ($linha['ativo'] == 0): ?>
                                                <a class='btn btn-success btn-xs' href='cp_utilizadores_confirmar.php?ID=<?php echo $linha['UserID'] ?>&estado=1'><i class="fa fa-check-square-o"></i></a>
                                                <?php elseif($linha['ativo'] == 1): ?>
                                                    <a class='btn btn-danger btn-xs' href='cp_utilizadores_confirmar.php?ID=<?php echo $linha['UserID'] ?>&estado=0'><i class="fa fa-minus-square-o"></i></a>
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
