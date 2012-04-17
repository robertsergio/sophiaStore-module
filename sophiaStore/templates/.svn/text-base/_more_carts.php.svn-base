<table width="100%" border="0" cellspacing="5" align="center">
  <tr>
    <td style="font-size: 1.5em;" colspan="2">Usted tiene mas de un carrito. Elija uno para pagar.</td>
  </tr>
  <?php $count = ceil(count($carts) / 2); ?>
  <?php for ($i = 0; $i < $count; $i++): ?>
    <tr>
      <?php for ($k = 0; $k < 2; $k++): ?>
        <td width="50%" valign="top" style="border:1px solid #CCC; padding:3px">
          <?php if (isset($carts[($i * 2) + $k])): ?>
            <?php $cart = $carts[($i * 2) + $k]; ?>

            <div style="background:#01FFFF; text-align:right; height:18px; padding-top:4px; padding-right:2px">
              <div style="float: left;font-size: 1.5em;">
                Carrito: <?php echo $cart->getId(); ?>
              </div>
              <a title="Elimina el carrito y los articulos." href="<?php echo url_for(array('module' => 'sophiaStore', 'action' => 'deleteCart', 'id' => $cart->getId())); ?>" style="font-size:1.7em; padding:2px;">&nbsp;X&nbsp;</a>
            </div> 
            <table style="font-size:1.5em; color:#666">
              <tr>
                <td valign="top" align="left" style="padding-top: 10px; padding-left: 5px;">
                  <b>
                    <a href="<?php echo url_for(array('module' => 'sophiaStore', 'action' => 'shoppingCart', 'cart_id' => $cart->getId())) ?>" style="font-size: 1.2em;">
                      Nro. Carrito: <?php echo $cart->getId(); ?>
                    </a>
                  </b>
                  <br />
                  Fecha Creaci&oacute;n: <?php echo $cart->getCreatedAt(); ?>
                  <br />
                  <br />
                </td>
              </tr>
              <tr>
                <td align="left" colspan="3" style="padding-left: 10px;">
                  <b>Articulos</b><br/>
                  <?php $subtotal = 0;?>
                  <?php foreach ($cart->getCartArticles() as $cart_article):?>
                    <?php $subtotal += $cart_article->getquantity() * $cart_article->getPrice();?>
                    - <?php echo $cart_article->getArticle()->getName()
                            .' [ '.$cart_article->getQuantity()
                            . ' x '.$cart_article->getPrice(). ' ]';?><br/>
                  <?php endforeach;?>
                </td>
              </tr>
              <tr>
                <td align="left" colspan="3" style="padding-left: 10px;">
                  <b>Total:</b>&nbsp; $US. 
                  <?php echo $subtotal;?>
                </td>
              </tr>
            </table>
            <br />
          <?php endif; ?>
        </td>

      <?php endfor; ?>
    </tr>
  <?php endfor; ?>

</table>