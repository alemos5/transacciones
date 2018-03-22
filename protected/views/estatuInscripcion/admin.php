<?php
$this->breadcrumbs=array(
	'Subscription status'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Subscription Status','url'=>array('index')),
array('label'=>'Create  Subscription Status','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('estatu-inscripcion-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Subscription Status</h1>

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
'id'=>'estatu-inscripcion-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_estatu_inscripcion',
		'estatu_inscripcion',
		'estatus',
		'descripcion',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
