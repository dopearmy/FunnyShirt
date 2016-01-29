
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Loja Online T-Shirts">
        <meta name="author" content="Group 03 for DAW II">

        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="assets/ico/favicon.png">

        <!-- Title -->
        <title>TS | <?php echo isset($tituloPagina) ? $tituloPagina : "Título Desconhecido"; ?></title>

        <!-- Bootstrap Core CSS -->
        <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="assets/css/style.css" rel="stylesheet">
        
        <!-- jQueryUI CSS -->
        <link href="https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css" rel="stylesheet">
        
        <!-- datatables CSS -->
        <link href="http://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css" rel="stylesheet">

        <!-- gall-item Gallery for gallery page -->
        <link href="assets/plugins/magnific/magnific-popup.css" rel="stylesheet">

        <!-- Include PACE script for automatic web page progress bar -->
        <script src="assets/js/pace.min.js"></script>
    </head>

    <body>
        <!-- Fixed navbar -->
        <div class="navbar navbar-tshop navbar-fixed-top megamenu" role="navigation">
            <div class="navbar-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6">
                            <div class="pull-left ">
                                <ul class="userMenu ">
                                    <!-- Conteudo esquerda -->
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-xs-6 col-md-6 no-margin no-padding">
                            <div class="pull-right">
                                <ul class="userMenu">
                                    <?php if (isUserAnonimo()): ?>
                                        <li>
                                            <a href="login.php">
                                                <span class="hidden-xs"><i class="glyphicon glyphicon-log-in"></i>&nbsp;Login</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="registar.php">
                                                <span class="hidden-xs"><i class="glyphicon glyphicon-user"></i>&nbsp;Registar</span>
                                            </a>
                                        </li>
                                    <?php else: ?> 
                                        <?php if (isUserAdmin()): ?>
                                        <li>
                                            <a href="cp_index.php">
                                                <span class="hidden-xs" data-toggle="tooltip" data-placement="bottom" title="cPanel">
                                                <i class="glyphicon glyphicon-edit"></i>&nbsp;Painel Administração&nbsp;
                                                </span>
                                            </a>
                                        </li>
                                        <?php endif; ?>
                                        <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="hidden-xs">
                                                    <i class="glyphicon glyphicon-user"></i>&nbsp;Bem-vindo,&nbsp;</span>
                                                <?php echo getUserInfo()['UserName']; ?><b class="caret"></b>
                                            </a>
                                            <ul class="dropdown-menu">                                         
                                                <li><a href='conta.php'>Minha Conta</a></li>
                                                <li><a href='logout.php'>Sair</a></li>
                                            </ul>
                                        </li>
                                        
                                    <?php endif; ?>
                                    <!--<li class="hidden-xs">
                                        <a data-toggle="modal" data-dismiss="modal" href="#ModalSignup">
                                            <span class="hidden-xs"><i class="glyphicon glyphicon-user"></i>&nbsp;Registar</span>
                                        </a>
                                    </li>-->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/.navbar-top-->


            <div class="container">
                <div class="navbar-header">
                    <!-- Logo site -->
                    <a class="navbar-brand" href="index.php"> <img src="images/logo.png" alt="TSHOP"></a>

                    <!-- Carrinho -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">X</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-cart">
                        <i class="fa fa-shopping-cart colorWhite"></i>
                        <span class="cartRespons colorWhite">&nbsp;Cart <?php echo '(' . count($infoCart) . ')'; ?></span>
                    </button>

                    <!-- this part for mobile -->
                    <div class="search-box pull-right hidden-lg hidden-md hidden-sm">
                        <div class="input-group">
                            <button class="btn btn-nobg getFullSearch" type="button"><i class="fa fa-search"> </i></button>
                        </div>
                        <!-- /input-group -->

                    </div>
                </div>

                <!-- this part is duplicate from cartMenu  keep it for mobile -->
                <div class="navbar-cart collapse">
                    <div class="cartMenu col-lg-4 col-xs-12 col-md-4 ">
                        <div class="w100 miniCartTable scroll-pane">
                            <table>
                                <tbody>
                                    <?php
                                        foreach ($infoCart as $linha) {
                                            if (!empty($infoCart)) :
                                                ?>
                                                <tr class="miniCartProduct">
                                                    <td style="width:20%" class="miniCartProductThumb">
                                                        <div>
                                                            <a href="produtoDetalhes.php?ID=<?php echo $linha["ID"]?>">
                                                                <img src="images/product/t_shirt_<?php echo $linha["ID"] ?>.png" alt="img" class="img-responsive"> 
                                                            </a>
                                                        </div>
                                                    </td>
                                                    <td style="width:40%">
                                                        <div class="miniCartDescription">
                                                            <h4><a href="produtoDetalhes.php?ID=<?php echo $linha["ID"]?>"><?php echo $linha["Nome"] ?></a></h4>
                                                            <div class=""><span><?php echo number_format($linha['Preco'], 2, '.', '') . '&nbsp€'; ?></span></div>
                                                        </div>

                                                    <td style="width:20%" class="miniCartQuantity">
                                                        <a class="btn btn-warning btn-sm" href="carrinho_sub.php?idProduto=<?php echo $linha["ID"] ?>" role="button">-</a>
                                                        &nbsp;<?php echo $linha['qtd'] ?>&nbsp;
                                                        <a class="btn btn-success btn-sm" href="carrinho_add.php?idProduto=<?php echo $linha["ID"] ?>" role="button">+</a>

                                                    </td>
                                                    <td style="width:15%" class="miniCartSubtotal"><span class="bold"><?php echo number_format($linha['subTotal'], 2, '.', '') . '&nbsp€'; ?></span></td>
                                                    <td style="width:10%"><a class="btn btn-danger btn-sm float-right" href="carrinho_remover.php?idProduto=<?php echo $linha['ID'] ?>"><span class="apagarItem">X</span></a></td>
                                                </tr>
                                            <?php endif; 
                                        } ?>
                                </tbody>
                            </table>
                        </div>
                        <!--/.miniCartTable-->

                        <div class="miniCartFooter miniCartFooterInMobile text-right">
                            <h3 class="text-right subtotal"> 
                                Subtotal: 
                                <?php
                                //controllerInit
                                echo $totalCarrinho . '&nbsp€';
                                ?> 
                            </h3>
                            <a class="btn btn-sm btn-danger">
                                <i class="fa fa-shopping-cart"> </i> VIEW CART </a> <a class="btn btn-sm btn-primary">
                                CHECKOUT </a>
                        </div>

                        <!--/.miniCartFooter-->

                    </div>
                    <!--/.cartMenu-->
                </div>
                <!--/.navbar-cart-->

                <div class="navbar-collapse collapse">
                    <nav>
                        <ul class="nav navbar-nav">
                            <li class="active"><a href="index.php">Home</a></li>
                            <li class="dropdown megamenu-fullwidth"><a data-toggle="dropdown" class="dropdown-toggle" href="produtos.php">Produtos<b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li class="megamenu-content ">
                                        <ul class="col-lg-3 col-sm-3 col-md-3 unstyled noMarginLeft newCollectionUl">
                                            <li class="no-border">
                                                <p class="promo-1"><a href="produtos.php"><strong>Todos Produtos</strong></a></p>
                                            </li>
                                            <li><a href="produtos.php">Produtos</a></li>
                                            <li><a href="category.html">XXX</a></li>
                                            <li><a href="category.html">XXXX</a></li>
                                            <li><a href="category.html">XXXXXX</a></li>
                                        </ul>
                                        <ul class="col-lg-3 col-sm-3 col-md-3  col-xs-4">
                                            <li>
                                                <a class="newProductMenuBlock" href="product-details.html">
                                                    <img class="img-responsive" src="images/site/promo1.jpg" alt="product">
                                                    <span class="ProductMenuCaption"><i class="fa fa-caret-right"></i>TSHIRT</span> 
                                                </a>
                                            </li>
                                        </ul>
                                        <ul class="col-lg-3  col-sm-3 col-md-3 col-xs-4">
                                            <li>
                                                <a class="newProductMenuBlock" href="product-details.html">
                                                    <img class="img-responsive" src="images/site/promo2.jpg" alt="product">
                                                    <span class="ProductMenuCaption"><i class="fa fa-caret-right"></i>TSHIRT</span> 
                                                </a>
                                            </li>
                                        </ul>
                                        <ul class="col-lg-3  col-sm-3 col-md-3 col-xs-4">
                                            <li>
                                                <a class="newProductMenuBlock" href="product-details.html">
                                                    <img class="img-responsive" src="images/site/promo3.jpg" alt="product">
                                                    <span class="ProductMenuCaption"><i class="fa fa-caret-right"></i>TSHIRT</span> 
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="sobre.php">Sobre</a></li>
                            <li><a href="contatos.php">Contatos</a></li>
                        </ul>

                        <!--- this part will be hidden for mobile version -->
                        <div class="nav navbar-nav navbar-right hidden-xs">
                            <div class="dropdown  cartMenu ">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-shopping-cart"> </i>
                                    <span class="cartRespons"> Cart <?php echo '(' . count($infoCart) . ')'; ?> </span>
                                    <b class="caret"></b>
                                </a>
                                <div class="dropdown-menu col-lg-4 col-xs-12 col-md-4 ">
                                    <div class="w100 miniCartTable scroll-pane">
                                        <table style="width:100%">
                                            <tbody>
                                                <?php
                                                foreach ($infoCart as $linha) {
                                                    if (!empty($infoCart)) :
                                                        ?>
                                                        <tr class="miniCartProduct">
                                                            <td style="width:20%" class="miniCartProductThumb">
                                                                <div>
                                                                    <a href="produtoDetalhes.php?ID=<?php echo $linha["ID"]?>">
                                                                        <img src="images/product/t_shirt_<?php echo $linha["ID"] ?>.png" alt="img" class="img-responsive"> 
                                                                    </a>
                                                                </div>
                                                            </td>
                                                            <td style="width:40%">
                                                                <div class="miniCartDescription">
                                                                    <h4><a href="produtoDetalhes.php?ID=<?php echo $linha["ID"]?>"><?php echo $linha["Nome"] ?></a></h4>
                                                                    <div class=""><span><?php echo number_format($linha['Preco'], 2, '.', '') . '&nbsp€'; ?></span></div>
                                                                </div>

                                                            <td style="width:20%" class="miniCartQuantity">
                                                                <a class="btn btn-warning btn-sm" href="carrinho_sub.php?idProduto=<?php echo $linha["ID"] ?>" role="button">-</a>
                                                                &nbsp;<?php echo $linha['qtd'] ?>&nbsp;
                                                                <a class="btn btn-success btn-sm" href="carrinho_add.php?idProduto=<?php echo $linha["ID"] ?>" role="button">+</a>

                                                            </td>
                                                            
                                                            <td style="width:20%" class="miniCartQuantity">
                                                                    <?php //echo $linha['size']; ?>
                                                            </td>
                                                            <td style="width:15%" class="miniCartSubtotal"><span class="bold"><?php echo number_format($linha['subTotal'], 2, '.', '') . '&nbsp€'; ?></span></td>
                                                            <td style="width:10%"><a class="btn btn-danger btn-sm float-right" href="carrinho_remover.php?idProduto=<?php echo $linha['ID'] ?>"><span class="apagarItem">X</span></a></td>
                                                        </tr>
                                                    <?php endif; 
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--/.miniCartTable-->


                                    <div class="miniCartFooter text-right form-inline">
                                        <h3 class="text-right subtotal"> 
                                            Subtotal: 
                                            <?php
                                            //controllerInit
                                            echo $totalCarrinho . '&nbsp€';
                                            ?> 
                                        </h3>

                                        <div class="row width100 center-block">
                                            <form class="float-right" action="carrinho_show.php" method="GET">
                                                <input class="btn btn-sm btn-primary" type="submit" value="Mostar Carrinho">
                                            </form>
                                            <form class="float-left" action="carrinho_limpar.php" method="GET">
                                                <input class="btn btn-sm btn-danger" type="submit" value="Limpar">
                                            </form>
                                        </div>
                                    </div>
                                    <!--/.miniCartFooter-->


                                </div>
                                <!--/.dropdown-menu-->
                            </div>
                            <!--/.cartMenu-->


                            <div class="search-box">
                                <div class="input-group">
                                    <button class="btn btn-nobg getFullSearch" type="button"><i class="fa fa-search"> </i></button>
                                </div>
                                <!-- /input-group -->

                            </div>
                            <!--/.search-box -->
                        </div>
                        <!--/.navbar-nav hidden-xs-->
                    </nav>
                </div>
                <!--/.nav-collapse -->

            </div>
            <!--/.container -->

            <div class="search-full text-right"><a class="pull-right search-close"> <i class=" fa fa-times-circle"> </i> </a>
                <div class="searchInputBox pull-right">
                    <input type="search" data-searchurl="search?=" name="q" placeholder="Procurar" class="search-input">
                    <button class="btn-nobg search-btn" type="submit"><i class="fa fa-search"> </i></button>
                </div>
            </div>
            <!--/.search-full-->

        </div>
        <!-- /.Fixed navbar  -->


        <!-- Parallax slide -->
        <!--<div class="parallax-section parallax-fx parallax-image-aboutus parallaxOffset no-padding">
            <div class="w100 ">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="parallax-content clearfix animated ">
                                <h1 class="x2large">
                                    ABOUT TSHOP
                                </h1>
                                <h5 class="parallaxSubtitle">
                                    Lorem ipsum dolor sit amet consectetuer
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <!-- /.parallax -->

        <div class="container main-container conteudo">
            <div class="row innerPage">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row userInfo">
                        <div class="col-xs-12 col-sm-12">
                            <h3 class="section-title style2 text-center">
                                <span><?php echo isset($tituloPagina) ? $tituloPagina : "Título desconhecido"; ?></span>
                            </h3>
