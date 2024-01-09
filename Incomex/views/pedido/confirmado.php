<?php if (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>
    
   
    <h1>Tu pedido se ha confirmado</h1>
    <p>
        Para contuniar el proceso realiza el deposito a la cuenta N XXX-XXX-XXX
    </p>
    <br/>
    <?php if (isset($pedido)): ?>
        <h3>Productos:</h3>  
        <br>  


        <table>
            <tr>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Unidades</th>       
            </tr>
            <?php while ($producto = $productos->fetch_object()): ?>
                <tr>
                    <td>
                        <?php if ($producto->imagen != null): ?>
                            <img src="<?= base_url ?>/uploads/images/<?= $producto->imagen ?>" class="img_carrito" />
                        <?php else: ?>
                            <img src="<?= base_url ?>assets/img/camiseta.png" class="img_carrito"/>
                        <?php endif; ?>
                    </td>
                    <td>
                        <a href="<?= base_url ?>producto/ver&id=<?= $producto->id ?>"><?= $producto->nombre ?></a>
                    </td>
                    <td>
                        <?= $producto->precio ?>
                    </td>
                    <td>
                        <?= $producto->unidades ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
        </br>

        <h3>Datos del pedido:</h3> 
        </br> 
        <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="form_pay" target="_blank">
            <!-- Valores requeridos -->
            <input type="hidden" name="business" value="sb-zz5ay27136873@business.example.com">
            <input type="hidden" name="cmd" value="_xclick">

            <label for="item_name" class="form-label">N° Pedido</label>
            <input type="text" name="item_name" id="" value="<?= $pedido->id ?>" required=""><br>

            <label for="amount" class="form-label">Valor</label>
            <input type="text" name="amount" id="" value="<?= $pedido->coste ?>" required=""><br>

            <input type="hidden" name="currency_code" value="USD">

            <input style="display: none;" type="text" name="quantity" id="" value="1" required=""><br>
            
            <button   type="submit">Pagar ahora con Paypal! <img width="50" height="50" src="data:image/png;base64,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"></button>

        </form>

        <!--<a  href="" class="button"> Pagar por Paypal</a>
        <a href="" class="button"> Pagar por Tarjeta <img width="50" height="50" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR4UKb8sjfXC9kV464GvYfmx_XaVDYjY6llFg&usqp=CAU"></a>
        -->
    <?php endif; ?>
<?php elseif (isset($_SESSION['pedido']) && $_SESSION['pedido'] == 'complete'): ?>
    <h1>Tu pedido NO ha podido procesarse</h1>
<?php endif; ?>
