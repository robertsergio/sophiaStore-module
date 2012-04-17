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
              <img src="/img/icon_pay.gif" align="left" />
          <div style=" color:#FFF; font-size:0.9em; margin-top:3px;"><b>Artículos pagados</b></div></td></tr>
          <tr>
          <td>
          <div style="height:30px; color:#26ACE1; font-size:1.2em; padding:7px; background:#FFF">Mis artículos pagados</div>
            <table align="center" width="100%" border="0" style="background:#FFF; border:1px solid #CCC">
              <tr style="background:#f2f2f2;color:#333;font-weight:bold; height:40px">
                <td align="center" style="border:1px solid #CCC">Nº Transacción</td>
                <td align="center" style="border:1px solid #CCC">Fecha de compra</td>
                <td align="center" style="border:1px solid #CCC">Forma de Pago</td>
                <td align="center" style="border:1px solid #CCC">Monto</td>
              </tr>
              
              <?php $i = 0;?>
              <?php foreach ($movements as $movement):?>
              <tr style="height:24px; font-size:0.9em; <?php echo ($i==1) ? 'background:#f2f2f2;' : '' ;?>">
                <td align="center"><?php echo $movement->getId();?></td>
                <td align="center"><?php echo $movement->getCreatedAt('Y-m-d');?></td>
                <td align="center"><?php echo FormOfPaymentPeer::getFormOfPayment($movement->getPaymentTypeId(),  Variables::$PAY_CONCEPT_CARRITO);?></td>
                <td align="center">$us <?php echo $movement->getSum();?></td>
              </tr>
              <?php $i = 1 - $i;?>
              <?php endforeach;?>
            </table>
          </td>
          </tr>
        </table>

        </td>
    </tr>
   
    </table>
  