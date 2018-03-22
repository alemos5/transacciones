<?php
$this->breadcrumbs=array(
	'Franquiciado Desembolsos'=>array('index'),
	$model->id_franquiciado_desembolso,
);

$this->menu=array(
array('label'=>'List Franchisee Desembolso','url'=>array('index')),
array('label'=>'Create Franchisee Desembolso','url'=>array('create')),
array('label'=>'Update Franchisee Desembolso','url'=>array('update','id'=>$model->id_franquiciado_desembolso)),
array('label'=>'Delete Franchisee Desembolso','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_franquiciado_desembolso),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage Franchisee Desembolso','url'=>array('admin')),
);
?>

<h1>View FranquiciadoDesembolso #<?php echo $model->id_franquiciado_desembolso; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_franquiciado_desembolso',
		'id_competencia',
		'id_franquiciado',
		'descripcion',
		'fecha_registro',
		'id_usuario',
		'monto',
		'estatus',
),
)); ?>
