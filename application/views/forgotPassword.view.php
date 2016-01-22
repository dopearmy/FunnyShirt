<?php require_once("application/inc/viewUtils.php") ?> 

<div class="row">
    <div class="breadcrumbDiv col-lg-12">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active"><?php echo isset($tituloPagina) ? $tituloPagina: "Título Desconhecido";?></li>
        </ul>
    </div>
</div>

<?php if (isset($msgGlobal)) : ?>
    <div class="<?php echoAlertClass($tipoMsgGlobal);?>">
        <a href="#" class="close" data-dismiss="alert">&times;</a>
        <strong><?php echoTipoMensagem($tipoMsgGlobal);?></strong> <?php echo $msgGlobal;?>
    </div>
<?php endif; ?> 

<div class="col-lg-9 col-md-9 col-sm-7 col-center">
    <h1 class="section-title-inner"><span><i class="fa fa-unlock-alt"></i>&nbsp;Esqueces-te da tua password?</span></h1>
    <div class="row userInfo">
        <div class="col-xs-12 col-sm-12">
            <form action="forgotPassword.php" method="POST" class="form">
                <input type="hidden" name="redirectTo"<?php echoFieldValue("redirectTo", $data);?>>
                <div<?php echoClassformGroup('username', $msgErros, $dadosSubmetidos);?>>
                    <label for="idUsername">Coloca o teu Username:</label>
                    <input title="Username" id="idUsername" name="username" type="text"<?php echoFieldValue("username", $data);?> class="form-control" placeholder="Username">
                    <?php echoMsgErro("username", $msgErros); ?>
                </div>
                <div class="text-center"> 
                    <input class="btn btn-lg btn-primary btnlogin" id="idSubmit" type="submit" value="Submeter">
                    <input class="btn btn-lg btn-danger btnlogin" id="idReset" type="reset" value="Limpar">
                </div>
            </form>
            <div class="clear clearfix">
                <ul class="pager">
                    <li class="previous pull-right"><a href="login.php"> &larr; Voltar Login</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
