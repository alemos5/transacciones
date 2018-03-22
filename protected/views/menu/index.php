<?php
/* @var $this MenuController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Menus',
);

$this->menu=array(
	array('label'=>__('Create Menu'), 'url'=>array('create')),
	array('label'=>__('Manage Menu'), 'url'=>array('admin')),
);
?>

<span class="ez"><?php echo __('Menus'); ?></span>

<div class="pd-inner">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</div>