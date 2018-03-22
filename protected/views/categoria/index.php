<?php
$this->breadcrumbs=array(
	'Categories',
);

$this->menu=array(
array('label'=>__('Create Category'),'url'=>array('create')),
array('label'=>__('Manage Category'),'url'=>array('admin')),
);
?>

<span class="ez"><?php echo __('Categories'); ?></span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
</div>