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
        <h1 class="section-title-inner"><span><i class="fa fa-lock"></i>&nbsp;Novo Registo</span></h1>
        <div class="row userInfo">
            <div class="col-xs-12 col-sm-6">
                <h2 class="block-title-2">Criar Nova Conta</h2>
                <form role="form" class="regForm">
                    <div class="form-group">
                        <label>Nome</label>
                        <input title="Nome" type="text" class="form-control" placeholder="Nome" required minlength="3" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input title="Please enter valid email" type="email" class="form-control" placeholder="Enter email" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input required minlength="5" title="Password" type="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="error"></div>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-user"></i>&nbsp;Criar Conta</button>
                </form>
            </div>
            <div class="col-xs-12 col-sm-6 text-center">
                <h2 class="block-title-2"><span>Já Tem Conta?</span></h2>
                <form action="login.php" method="POST">
                    <input class="btn btn-lg btn-primary btnlogin" id="idSubmit" type="submit" value="Login">
                </form>
            </div>
        </div>
        <!--/row end-->
    </div>
</div>
<!--/row-->

