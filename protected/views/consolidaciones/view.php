<?php
$this->breadcrumbs=array(
	'Consolidaciones'=>array('index'),
	$model->id_con,
);

$this->menu=array(
array('label'=>'Listar Consolidaciones','url'=>array('index')),
array('label'=>'Crear Consolidaciones','url'=>array('create')),
array('label'=>'Actualizar Consolidaciones','url'=>array('update','id'=>$model->id_con)),
array('label'=>'Eliminar Consolidaciones','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_con),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar Consolidaciones','url'=>array('admin')),
);
?>

<span  class="ez">Detallar Consolidaciones</span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_con',
		'id_cliente',
		'ware_reciept',
		'direccion',
		'alto',
		'ancho',
		'largo',
		'peso',
		'instruccion',
		'status',
		'seguro',
		'pt',
		'cost_env',
		'fecha',
		'cost_orden',
		'tasa_de_cambio',
		'int_manejo',
		'int_documentacion',
		'int_gastos_administrativos',
		'int_reempaque',
		'int_descuento',
		'int_devolucion',
		'int_almacenaje',
		'int_comision_tc',
		'int_desaduanamiento',
		'cliente_manifiesto',
		'ultima_milla',
		'estatus_manifiesto',
		'info_extra',
),
)); ?>
</div>
