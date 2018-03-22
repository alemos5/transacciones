<?php
$this->breadcrumbs=array(
	'Categorias'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Categoria','url'=>array('index')),
array('label'=>'Create Categoria','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('categoria-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Categorias</h1>

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
'id'=>'categoria-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_categoria',
		'categoria',
		'descripcion',
		'edad_min',
		'edad_max',
		'competidor_min',
		/*
		'competidor_max',
		'id_tipo_categoria',
		'id_bloque',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
