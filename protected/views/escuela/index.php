<?php
/* @var $this EscuelaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Escuelas',
);

$this->menu=array(
	array('label'=>__('Create Escuela'), 'url'=>array('create')),
	array('label'=>__('Manage Escuela'), 'url'=>array('admin')),
);
?>

<span class="ez"><?php echo __('Escuelas'); ?></span>

<div class="pd-inner">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</div>