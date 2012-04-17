<table width="100%" border="0">
  <tr><td colspan="4" style="font-size:0.5em;">&nbsp;</td></tr>
  <tr><td colspan="4" align="left" style="color:#33AFE3; font-size:0.9em; font-weight:bold">&nbsp;&nbsp;Articulos relacionados</td></tr>
  <tr>
    <?php foreach ($relatedArticles as $article) : ?>
      <td align="center" class="txtLista" width="150">
        <div id="borde-article">
          <div id="borde-imagen">
            <a href="<?php echo url_for(array('module' => 'sophiaStore', 'action' => 'showArticle', 'article_id' => $article->getId())) ?>">
              <img src="/uploads/articles/<?php echo $article->getThumbnail(); ?>" class="thumb" />
            </a>
          </div>  
          <br /><b><?php echo $article->getName(); ?></b>
          <br /><?php echo $article->getShortDescription(); ?><br /> 
          <div class="txtPrecio">Precio: $<?php echo $article->getPrice(); ?></div>
        </div>
      </td>
    <?php endforeach; ?>
  </tr>
  <tr><td colspan="4" style="font-size:0.5em;">&nbsp;</td></tr>
</table>