<table width="100%">
  <tr>
    <td align="center" style="color:#000; font-size:1.2em; font-weight:bold">Procesando ...</td>
  </tr>
</table>

<?php $total = numbers::my_other_format_number($amount); ?>

<?php if($form_of_payment_id == Variables::$FORM_OF_PAYMENT_PAYPAL): //6=PayPal ?>
  
  <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post" id="form_procesar_pago"  name="form_procesar_pago">
    
    <SCRIPT LANGUAGE="javascript">
      setTimeout("document.form_procesar_pago.submit()",10);
    </SCRIPT> 
    <?php if(!isset ($cart_articles)):?>
      <input type="hidden" name="cmd" value="_xclick">
      <input type="hidden" name="business" value="sophia_1315436258_biz@gmail.com">
      <input type="hidden" name="item_name" value="<?php echo $pay_concept->getName() ?>">
      <input type="hidden" name="amount" value="<?php echo $total?>">
      <input type="hidden" name="currency_code" value="USD">  
    <?php else:?>
       <?php $i = 1;?>
      <input type="hidden" name="cmd" value="_cart">
      <input type="hidden" name="upload" value="1">
      <?php foreach ($cart_articles as $cart_article):?>
        <input type="hidden" name="business" value="sophia_1315436258_biz@gmail.com">
        <input type="hidden" name="item_name_<?php echo $i;?>" value="<?php echo $cart_article->getArticle()->getName(); ?>">
        <input type="hidden" name="amount_<?php echo $i;?>" value="<?php echo $cart_article->getPrice();?>">
        <input type="hidden" name="quantity_<?php echo $i;?>" value="<?php echo $cart_article->getQuantity();?>"/>
        <input type="hidden" name="currency_code" value="USD"> 
        <?php $i++;?>
      <?php endforeach;?>
    <?php endif;?>
<?php elseif ($form_of_payment_id == Variables::$FORM_OF_PAYMENT_GOOGLE_CHECKOUT): // 7=GoogleCheckOut ?>

  <?php echo form_tag('https://sandbox.google.com/checkout/api/checkout/v2/checkoutForm/Merchant/232582430778768', 
        array('name' => 'form_procesar_pago', 'multipart' => false, 'method' => 'post', 'accept-charset'=>'utf-8')) ?>
    
    <SCRIPT LANGUAGE="javascript">
      setTimeout("document.form_procesar_pago.submit()",10);
    </SCRIPT> 
    <?php if(!isset ($cart_articles)):?>
      <input type="hidden" name="_charset_"/>
      <!-- Sell physical goods and services with possible tax and shipping -->
      <input type="hidden" name="item_name_1" value="<?php echo $pay_concept->getName() ?>"/>                  <!-- obligatorio -->
      <input type="hidden" name="item_description_1" value="<?php echo $pay_concept->getName() ?>"/>  <!-- obligatorio -->
      <input type="hidden" name="item_price_1" value="<?php echo $total?>"/>                                   <!-- obligatorio -->
      <input type="hidden" name="item_currency_1" value="USD"/>
      <input type="hidden" name="item_quantity_1" value="1"/>                                                  <!-- obligatorio -->
    <?php else:?>
      <?php $i = 1;?>
      <?php foreach ($cart_articles as $cart_article):?>
        <input type="hidden" name="_charset_"/>
        <!-- Sell physical goods and services with possible tax and shipping -->
        <input type="hidden" name="item_name_<?php echo $i;?>" value="<?php echo $cart_article->getArticle()->getName();  ?>"/>                  <!-- obligatorio -->
        <input type="hidden" name="item_description_<?php echo $i;?>" value="<?php echo $cart_article->getArticle()->getDescription();  ?>"/>  <!-- obligatorio -->
        <input type="hidden" name="item_price_<?php echo $i;?>" value="<?php echo $cart_article->getPrice();?>"/>                                   <!-- obligatorio -->
        <input type="hidden" name="item_currency_<?php echo $i;?>" value="USD"/>
        <input type="hidden" name="item_quantity_<?php echo $i;?>" value="<?php echo $cart_article->getQuantity();?>"/>                                             <!-- obligatorio -->
        <?php $i++;?>
      <?php endforeach;?>
    <?php endif;?>
<?php endif; ?>

  </form>