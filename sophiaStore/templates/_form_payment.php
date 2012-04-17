<table align="center">
  <tr>
    <td>
      <img src="/img/bnn_paypal.jpg" width="150" /> &nbsp;
      <img src="/img/bnn_checkout.jpg" width="150" /> 
    </td>
  </tr>
</table>
 <?php echo $paymentInformatinoForm->renderFormTag(url_for('sophiaStore/loginToStore')) ?>
  <?php echo $paymentInformatinoForm->renderHiddenFields(false) ?>

  <?php if ($paymentInformatinoForm->hasGlobalErrors()): ?>
    <?php echo $paymentInformatinoForm->renderGlobalErrors() ?>
  <?php endif; ?>

<table>
  <tr>
    <th>
      <font color="#666" size="2">&nbsp;&nbsp;&nbsp;Nombres:</font> 
    </th>
    <td>
      <div class="error_class<?php $paymentInformatinoForm['first_name']->hasError() and print '_yes' ?>">
        <?php echo $paymentInformatinoForm['first_name']->renderError(); ?>
      </div>
      <?php echo $paymentInformatinoForm['first_name']->render(); ?>
    </td>
  </tr>
  <tr>
    <th>
      <font color="#666" size="2">&nbsp;&nbsp;&nbsp;Apellidos:</font> 
    </th>
    <td>
      <div class="error_class<?php $paymentInformatinoForm['last_name']->hasError() and print '_yes' ?>">
        <?php echo $paymentInformatinoForm['last_name']->renderError(); ?>
      </div>
      <?php echo $paymentInformatinoForm['last_name']->render(); ?>
    </td>
  </tr>
  <tr>
    <th>
      <font color="#666" size="2">&nbsp;&nbsp;&nbsp;Número tarjeta:</font> <br/> 
    </th>
    <td>
      <div class="error_class<?php $paymentInformatinoForm['number']->hasError() and print '_yes' ?>">
        <?php echo $paymentInformatinoForm['number']->renderError(); ?>
      </div>
      <?php echo $paymentInformatinoForm['number']->render(array('id' => 'cardnumber','size' => '20')) ?>
    </td>
  </tr>
  <tr>
    <th>
      <font color="#666" size="2">&nbsp;&nbsp;&nbsp;Fecha de expiración:</font><br/> 
    </th>
    <td>
      <select name="mes">
        <?php for ($i = 1; $i <= 12; $i++): ?>
          <option value="<?php echo ($i < 10) ? '0' . $i : $i; ?>"><?php echo ($i < 10) ? '0' . $i : $i; ?></option>
        <?php endfor; ?>
      </select>

      <?php $year = getdate(); ?>
      <?php $year = $year['year']; ?>
      <select name="anio">
        <?php for ($i = $year; $i < $year + 5; $i++): ?>
          <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
        <?php endfor; ?>
      </select>
    </td>
  </tr>
  <tr>
    <th>
      <font color="#666" size="2">&nbsp;&nbsp;&nbsp;Codigo de seguridad:</font><br/> 
    </th>
    <td>
      <div class="error_class<?php $paymentInformatinoForm['cvv_code']->hasError() and print '_yes' ?>">
        <?php echo $paymentInformatinoForm['cvv_code']->renderError(); ?>
      </div>
      <?php echo $paymentInformatinoForm['cvv_code']->render(array('size' => '5', 'id' => 'cvv_code')); ?>
    </td>
  </tr>
  <tr>
    <th>
      <font color="#666" size="2">&nbsp;&nbsp;&nbsp;Direccion:</font> <br/> 
    </th>
    <td>
      <div class="error_class<?php $paymentInformatinoForm['address']->hasError() and print '_yes' ?>">
        <?php echo $paymentInformatinoForm['address']->renderError(); ?>
      </div>
      <?php echo $paymentInformatinoForm['address']->render(array('cols' => '26', 'rows' => '2')); ?>
    </td>
  </tr>
  <tr>
    <th>
      <font color="#666" size="2">&nbsp;&nbsp;&nbsp;C.I.: &nbsp;&nbsp;&nbsp;</font> <br/> 
    </th>
    <td>
      <div class="error_class<?php $paymentInformatinoForm['document']->hasError() and print '_yes' ?>">
        <?php echo $paymentInformatinoForm['document']->renderError(); ?>
      </div>
      <?php echo $paymentInformatinoForm['document']->render(array('id' => 'ci')); ?>
    </td>
  </tr>
  <tr>
    <th>
      <font color="#666" size="2">&nbsp;&nbsp;&nbsp;E-Mail:</font> <br/> 
    </th>
    <td>
      <div class="error_class<?php $paymentInformatinoForm['email']->hasError() and print '_yes' ?>">
        <?php echo $paymentInformatinoForm['email']->renderError(); ?>
      </div>
      <?php echo $paymentInformatinoForm['email']->render(); ?>
    </td>
  </tr>
  <tr>
    <th>
      <font color="#666" size="2">&nbsp;&nbsp;&nbsp;Comentarios:</font> <br/> 
    </th>
    <td>
      <?php echo $paymentInformatinoForm['comment']->render(); ?>
    </td>
  </tr>
</table>
<input type="image" src="/img/btn_pagar.png" width="100" align="right" style="padding-right:20px" border="0" />
</form>
<br />