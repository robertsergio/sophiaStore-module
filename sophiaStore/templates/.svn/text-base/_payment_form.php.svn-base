 <form name="forms_of_payment" action="<?php echo url_for(array('module' => 'sophiaStore', 'action' => 'payExternalClient')); ?>" method="POST">
  <p>Formas de Pago:</p>
  <div id="elements" style="text-align: left;">
    <?php foreach ($form_of_payments as $form_of_payment): ?>
      <input type="radio" name="form_of_payment" value="<?php echo $form_of_payment->getId(); ?>" style="text-align: left;"/>
      <?php echo $form_of_payment; ?><br/>
    <?php endforeach; ?>

  </div>

  <input type="submit" value="Pay" />
</form>