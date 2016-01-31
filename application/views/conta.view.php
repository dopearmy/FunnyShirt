<div class="row">
    <div class="breadcrumbDiv col-lg-12">
        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li class="active"><?php echo isset($tituloPagina) ? $tituloPagina: "Título Desconhecido";?></li>
        </ul>
    </div>
</div>
    <div class="row row-center">
        <div class="col-lg-9 col-md-9 col-sm-7 col-center">
            <h1 class="section-title-inner">
                <span><i class="fa fa-unlock-alt"></i>&nbsp;Bem-Vindo, <?php echo getUserInfo()['UserName'];?></span>
                <?php if (isset($msgGlobal)) : ?>
                    <div class="<?php echoAlertClass($tipoMsgGlobal); ?>">
                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                        <strong><?php echoTipoMensagem($tipoMsgGlobal); ?></strong> <?php echo $msgGlobal; ?>
                    </div>
                <?php endif; ?>
            </h1>
            <div class="row userInfo">
                <div class="col-xs-12 col-sm-12">
                    <!--/////TODO
                    <p>A tua conta foi criada com Sucesso!</p>
                    -->
                    <h2 class="block-title-2">
                        <span>Bem-vindo à tua conta. Aqui podes gerir todas as tuas informações pessoais e encomendas.</span>
                    </h2>
                    <ul class="myAccountList row">
                        <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4 text-center ">
                            <div class="thumbnail equalheight">
                                <a title="Histórico de Compras" href="conta_encomendas.php"><i class="fa fa-calendar"></i>&nbsp;Encomendas</a>
                            </div>
                        </li>
                        <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4 text-center">
                            <div class="thumbnail equalheight">
                                <a title="Personal information" href="conta_opcoes.php?ID=<?php echo getUserInfo()["UserID"]; ?>"><i class="fa fa-cog"></i>&nbsp;Settings</a>
                            </div>
                        </li>
                        <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4 text-center ">
                            <div class="thumbnail equalheight">
                                <a title="My wishlists" href="wishlist.html"><i class="fa fa-heart"></i>&nbsp;Wishlists</a>
                            </div>
                        </li>
                        <li class="col-lg-2 col-md-2 col-sm-3 col-xs-4 text-center ">
                            <div class="thumbnail equalheight">
                                <a title="LogOut" href="logout.php"><i class="fa fa-sign-out"></i>&nbsp;Logout</a>
                            </div>
                        </li>
                    </ul>
                    <div class="clear clearfix"></div>
                </div>
            </div>
            <!--/row end-->

        </div>
        <div class="col-lg-3 col-md-3 col-sm-5"></div>
    </div>
    <!--/row-->

    <div style="clear:both"></div>
