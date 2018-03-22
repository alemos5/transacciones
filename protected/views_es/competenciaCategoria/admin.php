<?php
$this->breadcrumbs=array(
	'Competencia Categorias'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List CompetenciaCategoria','url'=>array('index')),
array('label'=>'Create CompetenciaCategoria','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('competencia-categoria-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Competencia Categorias</h1>

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
'id'=>'competencia-categoria-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_competencia_categoria',
		'id_copetencia',
		'costo',
		'id_categoria',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
