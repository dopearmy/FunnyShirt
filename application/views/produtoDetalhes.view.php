<div class="row">
    <div class="breadcrumbDiv col-lg-12">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php">Produtos</a></li>
            <li class="active"><?php echo isset($tituloPagina) ? $tituloPagina : "Título Desconhecido"; ?></li>
        </ul>
    </div>
</div>

<?php
foreach ($produtos as $linha) {
    $linha['ID'];
    $linha['Nome'];
    $linha['Preco'];
    $linha['DataEntrada'];
}
?>

<div class="row transitionfx">
    <!-- left column -->
    <div class="col-lg-6 col-md-6 col-sm-6 productImageZoom">
        <div class='zoom' id='zoomContent'>
            <a class="gall-item" title="product-title" href="images/product_details/hi-res-croped/1.jpg">
                <img src="images/product/t_shirt_<?php echo $produtoID //$_GET['ID'] ?>.png" alt="img" class="img-responsive">
            </a>
        </div>
        <div class="zoomThumb ">
            <a class="zoomThumbLink">
                <img src="images/product/t_shirt_<?php echo $produtoID ?>.png" alt="img" class="img-responsive">
            </a>
        </div>

    </div>
    <!--/ left column end -->

    <!-- right column -->
    <div class="col-lg-6 col-md-6 col-sm-5">
        <h1 class="product-title"><?php echo $linha['Nome'] ?></h1>
        <h3 class="product-code">REF:&nbsp0000 <?php echo $produtoID ?></h3>
        <div class="rating">
            <p>
                <span><i class="fa fa-star"></i></span> 
                <span><i class="fa fa-star"></i></span> 
                <span><i class="fa fa-star"></i></span> 
                <span><i class="fa fa-star"></i></span> 
                <span><i class="fa fa-star-o "></i></span>
                <span class="ratingInfo"> <span> / </span> <a data-toggle="modal" data-target="#modal-review"> Write a review</a> </span>
            </p>
        </div>
        <div class="product-price">
            <span class="discount">-15% Desconto</span>
            <br>

            <span class="price-sales"><?php echo number_format($linha['Preco'], 2, '.', '') ?>&nbsp;</span>
            <span class="price-standard"><?php echo number_format((($linha['Preco'] * 0.15) / 1 + $linha['Preco']), 2, '.', '') ?>&nbsp</span>

        </div>
        <div class="details-description">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
        </div>
        <div class="color-details">
            <span class="selected-color"><strong>CORES</strong></span>
            <ul class="swatches Color">
                <li class="selected"><a style="background-color:#ffffff"> </a></li>
                <li><a style="background-color:#f1f40e"> </a></li>
                <li><a style="background-color:#adadad"> </a></li>
                <li><a style="background-color:#4EC67F"> </a></li>
            </ul>
        </div>
        <!--/.color-details-->

        <div class="productFilter productFilterLook2">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-xs-6">
                    <div class="filterBox">
                        <form name="form" action="carrinho_add.php?idProduto=<?php echo $linha['ID'] ?>" method="POST">
                            <input type="text" name="quantidade" class="form-control" placeholder="Quantidade" id="quantidade" value="1">
                            <br>
                            <button type="submit" class="btn btn-primary btn-block">
                                <span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"></i>&nbsp;ADD TO CART</span> 
                            </button>
