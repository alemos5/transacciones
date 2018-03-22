<?php
$this->breadcrumbs=array(
	'Subcliente Ordenes'=>array('index'),
	$model->id_subcliente_ordenes,
);

$this->menu=array(
array('label'=>'Listar Ordenes por Subcliente','url'=>array('index')),
array('label'=>'Crear Orden por Subcliente','url'=>array('create')),
//array('label'=>'Actualizar Orden por Subcliente','url'=>array('update','id'=>$model->id_subcliente_ordenes)),
//array('label'=>'Eliminar Orden por Subcliente','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_subcliente_ordenes),'confirm'=>'Are you sure you want to delete this item?')),
//array('label'=>'Administrar Ordenes por Subclientes','url'=>array('admin')),
);
?>

<span class="ez">Detalles de Ordenes por Subcliente</span>
<div class="pd-inner">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_subcliente_ordenes',
		'id_cliente',
		'id_subcliente',
		'orden',
		'peso',
		'descripcion',
		'costo_global',
		'courier',
		'fecha_registro',
//		'estatus',
),
)); ?>
</div>