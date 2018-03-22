<?php
$this->breadcrumbs=array(
	'Orden Listas'=>array('index'),
	$model->id_orden_lista,
);

$this->menu=array(
array('label'=>'List OrdenLista','url'=>array('index')),
array('label'=>'Create OrdenLista','url'=>array('create')),
array('label'=>'Update OrdenLista','url'=>array('update','id'=>$model->id_orden_lista)),
array('label'=>'Delete OrdenLista','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_orden_lista),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage OrdenLista','url'=>array('admin')),
);
?>

<h1>View OrdenLista #<?php echo $model->id_orden_lista; ?></h1>

<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_orden_lista',
		'orden_lista',
		'estatus',
),
)); ?>
