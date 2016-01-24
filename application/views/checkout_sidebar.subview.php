<div class="col-lg-3 col-md-3 col-sm-12 rightSidebar">
    <div class="w100 cartMiniTable">
        <table id="cart-summary" class="std table">
            <tbody>
                <tr>
                    <td><strong>Total:</strong><br>
                        *sem taxas incl
                    </td>
                    <td class="price">
                        <?php
                        //controllerInit
                        echo $totalCarrinho . '&nbsp€';
                        ?> 
                    </td>
                </tr>
                <tr style="">
                    <td><strong>Shipping:</strong></td>
                    <td class="price"><span class="success">Free shipping!</span></td>
                </tr>

                <tr>
                    <td><strong>Total taxas:</strong></td>
                    <td class="price" id="total-tax">$0.00</td>
                </tr>
                <tr>
                    <td><strong>Total:</strong><br>
                        *taxas incl
                    </td>
                    <td class=" site-color" id="total-price">
                        <?php
                        //controllerInit
                        echo $totalCarrinho . '&nbsp€';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="input-append couponForm">
                            <input class="col-lg-8" id="appendedInputButton" type="text" value="#FreeShipping" placeholder="Código Coupon">
                            <button class="col-lg-4 btn btn-success" type="button">Aplicar</button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <!--  /cartMiniTable-->
</div>
<!--/rightSidebar-->