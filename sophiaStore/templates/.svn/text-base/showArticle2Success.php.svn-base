<table border="0" width="100%">
  <tr>
    <td width="257" rowspan="3" valign="top">
      <?php include_partial('categories', array('categories' => $categories)) ?>
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
      <table width="100%" border="0">
         <?php include_partial('path',array('paths'=>$paths));?>
        <tr>
          <td align="left" class="subCategory_list">
            <h1><?php echo $article->getName()?></h1>
            <div class="product-info">
              <div class="left">
                <div class="image">
                  <a rel="fancybox" class="fancybox" title="<?php echo $article->getName()?>" href="/uploads/articles/<?php echo $article->getArticleImage()?>">
                    <img id="image" alt="<?php echo $article->getName()?>" title="<?php echo $article->getName()?>" src="/uploads/articles/<?php echo $article->getArticleImage()?>">
                  </a>
                </div>
              </div>
              <div class="right">
                <div class="description">
                  <span>C&oacute;digo Producto:</span> <?php echo $article->getId();?><br>
                  <span>Descripci&oacute;n:</span> <?php echo $article->getDescription();?><br>
                  </div>
                <div class="price-view">Price: $<?php echo $article->getPrice();?> <br>
                  
                </div>
                <div class="cart">
                  <div>
                    <a class="button" id="button-cart" href="<?php echo url_for(array('module' => 'sophiaStore', 'action' => 'addToCart','article_id'=>$article->getId())); ?>"><span>Adicionar al carrito</span></a>
                  </div>
                  
                </div>
                <div class="review">
                  
                  <div class="share"><!-- AddThis Button BEGIN -->
                    <div class="addthis_default_style"><a class="addthis_button_compact at300m" href="#"><span class="at300bs at15nc at15t_compact"></span>Compartir</a> <a class="addthis_button_email at300b" title="Email" href="#"><span class="at300bs at15nc at15t_email"></span></a><a class="addthis_button_print at300b" title="Print" href="#"><span class="at300bs at15nc at15t_print"></span></a> <a class="addthis_button_facebook at300b" title="Send to Facebook" href="#"><span class="at300bs at15nc at15t_facebook"></span></a> <a class="addthis_button_twitter at300b" title="Tweet This" href="#"><span class="at300bs at15nc at15t_twitter"></span></a></div>
                    <script src="http://s7.addthis.com/js/250/addthis_widget.js" type="text/javascript"></script> 
                    <!-- AddThis Button END --> 
                  </div>
                </div>
              </div>
            </div>
            <div class="bottom">
              <h3>Detalles del producto</h3>
              <div class="article_detail">
                <table>
                <?php foreach ($article->getArticleAttributeArticles() as $article_attribute_article):?>
                <tr>
                  <td><b><?php echo $article_attribute_article->getArticleAttribute()->getArticleAttributeTypeIdName();?>:</b></td>
                  <td><?php echo $article_attribute_article->getArticleAttribute()->getName();?></td>
                </tr>
                <?php endforeach;?>
                </table>
              </div>
            </div>
          </td>

        </tr>

        <tr><td colspan="4" style="font-size:0.5em;">&nbsp;</td></tr>
      </table>
    </td>
  </tr>
</table>
