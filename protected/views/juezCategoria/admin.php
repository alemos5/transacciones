<?php
$this->breadcrumbs=array(
	'Juez Categorias'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List JuezCategoria','url'=>array('index')),
array('label'=>'Create JuezCategoria','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('juez-categoria-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Juez Categorias</h1>

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
'id'=>'juez-categoria-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_juez_categoria',
		'id_juez',
		'id_competencia',
		'id_categoria',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
