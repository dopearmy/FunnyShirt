<?php

require_once("./application/inc/db.php");
require_once("./application/inc/dbUtils.php");
require_once("./application/inc/paginacao.php");
require_once("./application/inc/parametros.php");




/*
 * @return info do produto
 * 
 */

function getInfoProduto() {
    $query = "SELECT ID, Nome, Preco, DataEntrada FROM tshirt";
    $stmt = db()->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQL_ASSOC);
}

/*
 * @return info do produto por ID
 * 
 */

function getInfoProdutoID($idProduto) {
    try {
        $query = "SELECT ID, Nome, Preco, DataEntrada FROM tshirt WHERE ID= ?";
        $stmt = db()->prepare($query);
        $stmt->bind_param("i", $idProduto);
        $stmt->execute();
        $result = $stmt->get_result();

        if (!$stmt->execute()) {
            throw new Exception("O produto não existe");
        }
    } catch (Exception $e) {
        return -1;
    }
    return $result->fetch_all(MYSQL_ASSOC);
}

function getCountProdutos() {
    $query = "SELECT COUNT(*) FROM tshirt";
    $stmt = db()->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQL_ASSOC);
}

/*
 * @return produtos relacionados
 * 
 */

function getProdutosRelacionados() {
    $query = "SELECT ID,Nome,Preco,DataEntrada FROM tshirt order by ID asc, Nome limit 0, 6";
    $stmt = db()->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQL_ASSOC);
}

/*
 * @return produtos afdsghj
 * 
 */

function getProdutosPage($posicaoPag, $itensPorPag) {
    $query = "SELECT ID,Nome,Preco,DataEntrada FROM tshirt order by ID asc, Nome limit $posicaoPag, $itensPorPag";
    $stmt = db()->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQL_ASSOC);
}

/*
 * @return produtos afdsghj
 * 
 */

//function obtemDisciplina($id) {
//    $query = "SELECT d.ID, d.ano, d.semestre, d.abr, d.nome, d.emailProf, " .
//            " c.abreviatura as abrCurso, c.nome as nomeCurso, c.cursoid as cursoid " .
//            "FROM disciplinas as d inner join cursos as c " .
//            "ON d.cursoid = c.cursoid where d.ID=?";
//    $stmt = db()->prepare($query);
//    $stmt->bind_param("i", $id);
//    $stmt->execute();
//    $result = $stmt->get_result();
//    $arrayFromDB = $result->fetch_all(MYSQL_ASSOC);
//    if (count($arrayFromDB) != 1)
//        return NULL;
//    else
//        return $arrayFromDB[0];
//}

//// $ano == 0 (todos os anos) 
//// $semestre == 0 (todos os anos) 
//function filterDisciplinas($ano, $semestre, $cursoid) {
//    $query = "SELECT d.ID, d.ano, d.semestre, d.abr, d.nome, d.emailProf, " .
//            " c.abreviatura as abrCurso, c.nome as nomeCurso, c.cursoid as cursoid " .
//            "FROM disciplinas as d inner join cursos as c " .
//            "ON d.cursoid = c.cursoid " .
//            "where ((d.cursoid=?) or (?=-1)) " .
//            "AND ((d.ano=?) or (?=0)) " .
//            "AND ((d.semestre=?) or (?=0)) " .
//            "order by c.abreviatura, d.ano, d.semestre";
//
//    $stmt = db()->prepare($query);
//    $stmt->bind_param("iiiiii", $cursoid, $cursoid, $ano, $ano, $semestre, $semestre);
//    $stmt->execute();
//    $result = $stmt->get_result();
//    return $result->fetch_all(MYSQL_ASSOC);
//}
//
//// $ano == 0 (todos os anos) 
//// $semestre == 0 (todos os anos) 
//function filterDisciplinasNome($ano, $semestre, $nome, $cursoid) {
//    $query = "SELECT d.ID, d.ano, d.semestre, d.abr, d.nome, d.emailProf, " .
//            " c.abreviatura as abrCurso, c.nome as nomeCurso, c.cursoid as cursoid " .
//            "FROM disciplinas as d inner join cursos as c " .
//            "ON d.cursoid = c.cursoid " .
//            "where ((d.cursoid=?) or (?=-1)) " .
//            "AND ((d.ano=?) or (?=0)) " .
//            "AND ((d.semestre=?) or (?=0)) " .
//            "AND (LOWER(d.nome) like ?) " .
//            "order by c.abreviatura, d.ano, d.semestre";
//    $stmt = db()->prepare($query);
//    $nome = strtolower("%" . $nome . "%");
//    $stmt->bind_param("iiiiiis", $cursoid, $cursoid, $ano, $ano, $semestre, $semestre, $nome);
//    $stmt->execute();
//    $result = $stmt->get_result();
//    return $result->fetch_all(MYSQL_ASSOC);
//}
//
//// $ano e $semestre são arrays com os anos e semestres a pesquisar
//function filterDisciplinasNome_2($ano, $semestre, $nome, $curso) {
//    $strInAno = numberArrayToInList(db(), $ano);
//    $strInSemestre = numberArrayToInList(db(), $semestre);
//    $strInCurso = numberArrayToInList(db(), $curso);
//    $query = "SELECT d.ID, d.ano, d.semestre, d.abr, d.nome, d.emailProf, " .
//            " c.abreviatura as abrCurso, c.nome as nomeCurso, c.cursoid as cursoid " .
//            "FROM disciplinas as d inner join cursos as c " .
//            "ON d.cursoid = c.cursoid " .
//            "where (LOWER(d.nome) like ?) " .
//            "AND (d.ano in $strInAno) " .
//            "AND (d.semestre in $strInSemestre) " .
//            "AND (d.cursoid in $strInCurso) " .
//            "order by c.abreviatura, d.ano, d.semestre";
//    $stmt = db()->prepare($query);
//    $nome = strtolower("%" . $nome . "%");
//    $stmt->bind_param("s", $nome);
//    $stmt->execute();
//    $result = $stmt->get_result();
//    return $result->fetch_all(MYSQL_ASSOC);
//}
//
//// Operações para inserir, alterar, apagar disciplinas, obter informação de uma disciplina e validar 
//function inserirDisciplina($cursoid, $ano, $semestre, $abr, $nome, $emailProf) {
//    try {
//        $query = "INSERT INTO disciplinas (cursoid, ano, semestre, abr, nome, emailProf) values (?,?,?,?,?,?)";
//        $stmt = db()->prepare($query);
//        if (trim($emailProf) == "")
//            $emailProf = NULL;
//        $stmt->bind_param("iiisss", $cursoid, $ano, $semestre, $abr, $nome, $emailProf);
//        $stmt->execute();
//        // Nota: Se o insert correu bem, a propriedade affected_rows deve ter o seguinte valor:
//        // 1 - foi inserido um registo
//        if (db()->affected_rows != 1)
//            throw new Exception("Erro - algo se passou");
//    } catch (Exception $e) {
//        return -1;
//    }
//    return db()->insert_id;
//}
//

