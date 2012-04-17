<table border="0" width="100%">
  <tr>
    <td width="257" valign="top">
      <?php include_partial('categories', array('categories' => $categories)) ?>
      <br />
      <?php include_partial('tag_cloud') ?>   
    </td>
    <td width="15">&nbsp;</td>
    <td width="695" align="center" valign="top" style="background:#F2F2F2">

      <table width="100%" border="0">
        <tr>
          <td  style="background:#29AAE3" align="left">
            <?php if ($sf_user->hasFlash('error')): ?>
              <div id="sf_admin_container">
                <div class="error">
                  <h2><?php echo __($sf_user->getFlash('error'), array(), 'sf_admin') ?></h2>
                </div>
              </div>
            <?php endif; ?>
            <?php if ($sf_user->hasFlash('notice')): ?>
              <div id="sf_admin_container">
                <div class="save-ok">
                  <h2><?php echo $sf_user->getFlash('notice') ?></h2>
                </div>
              </div>
            <?php endif; ?>
            <img src="/img/icon_carrito.gif" align="left" />
            <div style=" color:#FFF; font-size:0.9em; margin-top:6px;"><b>Carro de compras</b></div>
          </td>
        </tr>
        <tr>
          <td  style="font-size:0.5em;">
            <?php if (isset($carts) && count($carts) > 1): ?>
              <?php include_partial('more_carts', array('carts' => $carts)); ?>
            <?php else: ?>
              <?php include_partial('cart_articles', array('cart_articles' => $cart_articles)); ?>
            <?php endif; ?>
          </td>
        </tr>

        <?php if (!(isset($carts) && count($carts) > 1)): ?>
          <tr><td style="background:#FFF; border-top:1px solid #ccc; border-bottom:1px solid #ccc; padding:5px">
              <table align="right" width="450" border="0">
                <tr>
                  <td>&nbsp;</td>
                  <td>
                    <div style="background:#F2F2F2; border:1px solid #CCC; padding:10px; color:#999; font-size:1.2em; text-align:center">
                      <b>Items: <font color="#0070BE"><?php echo CartPeer::getQuantityByIdSession(session_id()); ?></font></b>
                    </div>
                  </td>
                  <td style="width:20px"></td>
                  <td>
                    <div style="background:#F2F2F2; border:1px solid #CCC; padding:10px; color:#999; font-size:1.2em; text-align:center">
                      Total a pagar: <font color="#0070BE">$US <?php echo $total; ?></font>
                    </div>
                  </td>
                </tr>
              </table>
            </td></tr>
          <tr>
            <?php if (CartPeer::getQuantityByIdSession(session_id()) > 0): ?>
              <td align="center" style="padding:8px">
                <a href="<?php echo url_for(array('module' => 'sophiaStore', 'action' => 'vaciarCarrito', 'cart_id' => $cart_id)); ?>">
                  <img src="/img/btn_vaciar.gif" border="0" />
                </a>&nbsp;&nbsp;
                <a href="<?php echo url_for(array('module' => 'sophiaStore', 'action' => 'index')); ?>">
                  <img src="/img/btn_seguir.png" border="0" />
                </a>&nbsp;&nbsp;
                <a href="<?php echo url_for(array('module' => 'sophiaStore', 'action' => 'loginToStore', 'cart_id' => $cart_id)); ?>">
                  <img src="/img/btn_pagar_.png" border="0" />
                </a>            
              </td>
            <?php endif; ?>
          </tr>
        <?php endif; ?>
      </table>

    </td>
  </tr>

</table>
