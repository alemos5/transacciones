<?php $this->beginContent('//layouts/main');
if(count($this->menu) > 0)
{
?>
<div id="mainmenu">
    
  <?php /*
  $this->widget('booster.widgets.TbMenu', array(
    'items'=>$this->menu,
    'type'=>'',
  ));*/
  ?>
</div>
<?php
}
?>
<div id="content">
  <?php echo $content; ?>
</div><!-- content -->
<?php $this->endContent(); ?>
