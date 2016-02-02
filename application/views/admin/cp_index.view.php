<div id="page-wrapper" >
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Admin Dashboard</h2>   
                <h5>Bem-Vindo, <?php echo $_SESSION['UserInfo']['UserName']?></h5>
            </div>
        </div>              
        <!-- /. ROW  -->
        <hr>
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-6">           
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-green set-icon">
                        <i class="fa fa-shopping-cart"></i>
                    </span>
                    <div class="text-box">
                        <p class="main-text">Encomendas</p>
                        <p class="text-muted">Total: <?php echo $totalOrders ?></p>
                    </div>
                </div>
                <div class="text-center">
                    <a href="cp_encomendas.php" class="btn btn-info" style="width: 150px;">Ver</a>
                </div>
            </div>
            
            <div class="col-md-4 col-sm-6 col-xs-6">           
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-brown set-icon">
                        <i class="fa fa-rocket"></i>
                    </span>
                    <div class="text-box" >
                        <p class="main-text">Produtos</p>
                        <p class="text-muted">Total: <?php echo $totalProdutos ?></p>
                    </div>
                </div>
                <div class="text-center">
                    <a href="cp_produtos.php" class="btn btn-info" style="width: 150px;">Ver</a>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-6">           
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-red set-icon">
                        <i class="fa fa-male"></i>
                    </span>
                    <div class="text-box" >
                        <p class="main-text">Clientes</p>
                        <p class="text-muted">Total: <?php echo $totalClientes ?></p>
                    </div>
                </div>
                <div class="text-center">
                    <a href="cp_clientes.php" class="btn btn-info" style="width: 150px;">Ver</a>
                </div>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr>                
    </div>
</div>