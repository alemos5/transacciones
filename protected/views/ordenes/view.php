<?php
$this->breadcrumbs=array(
	'Ordenes'=>array('index'),
	$model->id_orden,
);

$this->menu=array(
array('label'=>'Listar Ordenes','url'=>array('index')),
array('label'=>'Crear Ordene','url'=>array('create')),
array('label'=>'Actualizar Orden','url'=>array('update','id'=>$model->id_orden)),
array('label'=>'Eliminar Orden','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_orden),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar Orden','url'=>array('admin')),
);
?>

<span  class="ez">Detallar Orden</span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
            'id_orden',
            'ware_reciept',
            'numero_guia',
            'tracking',
            'courier',
            'id_ope',
            'code_cliente',
            'nombre_cliente',
            'alto',
            'ancho',
            'largo',
            'peso',
            'descripcion',
            'costo',
            'status',
            'instrucciones',
            'orden',
            'seguro',
            'fecha',
            'pt',
            'cost_env',
            'env_email',
            'recargo',
            'status_recargo',
            'cant',
            'peli',
            'tienda',
            'doc',
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
            'descripcion1',
            'direccion_cliente',
            'ciudad',
            'telefono',
            'ultima_milla',
            'estatus_manifiesto',
            'info_extra',
),
)); ?>
</div>