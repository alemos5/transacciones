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
function tipoCuenta($idTipoCuenta){
    if($idTipoCuenta == 1){
        $tipoCUenta = "Corriente";
    }
    if($idTipoCuenta == 2){
        $tipoCUenta = "Ahorros";
    }
    return $tipoCUenta;
}

function tipoDocumento($idTipoDocumento){
    if($idTipoDocumento == 1){
        $tipoDocumento = "C.I";
    }
    if($idTipoDocumento == 2){
        $tipoDocumento = "DNI";
    }
    if($idTipoDocumento == 3){
        $tipoDocumento = "Pasaporte";
    }
    return $tipoDocumento;
}

?>

<span  class="ez">Detallar CuentaBancaria #<?php echo $model->id_cuenta_bancaria; ?></span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbDetailView',array(
    'data'=>$model,
    'attributes'=>array(
        //'id_cuenta_bancaria',
		'alias_cuenta_bancaria',
		//'id_banco',
        array(
            'label'=>'Banco:',
            'value'=>$model->idBanco->banco,
        ),
        array(
            'label'=>'Tipo de cuenta:',
            'value'=>tipoCuenta($model->tipo_cunta),
        ),
		//'tipo_cunta',
		'cbu',
		'Cuenta',
		//'tipo_documento',
        array(
            'label'=>'Tipo de documento:',
            'value'=>tipoDocumento($model->tipo_documento),
        ),
		'documentacion',
		'correo',
		//'img',
        //'id_pais',
        //'id_usuario_registro',
        //'fecha_registro',
        //'id_usuario_modificacion',
        //'fecha_modificacion',
		//'estatus',
        array(
            'label'=>'Estatus:',
            'value'=>$model->idEstatus->estatus_titulo,
        ),
    ),
    )); ?>
</div>
