<?php
$this->breadcrumbs=array(
	'Cotizacions'=>array('index'),
	'Administrar',
);

$this->menu=array(
array('label'=>'Listar Cotizaciones','url'=>array('index')),
array('label'=>'Crear Cotización','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('cotizacion-grid', {
data: $(this).serialize()
});
return false;
});
");
?>


<span class="ez">Administración de Cotizaciones</span>
<div class="pd-inner">
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'cotizacion-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_cotizacion',
		'n_cotizacion',
//		'id_usuario_cotizacion',
		array(
                  'filter'=>CHtml::listData(Usuario::model()->findAll(),'id_usuario_sistema','correo'),
                  'name'=>'id_usuario_cotizacion',
                  'type'=>'raw',
                  'value'=>'$data->idUsuario->correo',
                ),
//		'id_usuario_registro',
//		'id_usuario_modificacion',
		'fecha_registro',
		/*
		'id_estatus_cotizacion',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
</div>