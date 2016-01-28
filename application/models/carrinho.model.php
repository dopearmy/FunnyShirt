<?php

require_once("./application/inc/db.php");
require_once("./application/inc/dbUtils.php");
require_once("./application/models/produtos.model.php");


/*
 * Addiciona produto ao carrinho com o sub-total (qtd*preco) 
 */

function addToCarrinho($idProduto, $qtd) {
    if (!isset($qtd))
        $qtd = 1;
    $cart = array();
    if (isset($_SESSION["cart"])) {
        $cart = $_SESSION["cart"];
    }
    if (array_key_exists($idProduto, $cart)) {
        $cart[$idProduto]["qtd"] += $qtd;
        //$cart[$idProduto]["size"] = "M";
        $cart[$idProduto]["subTotal"] = $cart[$idProduto]["qtd"] * $cart[$idProduto]["Preco"];
    } else {
        $linha = getInfoProdutoID($idProduto)[0];
        $linha["qtd"] = $qtd;
        $linha["subTotal"] = $linha["Preco"] * $linha["qtd"];

        $cart[$idProduto] = $linha;
    }
    $_SESSION["cart"] = $cart;
}

/*
 * Decrementa quantidade do produto 
 */

// BUG --- não remove quando é qtd é < 0
function decQuantidadeCarrinho($idProduto) {
    $cart = array();
    if (isset($_SESSION["cart"])) {
        $cart = $_SESSION["cart"];
    }

    if (array_key_exists($idProduto, $cart)) {
        $cart[$idProduto]["qtd"] --;
        $cart[$idProduto]["subTotal"] = $cart[$idProduto]["qtd"] * $cart[$idProduto]["Preco"];

        if ($cart[$idProduto]["qtd"] < 1) {
            unset($cart[$idProduto]);
        }
    }

    $_SESSION["cart"] = $cart;
}

function getTotalQuantidadesCarrinho() {
    $total = 0;
    if (isset($_SESSION["cart"])) {
        foreach ($_SESSION["cart"] as $qtd) {
            $total += $qtd;
        }
    }
    return $total;
}

/*
 * @return o total do carrinho (total += subtotal)
 */

function getTotalCarrinho() {
    if (!isset($_SESSION["cart"])) {
        return 0;
    }
    $total = 0;
    foreach ($_SESSION["cart"] as $linha) {
        $total += $linha["subTotal"];
    }
    return $total;
}

/*
 * @return o carrinho
 */

function getCarrinho() {
    $cart = array();
    if (isset($_SESSION["cart"])) {
        $cart = $_SESSION["cart"];
    }
    return $cart;
}

/*
 * Limpa o carrinho
 */

function limparCarrinho() {
    unset($_SESSION["cart"]);
}

/*
 * Remove linha do carrinho
 */

function removerLinhaCarrinho($idProduto) {
    if (isset($_SESSION["cart"])) {
        unset($_SESSION["cart"][$idProduto]);
    }
}

/*
 * 
 */

function confirmarCarrinho($idCliente, $numVisa, $endereco, $linhaEncomenda) {
    if (!isset($_SESSION["cart"])) {
        return -1;
    }
    if (empty($_SESSION["cart"])) {
        return -1;
    }
    $idEncomenda = -1;
    $tamanho = "M";
    $total= getTotalCarrinho();
    try {
        db()->autocommit(false);
        $stmt = db()->prepare('insert into encomenda (IDCliente, Data, Total, NumVisa, Endereco, Entregue) values (?,CURDATE(), ?,?,?,0)');
        $stmt->bind_param("idds", $idCliente, $total, $numVisa, $endereco);
        $stmt->execute();

        if ($stmt->affected_rows != 1) {
            throw new Exception('Não inseriu encomenda corretamente');
        }
        $idEncomenda = db()->insert_id;
        $stmt = db()->prepare('insert into linhaencomenda (IDTShirt, Personalizada, IDImagemPersonalizada, Quantidade, Tamanho, PrecoUn) values (?, 0, null, ?, ?, ?)');
        
        var_dump("insert into linhaencomenda (IDTShirt, Personalizada, IDImagemPersonalizada, Quantidade, Tamanho, PrecoUn) values (?, 0, null, ?, ?, ?)");
        //insert into linhaencomenda (IDTShirt, Personalizada, IDImagemPersonalizada, Quantidade, Tamanho, PrecoUn) values (64, 0, null, 4, 'm', 19.9900)
        var_dump($linhaEncomenda);
        
        foreach ($linhaEncomenda as $key => $linha) {
            $preco = (float)$linha['Preco'];
            $stmt->bind_param("iisd", $key, $linha['qtd'], $tamanho, $preco);
            var_dump($key);
            var_dump($linha['qtd']);
            var_dump($tamanho);
            var_dump($preco);
            $stmt->execute();
            if ($stmt->affected_rows != 1) {
                echo "ERRORRRRRR";
                exit();
                throw new Exception('Não inseriu a encomenda corretamente');
            }
        }
        db()->commit();
        limparCarrinho();
    } catch (Exception $e) {
        db()->rollback();
    }
    db()->autocommit(true);
    return $idEncomenda;
}

//Outra versao obter carrinho
//function obtemProdutoCarrinho() {
//    if (!isset($_SESSION["cart"]))
//        return array();
//    $strINList = keyNumberArrayToInList(db(), $_SESSION["cart"]);
//    $query = "SELECT ID, Nome, Preco, DataEntrada FROM tshirt"
//            . " WHERE ID IN $strINList";
//    $stmt = db()->prepare($query);
//    $stmt->execute();
//    $result = $stmt->get_result();
//    $arrayResultado = $result->fetch_all(MYSQL_ASSOC);
//    foreach ($arrayResultado as $key => $linha) {
//        if (isset($_SESSION["cart"][$linha["ID"]])) {
//            $arrayResultado[$key]["qtd"] = $_SESSION["cart"][$linha["ID"]];
//        } else {
//            $arrayResultado[$key]["qtd"] = 0;
//        }
//        $arrayResultado[$key]["subTotal"] = $arrayResultado[$key]["qtd"] * $arrayResultado[$key]["Preco"];
//    }
//    return $arrayResultado;
//}
