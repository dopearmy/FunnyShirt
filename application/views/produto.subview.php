
<?php
foreach ($produtos as $linha) {
    $linha['ID'];
    $linha['Nome'];
    $linha['Preco'];
    $linha['DataEntrada'];
}

foreach ($produtos as $linha) {
    ?>
    <div class="item col-sm-4 col-lg-4 col-md-4 col-xs-6">
        <div class="product">
            <a class="add-fav tooltipHere" data-toggle="tooltip" data-original-title="Add to Wishlist"
               data-placement="left">
                <i class="glyphicon glyphicon-heart"></i>
            </a>
            <div class="image">
                <div class="quickview">
                    <!--<a data-toggle="modal" class="btn btn-xs btn-quickview" href="ajax/product.html" data-target="#productSetailsModalAjax">Quick View </a>-->
                    <a class="btn btn-xs btn-quickview" href="produtoDetalhes.php?ID=<?php echo $linha["ID"] ?>" >Quick View </a>
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
                <span class="size">XS / S / M / L / XL</span></div><br>

            <div class="price"><span><?php echo number_format($linha['Preco'], 2, '.', '') ?>&nbsp€</span></div>
            <div class="action-control"><a href="carrinho_add.php?idProduto=<?php echo $linha['ID'] ?>" class="btn btn-primary"><span class="add2cart"><i class="glyphicon glyphicon-shopping-cart"> </i> Add to cart </span> </a></div>
        </div>
    </div>
<?php } ?>
