<?php
$this->breadcrumbs=array(
	'Tipo Envios'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Listar Tipos de Envíos','url'=>array('index')),
array('label'=>'Crear Tipo de Envío','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('tipo-envio-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<span  class="ez">Administrar Tipos de Envíos</span>
<div class="pd-inner">
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'tipo-envio-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_tipo_envio',
		'tipo_envio',
		'estatus',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
</div>