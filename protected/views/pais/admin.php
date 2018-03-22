<?php
$this->breadcrumbs=array(
	'Paises'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'Listar Paises','url'=>array('index')),
array('label'=>'Crear País','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('pais-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<span  class="ez">Administrar Paises</span>
<div class="pd-inner">
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'pais-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_pais',
		'Code',
		'pais',
		'nombre_largo',
		'Continent',
		'Region',
		/*
		'SurfaceArea',
		'IndepYear',
		'Population',
		'LifeExpectancy',
		'GNP',
		'GNPOld',
		'LocalName',
		'GovernmentForm',
		'HeadOfState',
		'Capital',
		'codigo',
		'calling_code',
		'permitido',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
</div>
