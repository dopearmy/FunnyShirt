<?php
require_once("./application/inc/db.php");

/*
 * @return info de user
 * 
 */
function getInfoUser(){
    $query= "SELECT UserID, UserName, Password, email, ativo, TipoUser FROM user";
    $stmt= db()->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQL_ASSOC);
}


/*
 * @return info de user by userID
 * 
 */
function getInfoUserByID($userID){
    $query= "SELECT UserID, UserName, Password, email, ativo FROM user WHERE UserID= ?";
    $stmt = db()->prepare($query);
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQL_ASSOC);
}


/*
 * @return recebe o username e devolve email
 * 
 */
function getEmailUserByUsername($username){
    $query= "SELECT email FROM user WHERE UserName= ?";
    $stmt = db()->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQL_ASSOC);
}

/*
 * @return recebe o username e devolve password
 * 
 */
function getPwdUserByUsername($username){
    $query= "SELECT Password FROM user WHERE UserName= ?";
    $stmt = db()->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

//    return $result->fetch_all(MYSQL_ASSOC);
    return "123";
}


// Verifica as credenciais (username e senha) de um determinado utilizador.
// Devolve o userID se for válido
// ou -1 se as credenciasi não forem válidas
function verificarCredenciais($username, $Senha){
    try {
        $query= "SELECT UserID, Password FROM user WHERE UserName= ?";
        $stmt = db()->prepare($query);
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $stmt->bind_result($userID, $PasswordBD);
        //Se consulta não devolver linhas (user ID não existe):
        if (!$stmt->fetch())
            throw new Exception("Não existe o username");
        //Se senha incorreta:
        if (!Password_verify($Senha, $PasswordBD))
            return -1;
    } catch (Exception $e) {
        return -1;
    } 
    return $userID;
}

// Verifica se a senha de um determinado utilizador é válida
// Devolve true se senha está correta
// caso contrário, devolve false 
function verificarSenha($UserID, $Senha){
    try {    
        $query= "SELECT Password FROM user WHERE UserID= ?";
        $stmt = db()->prepare($query);
        $stmt->bind_param("i",$UserID);
        $stmt->execute();
        $stmt->bind_result($PasswordBD);
        //Se consulta não devolver linhas (user ID não existe):
        if (!$stmt->fetch())
            throw new Exception("Não existe o ID do User");
        //Se senha incorreta:
        if (!Password_verify($Senha, $PasswordBD))
            return false;
    } catch (Exception $e) {
        return false;
    } 
    return true;
}

// Altera a senha de um determinado utilizador
// Devolve true se alterou corretamente
// Devolve false se não alterou
function alterarSenha($UserID, $NovaSenha){
    try {    
        $query= "UPDATE user set Password=? WHERE UserID = ?";
        $stmt = db()->prepare($query);
        $hash = Password_hash($NovaSenha, PASSWORD_DEFAULT);
        $stmt->bind_param("si", $hash, $UserID);
        $stmt->execute();
        return $stmt->affected_rows == 1;
    } catch (Exception $e) {
        return false;
    } 
}



// Verifica se as credenciais username/senha são válidas.
// Devolve NULL se as credenciais forem inválidas
// Se as credenciais forem válidas, devolve um array com 
// informação sobre o utilizador (e aluno se for caso disso)
function getUserInfoFromCredenciais($username, $senha){
    try {
        $userID = verificarCredenciais($username, $senha);
        if ($userID<0)
            throw new Exception("Credenciais inválidas");
        $query= "SELECT UserID, UserName, TipoUser, email, ativo FROM user WHERE UserID=?";
        $stmt = db()->prepare($query);
        $stmt->bind_param("i",$userID);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        return $row;
    } catch (Exception $e) {
        return array();
    }
}



// Usar apenas durante o desenvolvimento da aplicação
// Não usar em produção
// Vai alterar a senha de TODOS os utilizadores 
// Devolve o total de senhas alteradas (-1 se houver erros)
function resetAllSenhas($novaSenha){
    try {
        db()->autocommit(false);

        $query= "select UserID FROM users";
        $stmt = db()->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $todosUsers = $result->fetch_all(MYSQL_ASSOC);
        $stmt->close();
        
        $totalAlteradas= 0;
        $query= "UPDATE user set Password=? WHERE UserID = ?";
        $stmt = db()->prepare($query);
        foreach($todosUsers as $rowUser){  
            $hash = Password_hash($novaSenha, PASSWORD_DEFAULT);
            $stmt->bind_param("si", $hash,  $rowUser["UserID"]);
            $stmt->execute();
            $totalAlteradas+= $stmt->affected_rows;
        }
        db()->commit();
    } catch (Exception $e) {
        $totalAlteradas= -1;
        db()->rollback();
    } 
    db()->autocommit(true);
    return $totalAlteradas;
}

function validarLogin($username, $senha){
    $arrayMensagens = array();

    if (trim($username)=="")
        $arrayMensagens["username"] = "Username é obrigatório";

    if (trim($senha)=="")
        $arrayMensagens["senha"] = "Senha é obrigatória";

    return $arrayMensagens; 
}

