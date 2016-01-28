

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
                        <div class= "table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="datatable-clientes">
                                <thead>
                                    <tr>
                                        <th>ID Cliente</th>
                                        <th>Nome</th>
                                        <th>NIF</th>
                                        <th>Telefone</th>
                                        <th>Endereço</th>
                                        <th>Data Nasc</th>
                                        <th>User ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($clientes as $linha) { 
                                        echo "<td>" . $linha['IDCliente'] . "</td>";
                                        echo "<td>" . $linha['Nome'] . "</td>";
                                        echo "<td>" . $linha['NumContribuinte'] . "</td>";
                                        echo "<td>" . $linha['Telefone'] . "</td>";
                                        echo "<td>" . $linha['Endereco'] . "</td>";
                                        echo "<td>" . $linha['DataNascimento'] . "</td>";
                                        echo "<td>" . $linha['UserID'] . "</td>";
                                        echo "</tr>";
                                    }?>
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