<table border="0" width="100%">
    <tr>
    <td width="257" rowspan="3" valign="top">
      <?php include_partial('categories',array('categories'=>$categories)) ?>
	  <br />
      <?php include_partial('tag_cloud') ?>
    </td>
    <td width="15" rowspan="3">&nbsp;</td>
    <td width="695" height="204" align="center" >
      <?php include_partial('slider_store') ?>
    </td>
    </tr>
    <tr><td style="font-size:1.3em; height:3px">&nbsp;</td></tr>
    <tr>
      <td align="center" valign="top" style="background:#F2F2F2">
        <?php if ($sf_user->hasFlash('notice')): ?>
        <div id="sf_admin_container" style="text-align: left;">
            <div class="save-ok">
              <h2><?php echo __($sf_user->getFlash('notice'), array(), 'sf_admin') ?></h2>
            </div>
          </div>
        <?php endif; ?>
        <form id="shoppingCartForm" name ="shoppingCartForm"action="<?php echo url_for(array('module' => 'sophiaStore', 'action' => 'updateCart')) ?>">
        <table width="100%" border="0">
          <?php include_partial('path',array('paths'=>$paths));?>
          
            <?php if($total > 0):?>
              <div class="cart-info">
                <table>
                  <thead>
                    <tr>
                      <th class="remove">Borrar</th>
                      <th class="image">Imagen</th>
                      <th class="name">Nombre Producto</th>
                      <th class="model">C&oacute;digo</th>
                      <th class="quantity">Cantidad</th>
                      <th class="price">Precio Unit.</th>
                      <th class="total">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($cart_articles as $key => $cart_article) :?>
                    <tr>
                      <td class="remove">
                        <input type="checkbox" value="<?php echo $cart_article->getId();?>" name="remove[]">
                      </td>
                      <td class="image">
                        <a href="/uploads/articles/<?php echo $cart_article->getArticle()->getArticleImage()?>">
                          <img title="<?php echo $cart_article->getArticle()->getName();?>" 
                               alt="<?php echo $cart_article->getArticle()->getName();?>" 
                               src="/uploads/articles/<?php echo $cart_article->getArticle()->getThumbnail()?>"/>
                        </a>
                        </td>
                      <td class="name">
                        <a href="<?php echo url_for(array('module' => 'sophiaStore', 'action' => 'showArticle','article_id'=>$cart_article->getArticle()->getId())) ?>">
                           <?php echo $cart_article->getArticle()->getName();?>
                        </a>
                        </td>
                      <td class="model"><?php echo $cart_article->getArticle()->getId();?></td>
                      <td class="quantity">
                        <input type="text" size="2" value="<?php echo $cart_article->getQuantity();?>" name="quantity[<?php echo $cart_article->getId();?>]"></td>
                      <td class="price">$<?php echo $cart_article->getPrice();?></td>
                      <td class="total">$<?php echo $cart_article->getPrice() * $cart_article->getQuantity();?></td>
                    </tr>
                    <?php endforeach; ?>
                    <tr><td colspan="6" style="font-size:0.5em;"></td>
                    <td>
                      <div class="cart_total">
                        <table>
                          <tbody>
                          <tr>
                            <td colspan="5"></td>
                            <td class="right" style="font-size: 0.9em;"><b>Total:</b></td>
                            <td class="right" style="font-size: 0.9em;">$<?php echo $total;?></td>
                          </tr>
                          </tbody>
                        </table>
                      </div>
                   </td>
                  </tr>
                  </tbody>
                </table>
              </div>
            
              <div class="buttons">
              <div class="left">
                <?php $removes = array();?>
                <a class="button" onclick="$('#shoppingCartForm').submit();">
                  <span>Actualizar Carrito</span>
                </a>
              </div>
              <div class="right">
                <a class="button" href="<?php echo url_for(array('module' => 'sophiaStore', 'action' => 'checkout')) ?>">
                  <span>Checkout</span>
                </a>
              </div>
              <div class="center">
                <a class="button" href="<?php echo url_for(array('module' => 'sophiaStore', 'action' => 'index')) ?>">
                  <span>Continuar comprando</span>
                </a>
              </div>
            </div>
            
              <tr><td colspan="4" style="font-size:0.5em;">&nbsp;</td></tr>
              <?php else:?><tr><td colspan="4" style="font-size:0.5em;">&nbsp;</td></tr>
                 <tr>
                   <td colspan="4" style="font-size:0.5em;">
                     <div id="cart-empty">Su carrito esta vac&iacute;o.</div>
                     <br/>
                     <div class="center"><a class="button" href="<?php echo url_for(array('module' => 'sophiaStore', 'action' => 'index')) ?>"><span>Continuar comprando</span></a></div>
                   </td>
                 </tr>
             <?php endif;?>
         </table>
        </form>
      </td>
    </tr>
</table>
<pre>
<?php print_r($_SESSION);?>
</pre>          
