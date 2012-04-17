<table width="100%" border="0" cellspacing="5" align="center">
  <?php $count = ceil(count($cart_articles) / 2); ?>
  <?php for ($i = 0; $i < $count; $i++): ?>
    <tr>
      <?php for ($k = 0; $k < 2; $k++): ?>
        <td width="50%" valign="top" style="border:1px solid #CCC; padding:3px">
          <?php if (isset($cart_articles[($i * 2) + $k])): ?>
            <?php $cart_article = $cart_articles[($i * 2) + $k]; ?>

            <div style="background:#01FFFF; text-align:right; height:18px; padding-top:4px; padding-right:2px">
              <a href="<?php echo url_for(array('module' => 'sophiaStore', 'action' => 'delete', 'id' => $cart_article->getId())); ?>" style="font-size:1.7em; padding:2px;">&nbsp;X&nbsp;</a>
            </div> 
            <br />
            <table style="font-size:1.5em; color:#666">
              <tr>
                <td width="40%" align="center">
                  <img src="/uploads/articles/<?php echo $cart_article->getArticle()->getArticleImage() ?>" style="border:1px solid #CCC; padding:10px" width="90px" height="120px"/>
                </td>
                <td valign="top" align="left">
                  <div style="height: 100px; overflow-y: scroll;">
                  <b>
                    <a href="<?php echo url_for(array('module' => 'sophiaStore', 'action' => 'showArticle', 'article_id' => $cart_article->getArticle()->getId())) ?>">
                      <?php echo $cart_article->getArticle()->getName(); ?>
                    </a>
                  </b>
                  <br />
                  <?php echo $cart_article->getArticle()->getDescription(); ?>
                  </div>
                  <br />
                  <div style="color:#0171BD; font-size:1.2em">Precio unitario: <b>$<?php echo $cart_article->getPrice(); ?></b><br />Cantidad: <?php echo $cart_article->getQuantity(); ?></div>
                </td>
              </tr>
              <tr>
                <td align="right" colspan="2">
                  <div style="width:181px; height:26px; border:1px solid #2A6EB9; margin-right:15px">
                    <div style="float:left; width:100px; background:url(/img/bgr_price_carrito.gif); height:21px; color:#FFF; text-align:center; padding-top:5px"><b>SubTotal</b>
                    </div>
                    <div style="float:right; width:80px; background:url(/img/bgr_price_carrito.gif); height:21px; color:#fff; text-align:center; padding-top:5px"><b>$US <?php echo $cart_article->getPrice() * $cart_article->getQuantity(); ?></b>
                    </div>
                  </div>
                </td>
              </tr>
            </table>
            <br />
          <?php endif; ?>
        </td>

      <?php endfor; ?>
    </tr>
  <?php endfor; ?>
</table>