//
//function alterarDisciplina($cursoid, $id, $ano, $semestre, $abr, $nome, $emailProf) {
//    try {
//        $query = "UPDATE disciplinas SET cursoid=?, ano=?, semestre=?, abr=?, nome=?, emailProf=? " .
//                "WHERE ID=?";
//        $stmt = db()->prepare($query);
//        if (trim($emailProf) == "")
//            $emailProf = NULL;
//        $stmt->bind_param("iiisssi", $cursoid, $ano, $semestre, $abr, $nome, $emailProf, $id);
//        $stmt->execute();
//        // Nota: Se o update correu bem, a propriedade affected_rows deve ter os seguintes valores:
//        // 1 - foi alterado um registo
//        // 0 - a operação correu bem, mas não foi alterado nada (não afetou nenhum registo)
//        if ((db()->affected_rows > 1) || (db()->affected_rows < 0))
//            throw new Exception("Erro - algo se passou");
//    } catch (Exception $e) {
//        return false;
//    }
//    return true;
//}
//
//function apagarDisciplina($id) {
//    try {
//        $query = "DELETE from disciplinas WHERE ID=?";
//        $stmt = db()->prepare($query);
//        $stmt->bind_param("i", $id);
//        $stmt->execute();
//        // Nota: Se o delete correu bem, a propriedade affected_rows deve ter o seguinte valor:
//        // 1 - foi apagado um registo
//        if (db()->affected_rows != 1)
//            throw new Exception("Erro - algo se passou");
//    } catch (Exception $e) {
//        return false;
//    }
//    return true;
//}
//
//function validarDisciplina($cursoid, $ano, $semestre, $abr, $nome, $emailProf) {
//    $arrayMensagens = array();
//
//    if (trim($cursoid) == "")
//        $arrayMensagens["cursoid"] = "Curso é obrigatório";
//
//    if (trim($ano) == "")
//        $arrayMensagens["ano"] = "Ano é obrigatório";
//    else
//    if (($ano != '1') && ($ano != '2') && ($ano != '3'))
//        $arrayMensagens["ano"] = "Valores possíveis do ano: 1, 2, 3";
//
//    if (trim($semestre) == "")
//        $arrayMensagens["semestre"] = "Semestre é obrigatório";
//    else
//    if (($semestre != '1') && ($semestre != '2'))
//        $arrayMensagens["semestre"] = "Valores possíveis do semestre: 1, 2";
//
//    if (trim($abr) == "")
//        $arrayMensagens["abr"] = "Abreviatura é obrigatória";
//    else
//    if (strlen($abr) > 7)
//        $arrayMensagens["abr"] = "Abreviatura só pode ter 7 carateres";
//
//    if (trim($nome) == "")
//        $arrayMensagens["nome"] = "Nome é obrigatório";
//
//    if (trim($emailProf) != "")
//        if (!filter_var($emailProf, FILTER_VALIDATE_EMAIL))
//            $arrayMensagens["emailProf"] = "E-mail do professor não tem o formato correto";
//
//    return $arrayMensagens;
//}
//
////function getListOfCursos(){
////	$query = "SELECT cursoid, nome FROM cursos order by nome";
////	$stmt= db()->prepare($query);
////	$stmt->execute();
////	$result = $stmt->get_result();
////	$arrayResult = array();
////	while ($row = $result->fetch_assoc())
////  		$arrayResult[$row["cursoid"]] = $row["nome"];
////	return $arrayResult;	
////}
//
////function getNomeCurso($cursoid){
////	$query = "SELECT nome FROM cursos WHERE cursoid = ?";
////	$stmt= db()->prepare($query);
////	$stmt->bind_param("i", $cursoid);
////	$stmt->execute();
////	$stmt->bind_result($nome); 
////	if ($stmt->fetch())
////		return $nome;
////	return "";
////}
