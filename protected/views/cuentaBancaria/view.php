<?php
$this->breadcrumbs=array(
	'Cuenta Bancarias'=>array('index'),
	$model->id_cuenta_bancaria,
);

$this->menu=array(
array('label'=>'Listar CuentaBancaria','url'=>array('index')),
array('label'=>'Crear CuentaBancaria','url'=>array('create')),
array('label'=>'Actualizar CuentaBancaria','url'=>array('update','id'=>$model->id_cuenta_bancaria)),
array('label'=>'Eliminar CuentaBancaria','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_cuenta_bancaria),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administración de CuentaBancaria','url'=>array('admin')),
);
?>

<span  class="ez">Detallar CuentaBancaria #<?php echo $model->id_cuenta_bancaria; ?></span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbDetailView',array(
    'data'=>$model,
    'attributes'=>array(
    		'id_cuenta_bancaria',
		'alias_cuenta_bancaria',
		'id_banco',
		'tipo_cunta',
		'cbu',
		'Cuenta',
		'tipo_documento',
		'documentacion',
		'correo',
		'img',
		'id_pais',
		'id_usuario_registro',
		'fecha_registro',
		'id_usuario_modificacion',
		'fecha_modificacion',
		'estatus',
    ),
    )); ?>
</div>
