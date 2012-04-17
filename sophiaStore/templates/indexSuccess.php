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
      <td valign="top" style="background:#F2F2F2">
        <?php if ($sf_user->hasFlash('error')): ?>
          <div id="sf_admin_container">
            <div class="error">
              <h2><?php echo __($sf_user->getFlash('error'), array(), 'sf_admin') ?></h2>
            </div>
          </div>
        <?php endif; ?>
        <?php if ($sf_user->hasFlash('notice')): ?>
          <div id="sf_admin_container">
            <div class="save-ok">
              <h2><?php echo $sf_user->getFlash('notice') ?></h2>
            </div>
          </div>
        <?php endif; ?>
        <table width="100%" border="0">
        <?php include_partial('path',array('paths'=>array()));?>
        <tr><td colspan="4" align="left" style="color:#33AFE3; font-size:0.9em; font-weight:bold">&nbsp;&nbsp;Ultimos Productos</td></tr>
        <?php $count = ceil(count($articles) / 4);?>
        <?php for($i = 0; $i < $count; $i++):?>
        <tr>
          <?php if(isset ($articles[$i*4])):?>
          <td align="center" class="txtLista" width="150">
            <div id="borde-article">
            <div id="borde-imagen">
            <a href="<?php echo url_for(array('module' => 'sophiaStore', 'action' => 'showArticle','article_id'=>$articles[$i*4]->getId())) ?>">
              <img src="/uploads/articles/<?php echo $articles[$i*4]->getThumbnail();?>" class="thumb" /></a>
            </div>
            <br /><b><?php echo $articles[$i*4]->getName();?></b>
            <br /><?php echo $articles[$i*4]->getShortDescription();?>
            <br /> <div class="txtPrecio">Precio: $<?php echo $articles[$i*4]->getPrice();?></div>
            </div>
            </td>
          <?php endif;?>
          <?php if(isset ($articles[($i*4)+1])):?>
          <td align="center" class="txtLista" width="150">
            <div id="borde-article">
            <div id="borde-imagen">
            <a href="<?php echo url_for(array('module' => 'sophiaStore', 'action' => 'showArticle','article_id'=>$articles[($i*4)+1]->getId())) ?>">
              <img src="/uploads/articles/<?php echo $articles[($i*4)+1]->getThumbnail();?>" class="thumb" /></a>
            </div>
            <br /><b><?php echo $articles[($i*4)+1]->getName();?></b>
            <br /><?php echo $articles[($i*4)+1]->getShortDescription();?>
            <br /> <div class="txtPrecio">Precio: $<?php echo $articles[($i*4)+1]->getPrice();?></div>
          </div>
          </td>
          <?php endif;?>
          <?php if(isset ($articles[($i*4)+2])):?>
          <td align="center" class="txtLista" width="150">
            <div id="borde-article">
            <div id="borde-imagen">
            <a href="<?php echo url_for(array('module' => 'sophiaStore', 'action' => 'showArticle','article_id'=>$articles[($i*4)+2]->getId())) ?>">
              <img src="/uploads/articles/<?php echo $articles[($i*4)+2]->getThumbnail();?>" class="thumb" /></a>
            </div>
            <br /><b><?php echo $articles[($i*4)+2]->getName();?></b>
            <br /><?php echo $articles[($i*4)+2]->getShortDescription();?>
            <br /> <div class="txtPrecio">Precio: $<?php echo $articles[($i*4)+2]->getPrice();?></div>
          </div>
          </td>
          <?php endif;?>
          <?php if(isset ($articles[($i*4)+3])):?>
          <td align="center" class="txtLista" width="150">
            <div id="borde-article">
            <div id="borde-imagen">
            <a href="<?php echo url_for(array('module' => 'sophiaStore', 'action' => 'showArticle','article_id'=>$articles[($i*4)+3]->getId())) ?>">
              <img src="/uploads/articles/<?php echo $articles[($i*4)+3]->getThumbnail();?>" class="thumb" /></a>
            </div>
            <br /><b><?php echo $articles[($i*4)+3]->getName();?></b>
            <br /><?php echo $articles[($i*4)+3]->getShortDescription();?>
            <br /> <div class="txtPrecio">Precio: $<?php echo $articles[($i*4)+3]->getPrice();?></div>
            </div>
            </td>
          <?php endif;?>
        </tr>
        <?php endfor;?>
	    <tr><td colspan="4" style="font-size:0.5em;">&nbsp;</td></tr>
      </table>
      </td>
    </tr>
</table>
