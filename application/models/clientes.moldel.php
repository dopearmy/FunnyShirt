<?php

require_once("./application/inc/db.php");

/*
 * @return info de cliente por userID
 * 
 */

function getInfoCliente($userID) {
    $query = "SELECT * FROM cliente WHERE UserID = ?";
    $stmt = db()->prepare($query);
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQL_ASSOC);
}

function validarDadosCliente($nome, $nContribuinte, $telefone, $morada, $dataNasc) {
    $arrayMensagens = array();

    if (trim($nome) == "") {
        $arrayMensagens["Nome"] = "Nome é Obrigatório";
    }

    if (trim($nContribuinte) == "") {
        $arrayMensagens["nContribuinte"] = "Número Contribuinte é obrigatório";
    } else

    if (trim($telefone) == "") {
        $arrayMensagens["telefone"] = "Telefone é obrigatório";
    } else
    if ((strlen($telefone) != 9)) {
        $arrayMensagens["telefone"] = "Telefone tem de ter 9 carateres";
    }

    if ($morada == "") {
        $arrayMensagens["morada"] = "Morada é obrigatória";
    }

    return $arrayMensagens;
}

function validarVisa($visa) {
    $arrayMensagens = array();

    if (trim($visa) == "") {
        $arrayMensagens["visa"] = "Numero Visa é obrigatório";
    } else
    if ((strlen($visa) != 16)) {
        $arrayMensagens["visa"] = "Numero Visa tem de ter 16 carateres";
    }
    
    return $arrayMensagens;
}

