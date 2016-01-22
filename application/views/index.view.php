
<div class="parallax-section parallax-image-1">
    <div class="container">
        <div class="row ">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="parallax-content clearfix">
                    <h1 class="parallaxPrce">Entrega Grátis</h1>
                    <h2 class="uppercase">Aproveite já a nossa promoção</h2>
                    <div style="clear:both"><br></div>
                    <a class="btn btn-discover" href="produtos.php"><i class="fa fa-shopping-cart"></i>&nbsp;PRODUTOS</a>
                </div>
            </div>
        </div>
        <!--/.row-->
    </div>
    <!--/.container-->
</div>
<!--/.parallax-image-1-->

<div class="container main-container">
    <!-- Main component call to action -->
    <div class="row featuredPostContainer globalPadding style2">
        <h3 class="section-title style2 text-center"><span>Produtos Destaque</span></h3>
        <div id="productslider" class="owl-carousel owl-theme">
            <?php
               //TODO Colocar só destaques
                foreach ($produtosRelacionados as $linha) {
                    $linha['ID'];
                    $linha['Nome'];
                    $linha['Preco'];
                    $linha['DataEntrada'];
                }

                foreach ($produtosRelacionados as $linha) {
                echo '<div class="item">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>
                        <div class="image">
            <div class="quickview">
                <a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html" data-target="#productSetailsModalAjax">Quick View </a>
            </div>';

            //Imagem + link produto
            echo '<a href="produtoDetalhes.php?ID='.$linha['ID'].'">'
                    . '<img src="images/product/t_shirt_'.$linha['ID'].'.png" alt="img" class="img-responsive">'
                    . '</a>';

            echo '<div class="promotion"><span class="discount">15% OFF</span></div>
            </div>
            <div class="description">';

            //Nome prduto
            echo '<h4><a href="produtoDetalhes.php">' .$linha['Nome']. '</a></h4>';

            echo'<div class="grid-description">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            <strong>Tamanhos:</strong>
            <span class="size">XS / S / M / L / XL</span></div><br>';

            //Peço prduto
            echo '<div class="price"><span>' .number_format($linha['Preco'], 2, '.', ''). '&nbsp€</span></div>';
            echo '<div class="action-control"><a class="btn btn-primary"><span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                </div>
            </div>';
            }
        ?>
        <!--/.productslider-->
    </div>
    <!--/.featuredPostContainer-->
</div>
<!-- /main container -->

