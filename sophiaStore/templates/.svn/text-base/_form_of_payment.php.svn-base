<table width="100%" border="0">
  <tr><td style="font-size:0.3em">&nbsp;</td></tr>
  <tr>
    <td align="center" style="border:1px solid #E7E7E7; padding:10px">
      <a href="<?php echo url_for(array(
          'module' => 'sophiaStore', 
          'action' => 'procesarPago',
          'form_of_payment_id'=>Variables::$FORM_OF_PAYMENT_PAYPAL,
          'pay_concept_id'=>  Variables::$PAY_CONCEPT_CARRITO,
          'amount'=>'0',
          'cart_id'=>$cart_id
          ));?>">

        <img src="/img/pagos_paypal.jpg" border="0" /></a>
    </td>
  </tr>
  <tr>
    <td align="center" style="font-size:0.3em">&nbsp;</td>
  </tr>
  <tr>
    <td align="center" style="border:1px solid #E7E7E7; padding:10px">
      <a href="<?php echo url_for(array(
          'module' => 'sophiaStore', 
          'action' => 'procesarPago',
          'form_of_payment_id'=>Variables::$FORM_OF_PAYMENT_GOOGLE_CHECKOUT,
          'pay_concept_id'=>  Variables::$PAY_CONCEPT_CARRITO,
          'amount'=>'0',
          'cart_id'=>$cart_id
          ));?>">
        <img src="/img/pagos_google.jpg" alt="" border="0" />
      </a>
    </td>
  </tr>
  <tr>
    <td align="center" style="font-size:0.3em">&nbsp;</td>
  </tr>
  <?php if ($sf_user->isAuthenticated()): ?>
    <tr>
      <td align="center" style="border:1px solid #E7E7E7; padding:10px">
        <a href="#">
          <img src="/img/btn_credito.jpg" alt="" border="0" />
        </a>
      </td>
    </tr>
    <tr><td style="font-size:0.3em">&nbsp;</td></tr>
  <?php endif; ?>
</table>