function validarChangePassword($senhaAtual, $novaSenha1, $novaSenha2){
    $arrayMensagens = array();

    if (trim($senhaAtual)=="")
        $arrayMensagens["senhaAtual"] = "Senha atual é obrigatória";

    if (trim($novaSenha1)=="")
        $arrayMensagens["novaSenha1"] = "Nova senha é obrigatória";

    if (trim($novaSenha2)=="")
        $arrayMensagens["novaSenha2"] = "Confirmação da nova senha é obrigatória";
    else
        if ($novaSenha1 != $novaSenha2)
            $arrayMensagens["novaSenha2"] = "Confirmação da nova senha não é igual à nova senha";

    return $arrayMensagens; 
}

function validarDadosUser($username, $email, $estadoConta) {
    $arrayMensagens = array();

    if (trim($username) == "") {
        $arrayMensagens["username"] = "Nome de Utilizador é Obrigatório";
    }

    if (trim($email) == "") {
        $arrayMensagens["email"] = "Email é obrigatório";
    } else
        if (!filter_var($email, FILTER_VALIDATE_EMAIL))
            $arrayMensagens["email"] = "Formato de email Inválido"; 
    
    if (strlen($estadoConta) != 1) {
        $arrayMensagens["estadoConta"] = " Valor tem de ser 1 ou 0 (ativado = 1) (desativado = 0)";
    } 

    return $arrayMensagens;
}

function alterarDadosUser($UserID, $username, $email, $estadoConta) {
    try {
        $query = "UPDATE user SET UserName=?, email=?, ativo=? WHERE UserID=?";
        $stmt = db()->prepare($query);
        if (trim($dataNasc)=="")
            $dataNasc = NULL;
        $stmt->bind_param("ssii", $username, $email, $estadoConta, $UserID);
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


function validarPassword($novaSenha1, $novaSenha2){
    $arrayMensagens = array();

    if (trim($novaSenha1)=="")
        $arrayMensagens["novaSenha1"] = "Senha é obrigatória";

    if (trim($novaSenha2)=="")
        $arrayMensagens["novaSenha2"] = "Confirmação da nova senha é obrigatória";
    else
        if ($novaSenha1 != $novaSenha2)
            $arrayMensagens["novaSenha2"] = "Confirmação da nova senha não é igual à nova senha";

    return $arrayMensagens; 
}


/*
 * Confirmar encomenda pelo ID
 * 
 */

function estadoUser($IDUser, $estado) {
    
    try {
        
        $query = "UPDATE user SET ativo=? WHERE UserID=?";
        $stmt = db()->prepare($query);
        $stmt->bind_param("ii", $estado, $IDUser);
        
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


/*
 * Verificar se user existe
 * 
 */
function getUserExits($username){
    $query= "SELECT EXISTS(SELECT UserID, UserName, Password, email, ativo FROM user WHERE UserName= ?)";
    $stmt = db()->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQL_ASSOC);
}



/*
 * Confirmar encomenda pelo ID
 * 
 */

function criarUser($username, $password, $tipoUser, $email, $nome, $numContribuinte, $telefone, $endereco, $dataNasc) {
    try {
        db()->autocommit(false);
        $stmt = db()->prepare('INSERT INTO user (UserName, Password, TipoUser, email, ativo) values (?,?,?,?,1)');
        $hash = Password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("ssss", $username, $hash, $tipoUser, $email);
        $stmt->execute();

        $idUser = db()->insert_id;
        
        $stmt = db()->prepare('INSERT INTO cliente (Nome, NumContribuinte, Telefone, Endereco, DataNascimento, UserID) values (?,?,?,?,?,?)');
        
        $stmt->bind_param("sdsssi", $nome, $numContribuinte, $telefone, $endereco, $dataNasc, $idUser);
       
        $stmt->execute();
         
        if ($stmt->affected_rows != 1) {
            throw new Exception('Não inseriu o cliente corretamente');
        }
        
        db()->commit();
    } catch (Exception $e) {
        db()->rollback();
    }
    db()->autocommit(true);
    return true;
}



function isUserLogged(){
    return isset($_SESSION['UserInfo']);
}

function isUserAnonimo(){
    return !isUserLogged();
}

function isUserAdmin(){
    if (isset($_SESSION['UserInfo'])) {
        return $_SESSION['UserInfo']['TipoUser'] == 'G';
    }
    return false;
}

function isUserCliente(){
    if (isset($_SESSION['UserInfo'])) {
        return $_SESSION['UserInfo']['TipoUser'] == 'C';
    }
    return false;
}

function isUserFuncionario(){
    if (isset($_SESSION['UserInfo'])) {
        return $_SESSION['UserInfo']['TipoUser'] == 'F';
    }
    return false;
}

function getUserInfo(){
    if (isset($_SESSION['UserInfo']))
        return $_SESSION['UserInfo'];
    return array();
}

function getNumCliente(){
    if (isset($_SESSION['UserInfo'])) {
        return $_SESSION['UserInfo']['IDCliente'];
    }
    return -1;
}