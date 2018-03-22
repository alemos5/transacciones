<?php
$this->breadcrumbs=array(
	'Franquiciados'=>array('index'),
	$model->id_franquiciado,
);

$this->menu=array(
array('label'=>__('List Franchisee'),'url'=>array('index')),
array('label'=>__('Create Franchisee'),'url'=>array('create')),
array('label'=>__('Update Franchisee'),'url'=>array('update','id'=>$model->id_franquiciado)),
array('label'=>__('Delete Franchisee'),'url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_franquiciado),'confirm'=>__('Are you sure you want to delete this item?'))),
array('label'=>__('Manage Franchisee'),'url'=>array('admin')),
);
?>

<h1><?php echo __('View Franchisee'); ?> #<?php echo $model->id_franquiciado; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_franquiciado',
		'id_usuario_sistema',
		'id_competencia',
		'estatus',
),
)); ?>
