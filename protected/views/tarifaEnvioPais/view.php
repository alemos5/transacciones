<?php
$this->breadcrumbs=array(
	'Tarifa Envio Paises'=>array('index'),
	$model->id_tarifa_envio_pais,
);

$this->menu=array(
array('label'=>'Listar Tarifa de Envío a Paises','url'=>array('index')),
array('label'=>'Crear Tarifa de Envío a País','url'=>array('create')),
array('label'=>'Actualizar Tarifa de Envío País','url'=>array('update','id'=>$model->id_tarifa_envio_pais)),
array('label'=>'Eliminar Tarifa de Envío a País','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tarifa_envio_pais),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Administrar Tarifas de Envíos Paises','url'=>array('admin')),
);
?>

<span  class="ez">Detallar Tarifa de Envío a Paises</span>
<div class="pd-inner">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
    'id_tarifa_envio_pais',
		//'id_tipo_envio',
    array(
        'label'=>'Tipo de Envío',
        'value'=>$model->idTipoEnvio->tipo_envio,
    ),
    array(
        'label'=>'País',
        'value'=>$model->idPais->nombre_largo,
    ),
    //'id_pais',
    'tarifa_envio_pais',
    //'estatus',
    //'id_usuario_registro',
    //'fecha_registro',
    //'id_usuario_modifica',
    //'fecha_modifica',
),
)); ?>
</div>
