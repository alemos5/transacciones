<?php
$this->breadcrumbs=array(
	'Cotizacion Estatuses'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List CotizacionEstatus','url'=>array('index')),
array('label'=>'Create CotizacionEstatus','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('cotizacion-estatus-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Cotizacion Estatuses</h1>

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
'id'=>'cotizacion-estatus-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_cotizacion_estatus',
		'cotizacion_estatus',
		'estatus',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
