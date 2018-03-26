<?php
$this->breadcrumbs=array(
	'Operacions'=>array('index'),
	$model->id_operacion,
);

$this->menu=array(
array('label'=>'Listar Operacion','url'=>array('index')),
array('label'=>'Crear Operacion','url'=>array('create')),
array('label'=>'Actualizar Operacion','url'=>array('update','id'=>$model->id_operacion)),
array('label'=>'Eliminar Operacion','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_operacion),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administración de Operacion','url'=>array('admin')),
);
?>

<span  class="ez">Detallar Operacion #<?php echo $model->id_operacion; ?></span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbDetailView',array(
    'data'=>$model,
    'attributes'=>array(
        //'id_operacion',
		//'code_operacion',
		//'id_tipo_operacion',
        array(
            'label'=>'Tipo de OPeración:',
            'value'=>$model->idTipoProducto->tipo_producto,
        ),
        array(
            'label'=>'País:',
            'value'=>$model->idPais->pais,
        ),
		//'id_pais',
		'monto_operacion',
        'monto_cierre',
        array(
            'label'=>'Moneda Origen:',
            'value'=>$model->idMonedaOrigen->moneda,
        ),
        array(
            'label'=>'Moneda Destino:',
            'value'=>$model->idMonedaDestino->moneda,
        ),
		//'id_moneda_origen',
		//'id_moneda_destino',
        array(
            'label'=>'Fecha Operación:',
            'value'=>date("d-m-Y", strtotime($model->fecha_operacion)),
        ),
        //'fecha_operacion',
        //'monto_oficial',
        //'porcentaje_oficial',
        //'monto_ganancia',
        //'porcentaje_ganancia',
        //'id_producto',
        //'tarifa',
        array(
            'label'=>'Cuenta bancaria salida:',
            'value'=>$model->idCuentaSalida->alias_cuenta_bancaria,
        ),
        array(
            'label'=>'Cuenta bancaria entrada:',
            'value'=>$model->idCuentaEntrada->alias_cuenta_bancaria,
        ),
		//'id_cuenta_salida',
		//'id_cuenta_entrada',
        //'id_usuario_registro',
        //'fecha_registro',
        //'id_usuario_modifica',
        //'fecha_modifica',
    ),
    )); ?>
</div>
