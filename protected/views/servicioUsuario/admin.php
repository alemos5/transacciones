<?php
$this->breadcrumbs=array(
	'Servicio Usuarios'=>array('index'),
	'Administrar',
);

$this->menu=array(
array('label'=>'Listar Servicios especiales por Usuario','url'=>array('index')),
array('label'=>'Crear Servicios especiales por Usuario','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('servicio-usuario-grid', {
data: $(this).serialize()
});
return false;
});
");
?>


<span class="ez">Administración de Servicios</span>
<div class="pd-inner">
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'servicio-usuario-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_servicio_usuario',
//		'id_servicio',
		array(
                  'filter'=>CHtml::listData(Servicio::model()->findAll(),'id_servicio','servicio'),
                  'name'=>'id_servicio',
                  'type'=>'raw',
                  'value'=>'$data->idServicio->servicio',
                ),
		array(
                  'filter'=>CHtml::listData(Usuario::model()->findAll(),'id_usuario_sistema','correo'),
                  'name'=>'id_usuario',
                  'type'=>'raw',
                  'value'=>'$data->idUsuario->correo',
                ),
		'costo_servicio',
		'costo_especial',
//		'estatus',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
</div>