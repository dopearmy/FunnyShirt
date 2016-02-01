<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Painel de Administração">
        <meta name="author" content="Group 03 for DAW II">

        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="assets/ico/favicon.png">

        <!-- Title -->
        <title>cPanel | <?php echo isset($tituloPagina) ? $tituloPagina : "Título Desconhecido"; ?></title>

        <!-- Bootstrap Core CSS -->
        <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- jQueryUI CSS -->
        <link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet">

        <!-- datatables CSS -->
        <link href="http://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css" rel="stylesheet">

        <!-- BOOTSTRAP STYLES-->
        <link href="assets/admin/css/bootstrap.css" rel="stylesheet">
        <!-- FONTAWESOME STYLES-->
        <link href="assets/admin/css/font-awesome.css" rel="stylesheet">
        <!-- CUSTOM STYLES-->
        <link href="assets/admin/css/custom.css" rel="stylesheet">
        <!-- GOOGLE FONTS-->
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    </head>
    <body>
        <div id="wrapper">
            <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="cp_index.php"><i class="fa fa-cog">&nbsp;</i>cPANEL</a> 
                </div>
                
                <div style="color: white; padding: 15px 50px 5px 50px; float: right; font-size: 16px;">
                    
                    <?php echo "Útima Visita: " . (new DateTime())->format('(Y-m-d) H:i'); ?> &nbsp;
                    <a href="logout.php" class="btn btn-danger square-btn-adjust">Logout</a> 
                </div>
            </nav>
            <!-- /. NAV TOP  -->
            <nav class="navbar-default navbar-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="main-menu">
                        <li class="text-center">
                            <img src="assets/admin/img/find_user.png" class="user-image img-responsive"/>
                            <a href="index.php" target="_blank" class="btn btn-danger"><i class="fa fa-shopping-cart"></i>IR PARA LOJA</a>
                            <br>
                        </li>
                        <li>
                            <a <?php if($page == "cp_index.php") echo 'class="active-menu"'?>  href="cp_index.php"><i class="fa fa-desktop fa-3x"></i> Dashboard</a>
                        </li>
                        <li>
                            <a <?php if($page == "cp_produtos.php") echo 'class="active-menu"'?> href="cp_produtos.php"><i class="fa fa-tags fa-3x"></i> Produtos</a>
                        </li>
                        <li>
                            <a <?php if($page == "cp_encomendas.php") echo 'class="active-menu"'?> href="cp_encomendas.php"><i class="fa fa-credit-card fa-3x"></i> Encomendas</a>
                        </li>
                        <li>
                            <a <?php if($page == "cp_clientes.php") echo 'class="active-menu"'?> href="cp_clientes.php"><i class="fa fa-users fa-3x"></i> Clientes</a>
                        </li>
                        <li>
                            <a <?php if($page == "cp_opcoes.php") echo 'class="active-menu"'?> href="cp_opcoes.php"><i class="fa fa-cogs fa-3x"></i> Opções</a>
                        </li>
                    </ul>
                </div>
            </nav>