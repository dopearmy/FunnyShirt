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
                            <li><a href="thirts_personalizadas.php">Personalizadas</a></li>
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
                <div id="collapsePrice" class="panel-collapse collapse ">
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
                            20€ - 50€</label>
                        <br>
                        <hr>
                        <p>Enter a Price range </p>

                        <form class="form-inline " role="form">
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleInputEmail2"
                                       placeholder="2000 $">
                            </div>
                            <div class="form-group sp"> -</div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="exampleInputPassword2"
                                       placeholder="3000 $">
                            </div>
                            <button type="submit" class="btn btn-default pull-right">check</button>
                        </form>
                    </div>
                </div>
            </div>
            <!--/price panel end-->

            <div class="panel panel-default c-out">
                <div class="panel-heading">
                    <h4 class="panel-title"><a data-toggle="collapse" href="#collapseBrand" class="collapseWill">
                            Brand <span class="pull-left"> <i class="fa fa-caret-right"></i></span> </a></h4>
                </div>
                <div id="collapseBrand" class="panel-collapse collapse ">
                    <div class="panel-body smoothscroll maxheight300">
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="0"/>
                                Armani </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="1"/>
                                Gucci </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="2"/>
                                Louis Vuitton </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="3"/>
                                Chanel </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="3"/>
                                Roberto Cavalli </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="3"/>
                                Valentino </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="3"/>
                                Ralph Lauren </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="3"/>
                                Miu Miu </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="3"/>
                                McQueen </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="3"/>
                                adidas </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="3"/>
                                Nike </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="3"/>
                                Jimmy Choo </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="3"/>
                                Bottega Veneta </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="3"/>
                                Donna Karan </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="3"/>
                                Oscar de la Renta </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="3"/>
                                Tods </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="3"/>
                                Burberry </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="3"/>
                                Michael Kors </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="3"/>
                                Mulberry </label>
                        </div>
                        <div class="block-element">
                            <label> &nbsp; </label>
                            <!-- keep it blank // -->
                        </div>
                    </div>
                </div>
            </div>
            <!--/brand panel end-->

            <div class="panel panel-default c-out">
                <div class="panel-heading">
                    <h4 class="panel-title"><a data-toggle="collapse" href="#collapseColor" class="collapseWill">
                            Color <span class="pull-left"> <i class="fa fa-caret-right"></i></span> </a></h4>
                </div>
                <div id="collapseColor" class="panel-collapse collapse ">
                    <div class="panel-body smoothscroll maxheight300 color-filter">
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="0"/>
                                <small style="background-color:#333333"></small>
                                Black <span>(123)</span> </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="1"/>
                                <small style="background-color:#1664c4"></small>
                                Blue (434) </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="2"/>
                                <small style="background-color:#c00707"></small>
                                Red (338) </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="3"/>
                                <small style="background-color:#6fcc14"></small>
                                Green (253) </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="3"/>
                                <small style="background-color:#943f00"></small>
                                Brown (240) </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="3"/>
                                <small style="background-color:#ff1cae"></small>
                                Pink (212) </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="3"/>
                                <small style="background-color:#f5f5dc"></small>
                                Beige (176) </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="3"/>
                                <small style="background-color:#adadad"></small>
                                Grey (154) </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="3"/>
                                <small style="background-color:#5d00dc"></small>
                                Purple (132) </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="3"/>
                                <small style="background-color:#f1f40e"></small>
                                Yellow (104) </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="3"/>
                                <small style="background-color:#ffc600"></small>
                                Orange (77) </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="3"/>
                                <small style="background-color:#9b1d00"></small>
                                Maroon (76) </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="3"/>
                                <small style="background-color:#0a43a3"></small>
                                Navy Blue (68) </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="3"/>
                                <small style="background-color:#ede4b2"></small>
                                Tan (67) </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="3"/>
                                <small style="background-color:#ecf1ef"></small>
                                Silver (49) </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="3"/>
                                <small style="background-color:#f3f1e7"></small>
                                Off White (44) </label>
                        </div>
                        <div class="block-element">
                            <label> &nbsp; </label>
                        </div>
                    </div>
                </div>
            </div>
            <!--/color panel end-->
            <div class="panel panel-default c-out">
                <div class="panel-heading">
                    <h4 class="panel-title"><a data-toggle="collapse" href="#collapseThree" class="collapseWill">
                            Discount <span class="pull-left"> <i class="fa fa-caret-right"></i></span> </a></h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse ">
                    <div class="panel-body">
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="3"/>
                                Non-Discounted items </label>
                        </div>
                        <div class="block-element">
                            <label>
                                <input type="checkbox" name="tour" value="3"/>
                                Discounted items </label>
                        </div>
                    </div>
                </div>
            </div>
            <!--/discount  panel end-->
        </div>
    </div>

    <!--right column-->
    <div class="col-lg-9 col-md-9 col-sm-12">
        <div class="w100 clearfix category-top">
            <h2>Todos os Produtos</h2>
            <!--<div class="categoryImage"><img src="images/site/category.jpg" class="img-responsive" alt="img"></div>-->
        </div>
        <!--/.category-top
        <div class="row subCategoryList clearfix">
            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center ">
                <div class="thumbnail equalheight"><a class="subCategoryThumb" href="sub-category.html"><img
                        src="images/product/3.jpg" class="img-rounded " alt="img"> </a> <a class="subCategoryTitle"><span> T shirt </span></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center">
                <div class="thumbnail equalheight"><a class="subCategoryThumb" href="sub-category.html"><img
                        src="images/site/casual.jpg" class="img-rounded " alt="img"> </a> <a
                        class="subCategoryTitle"><span> Shirt </span></a></div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center">
                <div class="thumbnail equalheight"><a class="subCategoryThumb" href="sub-category.html"><img
                        src="images/site/shoe.jpg" class="img-rounded " alt="img"> </a> <a class="subCategoryTitle"><span> shoes </span></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center">
                <div class="thumbnail equalheight"><a class="subCategoryThumb" href="sub-category.html"><img
                        src="images/site/jewelry.jpg" class="img-rounded " alt="img"> </a> <a
                        class="subCategoryTitle"><span> Accessories </span></a></div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center">
                <div class="thumbnail equalheight"><a class="subCategoryThumb" href="sub-category.html"><img
                        src="images/site/winter.jpg" class="img-rounded  " alt="img"> </a> <a
                        class="subCategoryTitle"><span> Winter Collection </span></a></div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-4  text-center">
                <div class="thumbnail equalheight"><a class="subCategoryThumb" href="sub-category.html"><img
                        src="images/site/Male-Fragrances.jpg" class="img-rounded " alt="img"> </a> <a
                        class="subCategoryTitle"><span> Fragrances </span></a></div>
            </div>
        </div>-->
        <!--/.subCategoryList-->

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
        } // end if 

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
              } // end else
           } // end if 
        } // end for
                         
        // if not on last page, show forward and last page links        
        if ($currentpage != $totalpages) {
           // get next page
           $nextpage = $currentpage + 1;
            // echo forward link for next page 
           echo "<li><a href='{$_SERVER['PHP_SELF']}?page=$nextpage'>></a></li>";
           // echo forward link for lastpage
           echo "<li><a href='{$_SERVER['PHP_SELF']}?page=$totalpages'>>></a></li>";
        } // end if

        ?>
        </ul>
            <div class="pull-right pull-right col-sm-4 col-xs-12 no-padding text-right text-left-xs">
                <p>Total de <strong><?php echo count($produtos) ?></strong> resultados</p>
            </div>
        </div>
    </div>
    <!--/.categoryFooter-->
</div>
<!--/right column end-->

