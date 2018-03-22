<?php
$this->breadcrumbs=array(
	'Impuestos'=>array('index'),
	$model->id_impuesto,
);

$this->menu=array(
array('label'=>'Listar gasto','url'=>array('index')),
array('label'=>'Crear gasto','url'=>array('create')),
array('label'=>'Actualizar gasto','url'=>array('update','id'=>$model->id_impuesto)),
array('label'=>'Eliminar gasto','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_impuesto),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar gasto','url'=>array('admin')),
);
?>

<h1>Detallar gasto #<?php echo $model->id_impuesto; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_impuesto',
		'impuesto',
		'porcentaje',
		'estatus',
),
)); ?>
