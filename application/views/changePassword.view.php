<?php  require_once("./application/inc/viewUtils.php") ?> 

<?php if (isset($msgGlobal)) : ?>
    <div class="<?php echoAlertClass($tipoMsgGlobal);?>">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong><?php echoTipoMensagem($tipoMsgGlobal);?></strong> <?php echo $msgGlobal;?>
    </div>
<?php endif; ?>  
<form action="changepassword.php" method="post" class="form-horizontal">
    <fieldset>
        <div class="col-lg-12">
        <input type="hidden" name="redirectTo"<?php echoFieldValue("redirectTo", $data);?>>
        <div<?php echoClassformGroup('passwordCurrent', $msgErros, $dadosSubmetidos);?>>
            <label for="idSenhaAtual">Password</label>
            <input type="password" id="idSenhaAtual" name="passwordCurrent"<?php echoFieldValue("passwordCurrent", $data);?>class="form-control" placeholder="Password">
            <?php echoMsgErro("senha", $msgErros); ?>
        </div>
        <div<?php echoClassformGroup('password', $msgErros, $dadosSubmetidos);?>>
            <label for="idSenha">Password</label>
            <input type="password" id="idSenha" name="password"<?php echoFieldValue("password", $data);?>class="form-control" placeholder="Password">
            <?php echoMsgErro("senha", $msgErros); ?>
        </div>
        <div<?php echoClassformGroup('passwordConfirm', $msgErros, $dadosSubmetidos);?>>
            <label for="idSenhaConf">Password</label>
            <input type="password" id="idSenhaConf" name="passwordConfirm"<?php echoFieldValue("passwordConfirm", $data);?>class="form-control" placeholder="Password">
            <?php echoMsgErro("senha", $msgErros); ?>
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="checkbox">Manter sessão iniciada</label>
        </div>
        <div class="form-group">
            <p>
                <a title="Recover your forgotten password" href="forgot-password.html">Repor a tua palavra-passe?</a>
            </p>
        </div>
        <div class="text-center"> 
            <input class="btn btn-lg btn-primary btnlogin" id="idSubmit" type="submit" value="Login">
            <input class="btn btn-lg btn-danger btnlogin" id="idReset" type="reset" value="Limpar">
        </div>
        </div>
    </fieldset>
</form>
