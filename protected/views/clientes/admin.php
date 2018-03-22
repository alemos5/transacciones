<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	'Manage',
);

if(Yii::app()->user->id_perfil_sistema=='1' || Yii::app()->user->id_perfil_sistema=='2'){
    $this->menu=array(
    array('label'=>'List Clientes','url'=>array('index')),
    array('label'=>'Create Clientes','url'=>array('create')),
    );
}else{
    $this->menu=array(
    array('label'=>'List Clientes','url'=>array('index')),
    //array('label'=>'Create Clientes','url'=>array('create')),
    );
}
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('clientes-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<span class="ez"><?php echo __('Administrar Clientes'); ?></span>



<div class="pd-inner">
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'clientes-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
        'fecha',
		//'id_cliente',
		'direccion',
//		'direccion_3',
//		'id_pais',
		'code_cliente',
		'nombre',
		'email',
		/*
		'compania',
		'direccion',
		'pais',
		'ciudad',
		'estado',
		'telefono',
		'fax',
		'password',
		'email',
		'ci',
		'suscripcion',
		'servicio',
		'promocion',
		'publi',
		'catologo',
		'otro_catalogo',
		'correo',
		'pass_conf',
		'fecha',
		'estatus',
		'tarifa',
		'seguro',
		'bodega',
		'costo_consolidacion',
		'impuestos',
		'otros',
		'referido',
		'id_cliente_padre',
		'codigo_cliente_hijo',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
</div>