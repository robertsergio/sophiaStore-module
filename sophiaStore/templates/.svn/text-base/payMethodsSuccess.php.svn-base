<script>
  $(document).ready(function(){
    $('#cardnumber').focus(function(){
      val = $('#cardnumber').val();
      if(val.indexOf(' ', 0) > 0)
      {
        $('#cardnumber').val('');
      }
     
    });
    $("#cardnumber").keydown(function(event) {
        // Allow only backspace, delete, right and left
        if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 37 || event.keyCode == 39) {
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
        
        <table width="100%" cellspacing="0">
          <tr><td style="background:#29AAE3; color:#FFF; padding-left:20px; font-size:0.9em; font-weight:bold" height="40">Categor&iacute;as</td></tr>
          <tr><td style="background:#F1F1F1; padding-left:20px; font-size:0.8em; border-bottom:1px solid #ECE4E1" height="40"><a href="#" class="lnk_lateral">Music, Movies &amp; Games</a></td></tr>
          <tr><td style="background:#F1F1F1; padding-left:20px; font-size:0.8em; border-bottom:1px solid #ECE4E1" height="40"><a href="#" class="lnk_lateral">Electronics &amp; Computers</a></td></tr>
          <tr><td style="background:#F1F1F1; padding-left:20px; font-size:0.8em; border-bottom:1px solid #ECE4E1" height="40"><a href="#" class="lnk_lateral">Home, Garden &amp; Tools</a></td></tr>
          <tr><td style="background:#F1F1F1; padding-left:20px; font-size:0.8em; border-bottom:1px solid #ECE4E1" height="40"><a href="#" class="lnk_lateral">Grocery, Health &amp; Beauty</a></td></tr>
          <tr><td style="background:#F1F1F1; padding-left:20px; font-size:0.8em; border-bottom:1px solid #ECE4E1" height="40"><a href="#" class="lnk_lateral">Toys, Kids &amp; Baby</a></td></tr>
          <tr><td style="background:#F1F1F1; padding-left:20px; font-size:0.8em; border-bottom:1px solid #ECE4E1" height="40"><a href="#" class="lnk_lateral">Clothing, Shoes &amp; Jewelry</a></td></tr>            
          <tr><td style="background:#F1F1F1; padding-left:20px; font-size:0.8em; border-bottom:1px solid #ECE4E1" height="40"><a href="#" class="lnk_lateral">Sports &amp; Outdoors</a></td></tr>            
          <tr><td style="background:#F1F1F1; padding-left:20px; font-size:0.8em; border-bottom:1px solid #ECE4E1" height="40"><a href="#" class="lnk_lateral">Automotive &amp; Industrial</a></td></tr>            
          </table>
        <br />
        <table width="100%" cellspacing="0">
          <tr><td style="background:#29AAE3; color:#FFF; padding-left:20px; font-weight:bold; font-size:0.9em;" height="40"><img src="/img/icon_tags.gif" style="margin-top:-3px" align="left" /> Nube de Tags</td></tr>
          <tr><td style="background:#F1F1F1; padding-left:20px; font-size:0.8em; border-bottom:1px solid #ECE4E1" height="40"><img src="/img/tag_cloud.gif" width="230" /></td></tr>            
          </table>      
      </td>
      <td width="15">&nbsp;</td>
      <td width="695" align="center" valign="top" style="background:#F2F2F2">

        <table width="100%" border="0">
          <tr>
            <td valign="top">
              <div style="height:30px; padding:7px; background:#FFF"><a href="#" class="lnk_reg">Registrarse</a> o <a href="#" class="lnk_trans">Efectuar transacci&oacute;n</a></div>
              <table align="center" width="100%" cellspacing="0" border="0" style="background:#FFF;">
                <tr style="height:24px; font-size:0.9em; background:#f2f2f2;">
                  <td width="2%" rowspan="2" align="center" style="background:#fff">&nbsp;</td>
                  <td width="38%" rowspan="2" align="center" style="background:#01FFFF">
                  <form method="post">
                    <img src="/img/icon_user.png" width="35" style="position:relative; top:10px" />&nbsp;
                    <input type="text" name="usuario" size="25" id="user" /><br />
                    <img src="/img/icon_pass.png" width="35" style="position:relative; top:10px" />&nbsp;
                    <input type="text" name="pass" size="25" />
                    <br /><br />
                  <a href="#">
                    <img src="/img/btn_ingres.png" width="100" align="right" style="padding-right:20px" border="0" />
                  </a>
                  </form>
                  </td>
                  <td width="2%" align="center" style="background:#FFF; border-right:1px solid #CCC" >&nbsp;</td>
                  <td width="55%" align="center" valign="top" style="background:#FFF" >
                    <img src="/img/bnn_paypal.jpg" width="150" /> &nbsp;
                    <img src="/img/bnn_checkout.jpg" width="150" /></td>
                  <td width="3%" align="center" style="background:#FFF" >&nbsp;</td>
                  </tr>
                  <tr>
                    <td style="border-right:1px solid #CCC">&nbsp;</td>
                  <td><p><img src="/img/icon_pass.png" width="35" style="position:relative; top:10px" />&nbsp;<input type="text" id="cardnumber" style="background:#f2f2f2; color:#999" name="card_number" size="25" value="Nº Tarjeta de Crédito" />&nbsp;<img src="/img/bnn_creditcard.jpg" width="80" style="position:relative; top:20px" />
                    <br /><br />
                    <font color="#666" size="2">&nbsp;&nbsp;&nbsp;Fecha de expiración:</font>
                    
                    <select name="mes">
                      <option value="01">01</option>
                      <option value="02">02</option>
                      <option value="03">03</option>
                      <option value="04">04</option>
                      <option value="05">05</option>
                      <option value="06">06</option>
                      <option value="07">07</option>
                      <option value="08">08</option>
                      <option value="09">09</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                    </select>
                    
                    <select name="anio">
                      <option value="2011">2011</option>
                      <option value="2012">2012</option>
                      <option value="2013">2013</option>
                      <option value="2014">2014</option>
                      <option value="2015">2015</option>
                    </select>
                    <br />
                    <font color="#666" size="2">&nbsp;&nbsp;&nbsp;Codigo de seguridad:</font> 
                    <input type="text" name="codigo" size="5" />
                    <br />
                    <a href="#"><img src="/img/btn_ingres.png" width="100" align="right" style="padding-right:20px" border="0" /></a></p>
                    <br /><br /><br />
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
  </div> 
  <!-- #header end -->
