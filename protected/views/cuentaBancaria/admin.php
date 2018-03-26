<?php
$this->breadcrumbs=array(
	'Cuenta Bancarias'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List CuentaBancaria','url'=>array('index')),
array('label'=>'Create CuentaBancaria','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('cuenta-bancaria-grid', {
data: $(this).serialize()
});
return false;
});
");

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

<span  class="ez">Administración de Cuenta Bancarias</span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbGridView',array(
    'id'=>'cuenta-bancaria-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
    		//'id_cuenta_bancaria',
		'alias_cuenta_bancaria',
		//'id_banco',

        array(
            'filter'=>CHtml::listData(Banco::model()->findAll(),'id_banco','banco'),
            'name'=>'id_banco',
            'type'=>'raw',
            'value'=>'$data->idBanco->banco',
        ),
        array(
            'filter'=>array(
                '1'=>'Corriente',
                '2'=>'Ahorro',
            ),
            'name'=>'tipo_cunta',
            'type'=>'raw',
            'value'=>'tipoCuenta($data->tipo_cunta)',
        ),
		//'tipo_cunta',
		'cbu',
		'Cuenta',
        array(
            'filter'=>CHtml::listData(Estatus::model()->findAll(),'estatus','estatus_titulo'),
            'name'=>'estatus',
            'type'=>'raw',
            'value'=>'$data->idEstatus->estatus_titulo',
        ),
		/*
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

		*/
    array(
    'class'=>'booster.widgets.TbButtonColumn',
    ),
    ),
    )); ?>
</div>