<?php
/* @var $this PerfilController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Perfils',
);

$this->menu=array(
	array('label'=>__('Create Perfil'), 'url'=>array('create')),
	array('label'=>__('Manage Perfil'), 'url'=>array('admin')),
);
?>

<span class="ez"><?php echo __('Perfils'); ?></span>

<div class="pd-inner">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</div>