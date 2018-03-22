<?php
$this->breadcrumbs=array(
	'Tarifa Envio Paises'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Listar Tarifas de Envíos a Paises','url'=>array('index')),
array('label'=>'Crear Tarifa de Envío a País','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('tarifa-envio-pais-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<span  class="ez">Administrar Tarifas de Envíos a Paises</span>
<div class="pd-inner">
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'tarifa-envio-pais-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_tarifa_envio_pais',
		//'id_tipo_envio',
		//'id_pais',
    array(
        'filter'=>CHtml::listData(TipoEnvio::model()->findAll(),'id_tipo_envio','tipo_envio'),
        'name'=>'id_tipo_envio',
        'type'=>'raw',
        'value'=>'$data->idTipoEnvio->tipo_envio;',
    ),
    array(
        'filter'=>CHtml::listData(Pais::model()->findAll(),'id_pais','nombre_largo'),
        'name'=>'id_pais',
        'type'=>'raw',
        'value'=>'$data->idPais->nombre_largo;',
    ),
		'tarifa_envio_pais',
		//'estatus',
		//'id_usuario_registro',
		/*
		'fecha_registro',
		'id_usuario_modifica',
		'fecha_modifica',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
</div>
