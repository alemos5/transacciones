<?php
$this->breadcrumbs=array(
	'Blocks',
);

$this->menu=array(
array('label'=>__('Create Block'),'url'=>array('create')),
array('label'=>__('Manage Block'),'url'=>array('admin')),
);
?>

<span class="ez"><?php echo __('Blocks'); ?></span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</div>