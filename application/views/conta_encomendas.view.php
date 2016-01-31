<div class="row">
    <div class="col-lg-9 col-md-9 col-sm-7 col-center">
        <h1 class="section-title-inner"><span><i class="fa fa-list-alt"></i> Lista Encomendas </span></h1>

        <div class="row userInfo">
            <div class="col-lg-12">
                <h2 class="block-title-2"> Tua lista de encomendas </h2>
            </div>

            <div style="clear:both"></div>

            <div class="col-xs-12 col-sm-12">
                
                <table class="footable">
                    <thead>
                    <tr>
                        <th data-class="expand" data-sort-initial="true">
                            <span title="table sorted by this column on load">ID</span></th>
                        
                        <th data-hide="phone,tablet"><strong>Modo Pagamendo</strong></th>
                        <th data-hide="phone,tablet"><strong>Endereco</strong></th>
                        <th data-hide="phone,tablet"><strong></strong></th>
                        <th data-hide="default"> Price</th>
                        <th data-hide="default" data-type="numeric">Data</th>
                        <th data-hide="phone" data-type="numeric"> Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <?php if(!isUserCliente()): ?>
                    <tr>
                        <td class="text-center" colspan="6">Não tem encomendas no seu histórico!</td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($ordersCliente as $linha){ ?>
                        <td><strong>#<?php echo $linha['IDEncomenda']?></strong></td>
                        
                        <td><?php if(!$linha['NumVisa'] == "") echo " Visa"; else echo " Cobrança";?></td>
                        <td><?php echo $linha['Endereco'] ?></td>
                        
                        <td><a data-target="_blank">-</a></td>
                        <td><?php echo number_format($linha['Total'], 2, '.', '') ." €"?></td>
                        <td data-value="78025368997"><?php $date = date_create($linha['Data']); echo date_format($date, 'Y/m/d'); ?></td>
                        
                        <?php if($linha['Entregue'] == 1):?>
                            <td data-value="3"><span class="label label-success">Entrege</span></td>
                        <?php else: ?>
                             <td data-value="3"><span class="label label-primary">Pendente</span></td>
                         
                        <?php endif;?>
                    </tr>
                    
                    <?php } endif;?>
                    
                    </tbody>
                </table>
            </div>

            <div style="clear:both"></div>

            <div class="col-lg-12 clearfix">
                <ul class="pager">
                    <li class="previous pull-right"><a href="produtos.php"> <i class="fa fa-home"></i>&nbsp;Ir Para Loja</a>
                    </li>
                    <li class="next pull-left"><a href="conta.php"> &larr; Voltar Minha Conta</a></li>
                </ul>
            </div>
        </div>
    <!--/row end-->
    </div>
</div>