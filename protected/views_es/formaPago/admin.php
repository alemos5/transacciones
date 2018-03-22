<?php
$this->breadcrumbs=array(
	'Forma Pagos'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List FormaPago','url'=>array('index')),
array('label'=>'Create FormaPago','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('forma-pago-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Forma Pagos</h1>

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
'id'=>'forma-pago-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_forma_pago',
		'forma_pago',
		'estatus',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>