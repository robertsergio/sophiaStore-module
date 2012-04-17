<table width="100%" cellspacing="0">
  <tr>
    <td id="menu-store" height="40">Categor&iacute;as</td>
  </tr>
  <?php foreach ($categories as $category):?>
    <tr>
      <td style="background:#F1F1F1; padding-left:20px; font-size:0.8em; border-bottom:1px solid #ECE4E1" height="40">
        <a href="<?php echo  url_for(array('module' => 'sophiaStore', 'action' => 'listArticle','id'=>$category->getId())) ?>" class="lnk_lateral"><?php echo $category->getName();?></a>
      </td>
    </tr>
  <?php endforeach;?>
</table>