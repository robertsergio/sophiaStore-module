
<tr>
  <td colspan="4" style="font-size:0.5em;">&nbsp;
    <a href="<?php echo url_for(array('module' => 'sophiaStore', 'action' => 'index')); ?>">Inicio</a> 
    <?php foreach ($paths as $path):?>
    » <a href="<?php echo $path['link'];?>" class="nav"><?php echo $path['text'];?></a>
    <?php endforeach;?>
  </td>
</tr>