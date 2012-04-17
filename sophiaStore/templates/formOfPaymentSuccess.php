<table border="0" width="100%">
  <tr>
    <td width="257" valign="top">
      <?php include_partial('categories', array('categories' => $categories)) ?>
      <br />
      <?php include_partial('tag_cloud') ?>   
    </td>
    <td width="15">&nbsp;</td>
    <td width="695" align="center" valign="top" style="background:#F2F2F2">

     <form name="forms_of_payment" action="<?php echo url_for(array('module' => 'sophiaStore', 'action' => 'formOfPayment')); ?>" method="POST">
      <p>Formas de Pago:</p>
      <div id="elements" style="text-align: left;">
        <?php foreach ($form_of_payments as $form_of_payment): ?>
          <input type="radio" name="form_of_payment" value="<?php echo $form_of_payment->getId(); ?>" style="text-align: left;"/>
          <?php echo $form_of_payment; ?><br/>
        <?php endforeach; ?>

      </div>

      <input type="submit" value="Pay" />
    </form>

    </td>
  </tr>

</table>
