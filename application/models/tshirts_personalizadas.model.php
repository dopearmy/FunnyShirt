<?php


function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function criarRegistoImagem($nomeOriginal, $extensao){
    $novoNome = $nomeOriginal;
    $novoNome = generateRandomString(20).microtime(true);

    return $novoNome;
}

function inserirNomeIgm($extensao, $filename) {
    try {
        $query = "insert into imagempersonalizada (Tipo, Path, Binario) values (?, ?, NULL)";
        $stmt = db()->prepare($query);
        $stmt->bind_param("ss", $extensao, $filename);
        $stmt->execute();
        // Nota: Se o update correu bem, a propriedade affected_rows deve ter os seguintes valores:
        // 1 - foi alterado um registo
        // 0 - a operação correu bem, mas não foi alterado nada (não afetou nenhum registo)
        if ((db()->affected_rows > 1) || (db()->affected_rows < 0))
            throw new Exception("Erro - algo se passou");
    } catch (Exception $e) {
        return false;
    }
    return true;
}

function getImagemProduto(){
    $query= "select Path from imagem where ID=?";
    $stmt= db()->prepare($query);
    $stmt->bind_param("i", $_GET["idimage"]); 
    $stmt->execute(); 
    $stmt->bind_result($ConteudoBinario);
    if(!$stmt->fetch()) { 
            //se consulta não devolve nada
            header("HTTP/1.0 204 No Content");
            exit(); 
    }
    //Tipo de conteúdo= image/jpg
    header("Content-Type: image/jpg"); 
    // Escrever conteúdo binário na resposta
    echo$ConteudoBinario;
}

function getInfoTP(){
    $query= "select * from imagempersonalizada";
    $stmt= db()->prepare($query);
    $stmt->execute();
    $result= $stmt->get_result();

    return $result->fetch_all(MYSQL_ASSOC);
}



function getPathImagem($id){
    $query= "select Path from imagempersonalizada where ID=?";
    $stmt= db()->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($Path);
    $result= $stmt->get_result();

    return $result->fetch_all(MYSQL_ASSOC);
}


/*
 * @return info do produto
 * 
 */

function getPrecoTshirt() {
    $query = "SELECT * FROM config";
    $stmt = db()->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQL_ASSOC);
}

/*
 * Alterar preço T-Shirt personalizadas
 * 
 */

function alterarPrecoPersonalizadas($preco) {
    try {
        $query = "UPDATE config SET PrecoTShirtPersonalizada=?";
        $stmt = db()->prepare($query);
        $stmt->bind_param("d", $preco);
        $stmt->execute();
        // Nota: Se o update correu bem, a propriedade affected_rows deve ter os seguintes valores:
        // 1 - foi alterado um registo
        // 0 - a operação correu bem, mas não foi alterado nada (não afetou nenhum registo)
        if ((db()->affected_rows > 1) || (db()->affected_rows < 0))
            throw new Exception("Erro - algo se passou");
    } catch (Exception $e) {
        return false;
    }
    return true;
}