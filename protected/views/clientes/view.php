<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	$model->id_cliente,
);
if(Yii::app()->user->id_perfil_sistema=='1'){
    $this->menu=array(
    array('label'=>'Listar Clientes','url'=>array('index')),
    array('label'=>'Crear Clientes','url'=>array('create')),
    array('label'=>'Actualizar Clientes','url'=>array('update','id'=>$model->id_cliente)),
    array('label'=>'Eliminar Clientes','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_cliente),'confirm'=>'Are you sure you want to delete this item?')),
    array('label'=>'Administrar Clientes','url'=>array('admin')),
    );
}else{
    $this->menu=array(
    array('label'=>'Listar Clientes','url'=>array('index')),
    //array('label'=>'Crear Clientes','url'=>array('create')),
    array('label'=>'Actualizar Clientes','url'=>array('update','id'=>$model->id_cliente)),
    //array('label'=>'Eliminar Clientes','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_cliente),'confirm'=>'Are you sure you want to delete this item?')),
    //array('label'=>'Administrar Clientes','url'=>array('admin')),
    );
}
?>

<span  class="ez">Detallar Clientes</span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_cliente',
		'direccion_2',
		'direccion_3',
		'id_pais',
		'code_cliente',
		'nombre',
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
),
)); ?>
</div>