<!--                            <button type="submit" class="btn btn-default btn-block float-right">
                                <span class="add2cartfli"><i class="glyphicon glyphicon-shopping-cart"></i>&nbsp;ADD TO WISHLIST</span> 
                            </button>-->
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-6">
                    <div class="filterBox">
                        <select class="form-control">
                            <option value="" selected>Size</option>
                            <option value="XS">XS</option>
                            <option value="S">S</option>
                            <option value="M">M</option>
                            <option value="L">L</option>
                            <option value="XL">XL</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <!-- productFilter -->
        <div class="cart-actions">
            <div class="addto row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                </div>
            </div>
            <div style="clear:both"></div>
            <h3 class="incaps"><i class="fa fa fa-check-circle-o color-in"></i> Em Stock</h3>
            <h3 style="display:none" class="incaps"><i class="fa fa-minus-circle color-out"></i> Fora de stock
            </h3>
            <h3 class="incaps"><i class="glyphicon glyphicon-lock"></i> Compras Online Seguras</h3>
        </div>
        <!--/.cart-actions-->
        <div class="clear"></div>
        <div class="product-tab w100 clearfix">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#details" data-toggle="tab">Detalhes</a></li>
                <li><a href="#size" data-toggle="tab">Tamanhos</a></li>
                <li><a href="#shipping" data-toggle="tab">Shipping</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div class="tab-pane active" id="details">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit.<br><br>
                    100% Cotton<br></div>
                <div class="tab-pane" id="size"> 16" waist<br>
                    34" inseam<br>
                    10.5" front rise<br>
                    8.5" knee<br>
                    7.5" leg opening<br>
                    <br>
                    <a class="btn btn-default btn-link" data-target="#modal-size-guide" data-toggle="modal">
                        Guia Tamanhos&nbsp;<i class="fa fa-arrow-circle-o-right"></i>
                    </a>
                </div>
                <div class="tab-pane" id="shipping">
                    <table>

                        <tbody>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3">* Free Shipping</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <!-- /.tab content -->
        </div>
        <!--/.product-tab-->
        <div style="clear:both"></div>

        <div class="product-share clearfix">
            <p> Partilhar </p>
            <div class="socialIcon">
                <a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
                <a href="https://twitter.com/"><i class="fa fa-twitter"></i></a>
                <a href="https://plus.google.com"><i class="fa fa-google-plus"></i></a>
                <a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a>
            </div>
        </div>
        <!--/.product-share-->
    </div>
    <!--/ right column end -->
</div>
<!--/.row-->
<br><br><br>

