<div id="page-wrapper">
    <div id="page-inner">
        <hr>
        <div class="row">
            <div class = "col-md-12">
                <!--Advanced Tables -->
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">
                        <strong><span>Opções</span></strong>
                    </div>
                    <br>
                    <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            
                        </div>
                        <div class="panel-body">
                            <p class="text-center">Alterar os teus dados de Utilizador</p>
                        </div>
                        <div class="panel-footer text-center">
                            <a href="conta_opcoes.php?ID=<?php echo $_SESSION['UserInfo']['UserID'] ?>" class="btn btn-success btn-lg"><i class="fa fa-pencil"></i>&nbsp;Editar</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">
                            <p class="text-center">Modos de pagamentos Disponivies:</p>
                            <ul>
                                <li>Cartão Visa</li>
                                <li>Paypal</li>
                                <li>Cobrança</li>
                            </ul>
                        </div>
                        <div class="panel-footer text-center">
                            <a href="" class="btn btn-default btn-lg" disabled><i class="fa fa-check"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        </div>
                        <div class="panel-body">
                            <p class="text-center">Todos os Produtos</p>
                        </div>
                        <div class="panel-footer text-center">
                            <a href="podutos.php" class="btn btn-success btn-lg">Ver&nbsp;<i class="fa fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
                </div>
                <!--End Advanced Tables -->
            </div>
        </div>
    </div>
</div>