<div class="container main-container">
    <!-- Main component call to action -->
    <div class="morePost row featuredPostContainer style2 globalPaddingTop ">
        <h3 class="section-title style2 text-center"><span>Todos Produtos</span></h3>
        <div class="container">
            <div class="row xsResponse">
                <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>
                        <div class="image">
                            <div class="quickview">
                                <a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html"
                                   data-target="#productSetailsModalAjax">Quick View </a>
                            </div>
                            <a href="produtoDetalhes.php"><img src="images/product/30.jpg" alt="img"
                                                                class="img-responsive"></a>

                            <div class="promotion"><span class="new-product"> NEW</span> <span
                                    class="discount">15% OFF</span></div>
                        </div>
                        <div class="description">
                            <h4><a href="produtoDetalhes.php">aliquam erat volutpat</a></h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span> <span class="old-price">$75</span></div>
                        <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                                class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image">
                            <div class="quickview">
                                <a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html"
                                   data-target="#productSetailsModalAjax">Quick View </a>
                            </div>
                            <a href="produtoDetalhes.php"><img src="images/product/31.jpg" alt="img"
                                                                class="img-responsive"></a>

                            <div class="promotion"><span class="discount">15% OFF</span></div>
                        </div>
                        <div class="description">
                            <h4><a href="produtoDetalhes.php">ullamcorper suscipit lobortis </a></h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span></div>
                        <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                                class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image">
                            <div class="quickview">
                                <a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html"
                                   data-target="#productSetailsModalAjax">Quick View </a>
                            </div>
                            <a href="produtoDetalhes.php"><img src="images/product/34.jpg" alt="img"
                                                                class="img-responsive"></a>

                            <div class="promotion"><span class="new-product"> NEW</span></div>
                        </div>
                        <div class="description">
                            <h4><a href="produtoDetalhes.php">demonstraverunt lectores </a></h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span></div>
                        <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                                class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image">
                            <div class="quickview">
                                <a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html"
                                   data-target="#productSetailsModalAjax">Quick View </a>
                            </div>
                            <a href="produtoDetalhes.php"><img src="images/product/12.jpg" alt="img"
                                                                class="img-responsive"></a></div>
                        <div class="description">
                            <h4><a href="produtoDetalhes.php">humanitatis per</a></h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span></div>
                        <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                                class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image">
                            <div class="quickview">
                                <a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html"
                                   data-target="#productSetailsModalAjax">Quick View </a>
                            </div>
                            <a href="produtoDetalhes.php"><img src="images/product/33.jpg" alt="img"
                                                                class="img-responsive"></a></div>
                        <div class="description">
                            <h4><a href="produtoDetalhes.php">Eodem modo typi</a></h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span></div>
                        <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                                class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image">
                            <div class="quickview">
                                <a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html"
                                   data-target="#productSetailsModalAjax">Quick View </a>
                            </div>
                            <a href="produtoDetalhes.php"><img src="images/product/10.jpg" alt="img"
                                                                class="img-responsive"></a></div>
                        <div class="description">
                            <h4><a href="produtoDetalhes.php">sequitur mutationem </a></h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span></div>
                        <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                                class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image">
                            <div class="quickview">
                                <a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html"
                                   data-target="#productSetailsModalAjax">Quick View </a>
                            </div>
                            <a href="produtoDetalhes.php"><img src="images/product/37.jpg" alt="img"
                                                                class="img-responsive"></a></div>
                        <div class="description">
                            <h4><a href="produtoDetalhes.php">consuetudium lectorum.</a></h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span></div>
                        <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                                class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->
                <div class="item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                    <div class="product">
                        <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                           data-placement="left">
                            <i class="glyphicon glyphicon-heart"></i>
                        </a>

                        <div class="image">
                            <div class="quickview">
                                <a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html"
                                   data-target="#productSetailsModalAjax">Quick View </a>
                            </div>
                            <a href="produtoDetalhes.php"><img src="images/product/35.jpg" alt="img"
                                                                class="img-responsive"></a></div>
                        <div class="description">
                            <h4><a href="produtoDetalhes.php">parum claram</a></h4>

                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. </p>
                            <span class="size">XL / XXL / S </span></div>
                        <div class="price"><span>$25</span> <span class="old-price">$75</span></div>
                        <div class="action-control"><a class="btn btn-primary"> <span class="add2cart"><i
                                class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
                    </div>
                </div>
                <!--/.item-->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="load-more-block text-center">
                    <a class="btn btn-thin" href="#"><i class="fa fa-plus-sign">+</i>&nbsp;MAIS PRODUTOS</a>
                </div>
            </div>
        </div>
        <!--/.container-->
    </div>
    <!--/.featuredPostContainer-->

    <hr class="no-margin-top">
    <div class="width100 section-block ">
        <div class="row featureImg">
            <div class="col-md-3 col-sm-3 col-xs-6">
                <a href="category.html"><img src="images/site/new-collection-1.jpg" class="img-responsive" alt="img"></a>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <a href="category.html"><img src="images/site/new-collection-2.jpg" class="img-responsive" alt="img"></a>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <a href="category.html"><img src="images/site/new-collection-3.jpg" class="img-responsive" alt="img"></a>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <a href="category.html"><img src="images/site/new-collection-4.jpg" class="img-responsive" alt="img"></a>
            </div>
        </div>
        <!--/.row-->
    </div>
    <!--/.section-block-->

    <div class="width100 section-block">
        <h3 class="section-title">
            <span>Marcas</span> 
            <a id="nextBrand" class="link pull-right carousel-nav"><i class="fa fa-angle-right"></i></a> 
            <a id="prevBrand" class="link pull-right carousel-nav"><i class="fa fa-angle-left"></i></a>
        </h3>
        <div class="row">
            <div class="col-lg-12">
                <ul class="no-margin brand-carousel owl-carousel owl-theme">
                    <li><a><img src="images/brand/1.gif" alt="img"></a></li>
                    <li><img src="images/brand/2.png" alt="img"></li>
                    <li><img src="images/brand/3.png" alt="img"></li>
                    <li><img src="images/brand/4.png" alt="img"></li>
                    <li><img src="images/brand/5.png" alt="img"></li>
                    <li><img src="images/brand/6.png" alt="img"></li>
                    <li><img src="images/brand/7.png" alt="img"></li>
                    <li><img src="images/brand/8.png" alt="img"></li>
                    <li><img src="images/brand/1.gif" alt="img"></li>
                    <li><img src="images/brand/2.png" alt="img"></li>
                    <li><img src="images/brand/3.png" alt="img"></li>
                    <li><img src="images/brand/4.png" alt="img"></li>
                    <li><img src="images/brand/5.png" alt="img"></li>
                    <li><img src="images/brand/6.png" alt="img"></li>
                    <li><img src="images/brand/7.png" alt="img"></li>
                    <li><img src="images/brand/8.png" alt="img"></li>
                </ul>
            </div>
        </div>
        <!--/.row-->
    </div>
    <!--/.section-block-->

</div>
<!--main-container-->