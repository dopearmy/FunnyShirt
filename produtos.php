<?php
require_once("./application/inc/controllerInit.php");

$orderby = 0;
$calcTotalProdutos = 0;
$produtoID = 0;
$nome = "";
$preco = 0;
$dataEntrada = 0;
$produtosPorPagina = 10;
$total = 0;
$subTotal = 0;

if (isset($_GET['ID']))
    $produtoID = $_GET['ID'];

if (isset($_GET['Nome']))
    $nome = $_GET['Nome'];

if (isset($_GET['Preco']))
    $preco = $_GET['Preco'];

if (isset($_GET['DataEntrada']))
    $dataEntrada = $_GET['DataEntrada'];


//Total de produtos (COUNT(*))
$calcTotalProdutos = getCountProdutos();

foreach ($calcTotalProdutos as $value) {
    $countProdutos = $value;
}

//Devolve a info dos produtos
$produtos = getInfoProduto();

// find out how many rows are in the table 
$numrows = count(getInfoProduto());

// number of rows to show per page
$rowsperpage = 6;
// find out total pages
$totalpages = ceil((int)$numrows / $rowsperpage);

// get the current page or set a default
if (isset($_GET['page']) && is_numeric($_GET['page'])) {
   // cast var as int
   $currentpage = (int) $_GET['page'];
} else {
   // default page num
   $currentpage = 1;
} // end if

// if current page is greater than total pages...
if ($currentpage > $totalpages) {
   // set current page to last page
   $currentpage = $totalpages;
} // end if
// if current page is less than first page...
if ($currentpage < 1) {
   // set current page to first page
   $currentpage = 1;
} // end if

// the offset of the list, based on current page 
$offset = ($currentpage - 1) * $rowsperpage;

// get the info from the db 
$result=getProdutosPage($offset, $rowsperpage);


/******  build the pagination links ******/
// range of num links to show
$range = 3;

// if not on page 1, don't show back links

/****** end build pagination links ******/


// Variáveis usadas pelo do template
$tituloPagina = "Produtos";

require("./application/views/top.template.php");
require("./application/views/produtoModel.view.php");
require("./application/views/produtos.view.php");
require("./application/views/bottom.template.php");
