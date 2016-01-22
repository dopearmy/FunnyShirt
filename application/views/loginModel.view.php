<?php require_once("./application/inc/viewUtils.php"); ?> 
<!-- Modal Login -->
<div class="modal signUpContent fade" id="ModalLogin" tabindex="-1" role="dialog">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h3 class="modal-title-site text-center">Login</h3>
            </div>
            <div class="modal-body">
                <form class="loginForm" action="" method="POST">
                    <input type="hidden" name="redirectTo"<?php echoFieldValue("redirectTo", $data);?>>
                    <div<?php echoClassformGroup('username', $msgErros, $dadosSubmetidos);?>>
                        <label for="idUsername">Username</label>
                        <input title="Username" id="idUsername" name="username" type="text"<?php echoFieldValue("username", $data);?> class="form-control" placeholder="Username">
                        <?php echoMsgErro("username", $msgErros); ?>
                    </div>
                    <div<?php echoClassformGroup('password', $msgErros, $dadosSubmetidos);?>>
                        <label for="idSenha">Password</label>
                        <input type="password" id="idSenha" name="password"<?php echoFieldValue("password", $data);?>class="form-control" placeholder="Password">
                        <?php echoMsgErro("senha", $msgErros); ?>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="checkbox">Manter sessão iniciada</label>
                    </div>
                    <div class="form-group">
                        <p>
                            <a title="Recover your forgotten password" href="forgot-password.html">Repor a tua palavra-passe?</a>
                        </p>
                    </div>
                    <div class="text-center"> 
                        <input class="btn btn-lg btn-primary btnlogin" id="idSubmit" type="submit" value="Login">
                        <input class="btn btn-lg btn-danger btnlogin" data-dismiss="modal" id="idReset" type="reset" value="Cancelar">
                    </div>
                    <!--userForm-->
                </form>
            </div>
            <div class="modal-footer">
                <p class="text-center"><a data-toggle="modal" data-dismiss="modal" href="#ModalSignup">Registar</a><br>
                    <a href="forgot-password.html">Repor a tua palavra-passe?</a>
                </p>
            </div>
        </div>
        <!-- /.modal-content -->

    </div>
    <!-- /.modal-dialog -->

</div>
<!-- /.Modal Login -->