function alterarDadosCliente($id, $nome, $nContribuinte, $telefone, $morada, $dataNasc) {
    try {
        $query = "UPDATE cliente SET Nome=?, NumContribuinte=?, Telefone=?, Endereco=?, DataNascimento=? WHERE IDCliente=?";
        $stmt = db()->prepare($query);
        if (trim($dataNasc)=="")
            $dataNasc = NULL;
        $stmt->bind_param("siissi", $nome, $nContribuinte, $telefone, $morada, $dataNasc, $id);
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

//
///*
// * @return recebe o username e devolve email
// *
// */
//function getEmailUserByUsername($username){
//    $query= "SELECT email FROM user WHERE UserName= ?";
//    $stmt = db()->prepare($query);
//    $stmt->bind_param("s", $username);
//    $stmt->execute();
//    $result = $stmt->get_result();
//    return $result->fetch_all(MYSQL_ASSOC);
//}
//
///*
// * @return recebe o username e devolve password
// * 
// */
//function getPwdUserByUsername($username){
//    $query= "SELECT Password FROM user WHERE UserName= ?";
//    $stmt = db()->prepare($query);
//    $stmt->bind_param("s", $username);
//    $stmt->execute();
//    $result = $stmt->get_result();
//
////    return $result->fetch_all(MYSQL_ASSOC);
//    return "123";
//}
//
//
//// Verifica as credenciais (username e senha) de um determinado utilizador.
//// Devolve o userID se for válido
//// ou -1 se as credenciasi não forem válidas
//function verificarCredenciais($username, $Senha){
//    try {
//        $query= "SELECT UserID, Password FROM user WHERE UserName= ?";
//        $stmt = db()->prepare($query);
//        $stmt->bind_param("s",$username);
//        $stmt->execute();
//        $stmt->bind_result($userID, $PasswordBD);
//        //Se consulta não devolver linhas (user ID não existe):
//        if (!$stmt->fetch())
//            throw new Exception("Não existe o username");
//        //Se senha incorreta:
//        if (!Password_verify($Senha, $PasswordBD))
//            return -1;
//    } catch (Exception $e) {
//        return -1;
//    } 
//    return $userID;
//}
//
//// Verifica se a senha de um determinado utilizador é válida
//// Devolve true se senha está correta
//// caso contrário, devolve false 
//function verificarSenha($UserID, $Senha){
//    try {    
//        $query= "SELECT Password FROM user WHERE UserID= ?";
//        $stmt = db()->prepare($query);
//        $stmt->bind_param("i",$UserID);
//        $stmt->execute();
//        $stmt->bind_result($PasswordBD);
//        //Se consulta não devolver linhas (user ID não existe):
//        if (!$stmt->fetch())
//            throw new Exception("Não existe o ID do User");
//        //Se senha incorreta:
//        if (!Password_verify($Senha, $PasswordBD))
//            return false;
//    } catch (Exception $e) {
//        return false;
//    } 
//    return true;
//}
//
//// Altera a senha de um determinado utilizador
//// Devolve true se alterou corretamente
//// Devolve false se não alterou
//function alterarSenha($UserID, $NovaSenha){
//    try {    
//        $query= "UPDATE user set Password=? WHERE UserID = ?";
//        $stmt = db()->prepare($query);
//        $hash = Password_hash($NovaSenha, PASSWORD_DEFAULT);
//        $stmt->bind_param("si", $hash, $UserID);
//        $stmt->execute();
//        return $stmt->affected_rows == 1;
//    } catch (Exception $e) {
//        return false;
//    } 
//}
//
//
//
//// Verifica se as credenciais username/senha são válidas.
//// Devolve NULL se as credenciais forem inválidas
//// Se as credenciais forem válidas, devolve um array com 
//// informação sobre o utilizador (e aluno se for caso disso)
//function getUserInfoFromCredenciais($username, $senha){
//    try {
//        $userID = verificarCredenciais($username, $senha);
//        if ($userID<0)
//            throw new Exception("Credenciais inválidas");
//        $query= "SELECT UserID, UserName, TipoUser, email, ativo FROM user WHERE UserID=?";
//        $stmt = db()->prepare($query);
//        $stmt->bind_param("i",$userID);
//        $stmt->execute();
//        $result = $stmt->get_result();
//        $row = $result->fetch_assoc();
//        return $row;
//    } catch (Exception $e) {
//        return array();
//    }
//}
//
//
//
//// Usar apenas durante o desenvolvimento da aplicação
//// Não usar em produção
//// Vai alterar a senha de TODOS os utilizadores 
//// Devolve o total de senhas alteradas (-1 se houver erros)
//function resetAllSenhas($novaSenha){
//    try {
//        db()->autocommit(false);
//
//        $query= "select UserID FROM users";
//        $stmt = db()->prepare($query);
//        $stmt->execute();
//        $result = $stmt->get_result();
//        $todosUsers = $result->fetch_all(MYSQL_ASSOC);
//        $stmt->close();
//        
//        $totalAlteradas= 0;
//        $query= "UPDATE user set Password=? WHERE UserID = ?";
//        $stmt = db()->prepare($query);
//        foreach($todosUsers as $rowUser){  
//            $hash = Password_hash($novaSenha, PASSWORD_DEFAULT);
//            $stmt->bind_param("si", $hash,  $rowUser["UserID"]);
//            $stmt->execute();
//            $totalAlteradas+= $stmt->affected_rows;
//        }
//        db()->commit();
//    } catch (Exception $e) {
//        $totalAlteradas= -1;
//        db()->rollback();
//    } 
//    db()->autocommit(true);
//    return $totalAlteradas;
//}
//
//function validarLogin($username, $senha){
//    $arrayMensagens = array();
//
//    if (trim($username)=="")
//        $arrayMensagens["username"] = "Username é obrigatório";
//
//    if (trim($senha)=="")
//        $arrayMensagens["senha"] = "Senha é obrigatória";
//
//    return $arrayMensagens; 
//}
//
//function validarChangePassword($senhaAtual, $novaSenha1, $novaSenha2){
//    $arrayMensagens = array();
//
//    if (trim($senhaAtual)=="")
//        $arrayMensagens["senhaAtual"] = "Senha atual é obrigatória";
//
//    if (trim($novaSenha1)=="")
//        $arrayMensagens["novaSenha1"] = "Nova senha é obrigatória";
//
//    if (trim($novaSenha2)=="")
//        $arrayMensagens["novaSenha2"] = "Confirmação da nova senha é obrigatória";
//    else
//        if ($novaSenha1 != $novaSenha2)
//            $arrayMensagens["novaSenha2"] = "Confirmação da nova senha não é igual à nova senha";
//
//    return $arrayMensagens; 
//}
//
//
//function isUserLogged(){
//    return isset($_SESSION['UserInfo']);
//}
//
//function isUserAnonimo(){
//    return !isUserLogged();
//}
//
//function isUserAdmin(){
//    if (isset($_SESSION['UserInfo']))
//        return $_SESSION['UserInfo']['tipouser']=='ADM';
//    return false;
//}
//
//function isUserAluno(){
//    if (isset($_SESSION['UserInfo']))
//        return $_SESSION['UserInfo']['tipouser']=='A';
//    return false;
//}
//
//function getUserInfo(){
//    if (isset($_SESSION['UserInfo']))
//        return $_SESSION['UserInfo'];
//    return array();
//}