<!-- Tabs produtos -->
<section class="section-product-info-bottom">
    <div class="product-tab w100 clearfix recommended">
        <div class="container-1400 container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs flat list-unstyled list-inline social-inline" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#tab1" aria-controls="home" role="tab" data-toggle="tab">Detalhes Produto</a>
                        </li>
                        <li role="presentation">
                            <a href="#tab2" aria-controls="profile" role="tab" data-toggle="tab">Informação Adicional</a>
                        </li>
                        <li role="presentation">
                            <a href="#tab3" aria-controls="messages" role="tab" data-toggle="tab">Tamanhos</a>
                        </li>
                        <li role="presentation">
                            <a href="#tab4" aria-controls="settings" role="tab" data-toggle="tab">Review Produto</a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-4">
                    <div class="review-title-bar">

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section-tab-content">
    <!-- Tab panes -->
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="tab1">
            <div class="product-story-inner ">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="hw100 display-table">
                                <div class="hw100 display-table-cell">
                                    <div class="product-story-info-box">
                                        <div class="product-story-info-text">
                                            <h3 class="title"><?php echo $linha['Nome'] ?></h3>
                                            <p class="desc">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                                                Mollitia, saepe, veritatis itaque accusantium ducimus dignissimos consectetur
                                                doloremque quod sint fugiat animi laboriosam voluptate impedit facilis dolor! 
                                                Accusamus culpa ipsum repudiandae.
                                            </p>
                                            <p><strong> 100% cotton</strong><br></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="tab2">
            <div class="product-story-inner ">
                <div class="container">
                    <div class="row has-equal-height-child">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12  is-equal">
                            <div class="hw100 display-table">
                                <div class="hw100 display-table-cell">
                                    <div class="product-story-info-box">
                                        <div class="product-story-info-text " data-wow-duration=".8s" data-wow-delay="0">
                                            <p class="desc">
                                                In legendos salutatus qui, sit primis percipit probatus at. Est vidit
                                                iuvaret platonem eu. Et nam suas sint. Adhuc putant vivendo in has,
                                                omittam persecuti pro in. An ceteros tacimates facilisis nam, ex magna
                                                consul per.
                                            </p>
                                            <ul class="list">
                                                <li>Suspendisse vestibulum lectus id viverra viverra.</li>
                                                <li>Etiam a leo ut ipsum blandit elementum .</li>
                                                <li>Proin et ex gravida, sodales mauris id, .</li>
                                                <li>Maecenas id eros nec tellus .</li>
                                                <li>Praesent imperdiet est at sem .</li>
                                                <li>Lorem ipsum dolor sit amet, .</li>
                                                <li>Pellentesque pretium diam vitae risus vestibulum, .</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 is-equal">
                            <div class="product-story-a-img " data-wow-duration="1s" data-wow-delay="0.25">
                                <img alt="Image Title" src="images/product_details/product-features.jpg" class="img-responsive">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="tab3">
            <div class="product-story-inner ">
                <div class="container">
                    <div class="row has-equal-height-child">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 is-equal">
                            <div class="product-story-a-img " data-wow-duration="1s"
                                 data-wow-delay="0.25">
                                <img alt="Image Title" src="images/product_details/size-guide-model.jpg" class="img-responsive ">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 is-equal">
                            <div class="hw100 display-table">
                                <div class="hw100 display-table-cell">
                                    <div class="product-story-info-box">
                                        <div class="product-story-info-text wow fadeInLeft" data-wow-duration=".8s" data-wow-delay="0">
                                            <h3 class="title">Fit & Care</h3>
                                            <div class="inner-content">
                                                <p>
                                                    In legendos salutatus qui, sit primis percipit probatus at. Est
                                                    vidit iuvaret platonem eu. Et nam suas sint. Adhuc putant vivendo in
                                                    has, omittam persecuti pro in. An ceteros tacimates facilisis nam,
                                                    ex magna consul per.
                                                </p>
                                                <ul class="list-unstyled no-padding">
                                                    <li>
                                                        <strong>Style:</strong> XCES
                                                    </li>
                                                    <li>
                                                        <strong>Center Back:</strong> 77
                                                    </li>
                                                    <li>
                                                        <strong>Fabric:</strong> body: 70 g/m² 100% Proin et ex gravida,
                                                        sodales &trade;
                                                    </li>
                                                    <li>
                                                        <strong>Fabric:</strong> panel: 80 g/m² 100% Maecenas id eros
                                                        nec tellus
                                                        facilisis varius
                                                    </li>
                                                    <li>
                                                        <strong>Source:</strong> Imported
                                                    </li>
                                                    <li>
                                                        <strong>Guarantee:</strong> 1 year
                                                    </li>
                                                </ul>
                                            </div>
                                            <a class="btn btn-default btn-link" data-target="#modal-size-guide" data-toggle="modal">
                                                View Size Guide <i class="fa fa-arrow-circle-o-right"></i> 
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="tab4">
            <section class="section-review whitebg" id="product-review">
                <div class="container">
                    <div class="hero-section-header productReviewTitleBAr">
                        <h3 class="hero-section-title"><i class="fa fa-2x  fa-comments-o"></i> Produto Review</h3>
                        <div class="rating commentRating">
                            <p>
                                <span><i class="fa fa-star"></i></span>
                                <span><i class="fa fa-star"></i></span>
                                <span><i class="fa fa-star"></i></span>
                                <span><i class="fa fa-star"></i></span>
                                <span><i class="fa fa-star-o"></i></span>
                                <span class="ratingInfo">
                                    <span class="ratingNumber">4.0</span> Average rating</span>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 review-sortByBar">
                            <div class="pull-left">
                                <h4 class="no-margin-no-padding uppercase"><span class="bold">2</span> Reviews</h4>
                            </div>
                            <div class="pull-right col-lg-2 no-padding">
                                <select class="form-control" style="width: 150px">
                                    <option selected>Mais Recente</option>
                                    <option>Top Rated</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="all-review-wrapper ">
                        <div class="row review-item">
                            <div class="col-lg-3 col-sm-3 left text-center">
                                <div class="review-item-user">
                                    <div class="review-item-user-profile">
                                        <img class="img-circle" alt="" src="images/product_details/user-2.jpg">
                                    </div>
                                    <div class="user-name">
                                        <p>
                                            <strong>Cristiana</strong><br>
                                            <small>01-02-2016 - 12:14</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9  col-sm-9 right">
                                <div class="rating commentRating">
                                    <p>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star-o "></i> 
                                        </span> <span class="ratingInfo"><span> / </span> 
                                            <a data-target="#modal-review" data-toggle="modal">4.0</a></span>
                                    </p>
                                </div>
                                <h5 class="reviewUserTitle"><strong>Melhor produto qualidade/preço!</strong></h5>
                                <p class="commentText">
                                    Lorem ipsum dolor sit amet, nam odio prompta ne. Mea semper repudiare in, eos ei
                                    dico tamquam noluisse. Nec albucius lucilius i
                                    ntellegebat at, cu epicurei rationibus est. Eos ei eros civibus ullamcorper,
                                    nominavi repudiare vis at. Consul albucius assentior id vim, ei sit mazim
                                    dissentias, pri ea melius laoreet delicatissimi.
                                </p>
                            </div>
                        </div>
                        <hr>
                        <div class="row review-item">
                            <div class="col-lg-3 col-sm-3 left">
                                <div class="review-item-user text-center">
                                    <div class="review-item-user-profile">
                                        <img class="img-circle" alt="" src="images/site/default-user.png">
                                    </div>
                                    <div class="user-name">
                                        <p>
                                            <strong>Micael</strong><br>
                                            <small>08-01-2016 - 14:20</small>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-9  col-sm-9 right">
                                <div class="rating commentRating">
                                    <p>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i></span>
                                        <span><i class="fa fa-star"></i> 
                                        </span> <span class="ratingInfo"><span> / </span> 
                                            <a data-target="#modal-review" data-toggle="modal">5.0</a></span>
                                    </p>
                                </div>
                                <h5 class="reviewUserTitle"><strong>Excedeu as minhas expectativas!</strong></h5>
                                <p class="commentText">
                                    Lorem ipsum dolor sit amet, nam odio prompta ne. Mea semper repudiare in, eos ei
                                    dico tamquam noluisse. Nec albucius lucilius i
                                    ntellegebat at, cu epicurei rationibus est. Eos ei eros civibus ullamcorper,
                                    nominavi repudiare vis at. Consul albucius assentior id vim, ei sit mazim
                                    dissentias, pri ea melius laoreet delicatissimi.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 review-load-more">
                            <div class=" text-center">
                                <a href="#" class="btn btn-default">
                                    <i class="fa fa-plus-sign">+</i> Load Mais Reviews
                                </a>
                                <a class="btn  btn-success" data-target="#modal-review" data-toggle="modal">
                                    <i class="fa fa-edit"></i> Escrever Reviews
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
</section>
<br><br><br>

