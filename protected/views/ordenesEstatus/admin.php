<?php
$this->breadcrumbs=array(
	'Ordenes Estatuses'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List OrdenesEstatus','url'=>array('index')),
array('label'=>'Create OrdenesEstatus','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('ordenes-estatus-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Ordenes Estatuses</h1>

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
'id'=>'ordenes-estatus-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_orden_estatus',
		'ware_reciept',
		'estatus',
		'fecha_orden',
		'tipo',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
