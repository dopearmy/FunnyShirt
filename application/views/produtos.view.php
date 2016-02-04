<?php require_once("./application/inc/viewUtils.php"); ?> 

<div class="row">
    <div class="breadcrumbDiv col-lg-12">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active"><?php echo isset($tituloPagina) ? $tituloPagina : "Título Desconhecido"; ?></li>
        </ul>
    </div>
</div>

<div class="row">
    <!--left column-->
    <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="panel-group" id="accordionNo">
            <!--Category-->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapseCategory" class="collapseWill active">
                            <span class="pull-left"> <i class="fa fa-caret-right"></i></span>&nbsp;Lita de Produtos</a>
                        <span class="badge pull-right"><?php echo $countProdutos['COUNT(*)']; ?></span>
                    </h4>
                </div>
                <div id="collapseCategory" class="panel-collapse collapse in">
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked tree">
                            <li class="dropdown-tree open-tree active">
                                <a class="dropdown-tree-a">T-Shirts</a>
                            </li>
                            <li><a href="tshirts_personalizadas.php">Personalizadas</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--/Category menu end-->

            <div class="panel panel-default c-out">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" href="#collapsePrice" class="collapseWill">
                            <span class="pull-left"> <i class="fa fa-caret-right"></i></span>Preço</a>
                        <span class="pull-right clearFilter label-danger">Clear</span>
                    </h4>
                </div>
                <div id="collapsePrice" class="panel-collapse collapse in">
                    <div class="panel-body priceFilterBody">
                        <!-- -->
                        <label>
                            <input type="radio" name="agree" value="6" checked>
                            Todos</label>
                        <br>
                        <label>
                            <input type="radio" name="agree" value="0">
                            0€ - 5€</label>
                        <br>
                        <label>
                            <input type="radio" name="agree" value="1">
                            5€ - 20€</label>
                        <br>
                        <label>
                            <input type="radio" name="agree" value="2">
                            20€ - 50€
                        </label>
                        
                    </div>
                </div>
            </div>
            <!--/price panel end-->

        </div>
    </div>

    <!--right column-->
    <div class="col-lg-9 col-md-9 col-sm-12">
        <div class="w100 clearfix category-top">
            <h2>Todos os Produtos</h2>
            <!--<div class="categoryImage"><img src="images/site/category.jpg" class="img-responsive" alt="img"></div>-->
        </div>
        <div class="w100 productFilter clearfix">
            <p class="pull-left"> Total: <strong><?php echo $countProdutos['COUNT(*)']; ?></strong> produtos </p>
            <div class="pull-right ">
                <div class="change-order pull-right">
                    <select class="form-control" name="orderby">
                        <?php
                        //TODO
                        foreach ($produtos as $key => $row) {
                            $id[$key] = $row['ID'];
                            $nome[$key] = $row['Nome'];
                            $preco[$key] = $row['Preco'];
                            $dataEntrada[$key] = $row['DataEntrada'];
                        }
                        $ads = array_multisort($nome, SORT_ASC, $preco, SORT_ASC, $produtos);
                        ?>
                        <option value="0"<?php if ($orderby == 0)  ?>>Default sorting</option>
                        <option value="1"<?php if ($orderby == 1) echo "selected"; ?>>Preço: low to high</option>
                        <option value="2"<?php if ($orderby == 2) echo "selected"; ?>>Preço: high to low</option>

                    </select>
                </div>
                <div class="change-view pull-right">
                    <a href="#" title="Grid" class="grid-view"><i class="fa fa-th-large"></i></a>
                    <a href="#" title="List" class="list-view "><i class="fa fa-th-list"></i></a>
                </div>
            </div>
        </div>
        <!--/.productFilter-->
        <div class="loading-div"><img src="images/ajax-loader.gif" ></div>
        <div id="results">
            <div class="row categoryProduct xsResponse clearfix">
                <?php
                require("./application/views/produto.subview.php");
                ?>
            </div>
        </div>
        <!--/.categoryProduct || product content end-->
        
        <!--Pagination-->
        <div class="text-center">
        <ul class="pagination">
        <?php
            if ($currentpage > 1) {
               // show << link to go back to page 1
               echo "<li><a href='{$_SERVER['PHP_SELF']}?page=1'><<</a></li>";
               // get previous page num
               $prevpage = $currentpage - 1;
               // show < link to go back to 1 page
               echo "<li><a href='{$_SERVER['PHP_SELF']}?page=$prevpage'><</a></li>";
            }

            // loop to show links to range of pages around current page
            for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
               // if it's a valid page number...
               if (($x > 0) && ($x <= $totalpages)) {
                  // if we're on current page...
                  if ($x == $currentpage) {
                       echo "<li class='disabled active'><a href='{$_SERVER['PHP_SELF']}?page=$x' class='disabled'>$x</a></li>";
                     // 'highlight' it but don't make a link
                  // if not current page...
                  } else {
                     // make it a link
                     echo "<li><a href='{$_SERVER['PHP_SELF']}?page=$x'>$x</a></li>";
                  }
               }
            }

            // if not on last page, show forward and last page links        
            if ($currentpage != $totalpages) {
               // get next page
               $nextpage = $currentpage + 1;
                // echo forward link for next page 
               echo "<li><a href='{$_SERVER['PHP_SELF']}?page=$nextpage'>></a></li>";
               // echo forward link for lastpage
               echo "<li><a href='{$_SERVER['PHP_SELF']}?page=$totalpages'>>></a></li>";
            }
        ?>
        </ul>
        <!--./Pagination-->
            <div class="pull-right pull-right col-sm-4 col-xs-12 no-padding text-right text-left-xs">
                <p>Total de <strong><?php echo count($produtos) ?></strong> resultados</p>
            </div>
        </div>
    </div>
    <!--/.categoryFooter-->
</div>
<!--/right column end-->

