<?php require_once("./application/inc/viewUtils.php"); ?> 

<div class="row">
    <div class="breadcrumbDiv col-lg-12">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active"><?php echo isset($tituloPagina) ? $tituloPagina: "Título Desconhecido";?></li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="col-lg-9 col-md-9 col-sm-8 col-center">
        <div class="col-xs-12 col-sm-6 col-center">
            <?php if (isset($msgGlobal)) : ?>
                <div class="<?php echoAlertClass($tipoMsgGlobal);?>">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong><?php echoTipoMensagem($tipoMsgGlobal);?></strong> <?php echo $msgGlobal;?>
                </div>
            <?php endif; ?>  
            <form role="form" class="logForm" id="loginForm" action="login.php" method="POST">
                <input type="hidden" name="redirectTo"<?php echoFieldValue("redirectTo", $data);?>>
                
                <div<?php echoClassformGroup('username', $msgErros, $dadosSubmetidos);?>>
                    <label for="idUsername">Username</label>
                    <input title="Username" id="idUsername" name="username" type="text"<?php echoFieldValue("username", $data);?> class="form-control" placeholder="Username">
                    <?php echoMsgErro("username", $msgErros); ?>
                </div>
                <div<?php echoClassformGroup('senha', $msgErros, $dadosSubmetidos);?>>
                    <label for="idSenha">Password</label>
                    <input type="password" id="idSenha" name="senha"<?php echoFieldValue("senha", $data);?>class="form-control" placeholder="Password">
                    <?php echoMsgErro("senha", $msgErros); ?>
                </div>
                <div class="checkbox">
                    <label><input type="checkbox" name="rememberMe" checked="">Manter sessão iniciada</label>
                </div>
                <div class="form-group">
                    <p>
                        <a title="Recover your forgotten password" href="forgotPassword.php">Repor a tua palavra-passe?</a>
                    </p>
                </div>
                <div class="text-center"> 
                    <input class="btn btn-lg btn-primary btnlogin" id="idSubmit" type="submit" value="Login">
                    <input class="btn btn-lg btn-danger btnlogin" id="idReset" type="reset" value="Limpar">
                </div>
                
            </form>
        </div>
        <!--/row end-->
    </div>
</div>
<!--/row-->

