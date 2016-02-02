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
                                        <th>Estado</th>

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
                                                    <span class="label label-success">Gestor</span>
                                                <?php elseif(isUserCliente()): ?>
                                                    <span class="label label-success">Cliente</span>
                                                <?php elseif(isUserFuncionario()): ?>
                                                    <span class="label label-success">Funcionário</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo $linha['ativo'] ?></td>

                                            <td class="text-center"> 
                                                
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
