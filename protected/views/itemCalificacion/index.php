<?php
$this->breadcrumbs=array(
	'Item Qualification',
);

$this->menu=array(
array('label'=>__('Create Item Qualification'),'url'=>array('create')),
array('label'=>__('Manage Item Qualification'),'url'=>array('admin')),
);
?>


<span class="ez"><?php echo __('Item Qualification'); ?></span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</div>