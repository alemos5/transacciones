<?php
$this->breadcrumbs=array(
	'Servicios'=>array('index'),
	'Administrar',
);

$this->menu=array(
array('label'=>'Listar Servicios','url'=>array('index')),
array('label'=>'Crear Servicio','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('servicio-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<span class="ez">Administración de Servicios</span>
<div class="pd-inner">

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'servicio-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
                array(
                  'filter'=>CHtml::listData(Empresa::model()->findAll(),'id_empresa','empresa'),
                  'name'=>'id_empresa',
                  'type'=>'raw',
                  'value'=>'$data->idEmpresa->empresa',
                ),
		'id_servicio',
		'servicio',
		'precio_neto',
		'precio_impuesto',
		'gasto_operativo',
		'porcentaje_ganacia',
		/*
		'estatus',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
</div>