<!-- product details additional section -->
<div class="row recommended">
    <h1>Produtos Relacionados</h1><br>
    <div id="productslider" class="owl-carousel owl-theme">
        <?php
        foreach ($produtosRelacionados as $linha) {
            $linha['ID'];
            $linha['Nome'];
            $linha['Preco'];
            $linha['DataEntrada'];
        }
        ?>
        <?php foreach ($produtosRelacionados as $linha) { ?>
            <div class="item">
                <div class="product">
                    <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
                       data-placement="left">
                        <i class="glyphicon glyphicon-heart"></i>
                    </a>
                    <div class="image">
                        <div class="quickview">
                            <!--<a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html" data-target="#productSetailsModalAjax">Quick View </a>-->
                            <a class="btn btn-xs btn-quickview" href="produtoDetalhes.php?ID=<?php echo $linha["ID"] ?>">Quick View </a>

                        </div>

                        <a href="produtoDetalhes.php?ID=<?php echo $linha['ID'] ?>">
                            <img src="images/product/t_shirt_<?php echo $linha['ID'] ?>.png" alt="img" class="img-responsive">
                        </a>

                        <div class="promotion"><span class="discount">15% OFF</span></div>
                    </div>
                    <div class="description">
                        <h4><a href="produtoDetalhes.php?ID=<?php echo $linha['ID'] ?>"><?php echo $linha['Nome'] ?></a></h4>

                        <div class="grid-description">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                        </div>
                        <strong>Tamanhos:</strong>
                        <span class="size">XS / S / M / L / XL</span>
                    </div><br>
                </div>
            </div>
        <?php } ?>

    </div>
    <!--/.recommended-->
</div>
