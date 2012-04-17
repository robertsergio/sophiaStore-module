<script>
  $(document).ready(function(){
    
    $("#cardnumber").keydown(function(event) {
        // Allow only backspace, delete, right and left
        if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 9) {
            // let it happen, don't do anything
        }
        else {
            // Ensure that it is a number and stop the keypress
            if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault(); 
            }   
        }
    });
    
    $("#cvv_code").keydown(function(event) {
        // Allow only backspace, delete, right and left
        if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 9) {
            // let it happen, don't do anything
        }
        else {
            // Ensure that it is a number and stop the keypress
            if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault(); 
            }   
        }
    });
    
    $("#ci").keydown(function(event) {
      //alert(event.keyCode);
        // Allow only backspace, delete, right and left
        if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 9) {
            // let it happen, don't do anything
        }
        else {
            // Ensure that it is a number and stop the keypress
            if ((event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault(); 
            }   
        }
    });


  });
</script> 
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
            <td valign="top">
              <div style="height:30px; padding:7px; background:#FFF; border-bottom: 1px solid gray;">
                <?php if(!$sf_user->isAuthenticated()):?>
                  <a href="#" class="lnk_reg">Registrarse</a> o 
                <?php endif;?>
                <a href="#" class="lnk_trans">Efectuar transacci&oacute;n</a>
              </div>
              <table align="center" width="100%" cellspacing="0" border="0" style="background:#FFF;">
                <tr style="height:10px; font-size:0.9em; background:#f2f2f2;">            
                  
                <tr>
                    <td>&nbsp;</td>
                    <?php if(!$sf_user->isAuthenticated()):?>
                    <td width="30%" align="center" style="background:#01FFFF; vertical-align: top;" >
                    <br/>
                    <?php echo $form->renderFormTag(url_for('sophiaStore/loginToStore')) ?>
                    <?php echo $form->renderHiddenFields(false) ?>

                    <?php if ($form->hasGlobalErrors()): ?>
                      <?php echo $form->renderGlobalErrors() ?>
                    <?php endif; ?>

                      <div class="error_class<?php $form['username']->hasError() and print '_yes' ?>">
                      <?php echo $form['username']->renderError(); ?>
                      </div>
                      <div id="usernamediv">
                      <?php echo $form['username']->render(array('id'=>'user','size'=>'15'));?>
                      </div>
                      <br />
                      <div class="error_class<?php $form['password']->hasError() and print '_yes' ?>">
                      <?php echo $form['password']->renderError(); ?>
                      </div>
                      <div id="passworddiv">
                      <?php echo $form['password']->render(array('id'=>'pass','size'=>'15'));?>
                      </div>
                      <br />

                      <input type="image" src="/img/btn_ingres.png" width="100" align="right" style="cursor:pointer;cupadding-right:20px; margin-right: 35px;" />

                    </form>

                    </td>
                    
                    <td width="2%" align="center" style="background:#FFF; border-right:1px solid #CCC" >&nbsp;</td>
                    <?php endif;?>
                    <td>
                     <?php include_partial('form_of_payment', array('cart_id' => $sf_request->getParameter('cart_id'))); ?>
                     <?php //include_partial('form_payment', array('paymentInformatinoForm' => $paymentInformatinoForm)); ?>
                    </td>
                    <td>&nbsp;</td>
                  </tr>
                </table>
              </td>
          </tr>
      </table>

    </td>
  </tr>

</table>
