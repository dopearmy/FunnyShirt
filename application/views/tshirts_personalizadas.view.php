
<!--<canvas id="myCanvas" width="240" height="297" style="border:1px solid #d3d3d3;">
O teu Brower não suporta o Canvas!
</canvas>-->

<br>
<?php
if(isset($path)){
    foreach ($path as $value) {
        echo "<img id='imgUpload' style='width:0px; height: 0px;' src='".$value['Path']. "'>";
    }
}
//var_dump($path);
?>


<div class="row">
    <div class="breadcrumbDiv col-lg-12">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href="index.php">Produtos</a></li>
            <li class="active"><?php echo isset($tituloPagina) ? $tituloPagina : "Título Desconhecido"; ?></li>
        </ul>
    </div>
</div>

<div class="row transitionfx">
    <!-- left column -->
    <div class="col-lg-6 col-md-6 col-sm-6 productImageZoom">
        <div class='zoom' id=''>
            <a class="gall-item" title="product-title" style="cursor: pointer">
                <canvas id="myCanvas" width="200" height="200" style="border:1px solid #d3d3d3;">
                O teu Brower não suporta o Canvas!
                </canvas>
                <img src="images/img-base/t_shirt_frente.png" alt="img" class="img-responsive">
                
            </a>
        </div>
        <div class="zoomThumb ">
            <a class="zoomThumbLink">
                <img src="images/img-base/t_shirt_frente.png" alt="img" class="img-responsive">
            </a>
        </div>

    </div>
    <!--/ left column end -->

    <!-- right column -->
    <div class="col-lg-6 col-md-6 col-sm-5">
        <h1 class="product-title">T-Shirts Personalizadas</h1>
       
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
        
        <div class="details-description">
            <p>A tua T-Shirt Personalizada</p>
        </div>
        <div class="color-details">
            <span class="selected-color"><strong>Upload Imagem</strong></span>
            <br><br>
            <form action="tshirts_personalizadas.php?ID=<?php if(isset($idTP)) echo $idTP; ?>" method="post" enctype="multipart/form-data">
                <input type="file"name="nomeCampo">
                <br>
                <button type="submit" class="btn btn-primary btn-sm">Enviar Imagem</button>
            </form>
            <hr>
            <span class="selected-color"><strong>CORES</strong></span>
            <ul class="swatches Color">
                <li class="selected"><a style="background-color:#ffffff"> </a></li>
            </ul>
        </div>
        
        
        <!--/.color-details-->

        <div class="productFilter productFilterLook2">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-xs-6">
                    <div class="filterBox">
                        <form name="form" action="carrinho_add.php?idProduto=" method="POST">
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
<br><br>

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
