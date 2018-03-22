<?php
$this->breadcrumbs=array(
	'Inscripcions'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Inscripcion','url'=>array('index')),
//array('label'=>'Create Inscripcion','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('inscripcion-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Inscripcions</h1>

<p>
	You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
		&lt;&gt;</b>
	or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'inscripcion-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_inscripcion',
		'id_copetencia',
		'id_usuario',
		'grupo',
		'descripcion',
		'audio',
		/*
		'lugar_representa',
		'codigo_pais',
		'id_ciudad',
		'id_escuela',
		'id_estatu_inscripcion',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
