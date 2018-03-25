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
?>

<span  class="ez">Administración de Cuenta Bancarias</span>

<div class="pd-inner">
    <?php $this->widget('booster.widgets.TbGridView',array(
    'id'=>'cuenta-bancaria-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
    		'id_cuenta_bancaria',
		'alias_cuenta_bancaria',
		'id_banco',
		'tipo_cunta',
		'cbu',
		'Cuenta',
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