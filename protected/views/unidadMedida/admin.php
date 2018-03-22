<?php
$this->breadcrumbs=array(
	'Unidad Medidas'=>array('index'),
	'Administrar',
);

$this->menu=array(
array('label'=>'Listar Unidades de Medidas','url'=>array('index')),
array('label'=>'Crea Unidad de Medida','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('unidad-medida-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<span class="ez">Administración de Unidaes de Medidas</span>
<div class="pd-inner">
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'unidad-medida-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_unidad_medida',
		'unidad_medida',
//		'estatus',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
</div>