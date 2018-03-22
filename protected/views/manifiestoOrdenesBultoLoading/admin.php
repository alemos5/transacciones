<?php
$this->breadcrumbs=array(
	'Manifiesto Ordenes Bulto Loadings'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List ManifiestoOrdenesBultoLoading','url'=>array('index')),
array('label'=>'Create ManifiestoOrdenesBultoLoading','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('manifiesto-ordenes-bulto-loading-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Manifiesto Ordenes Bulto Loadings</h1>

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
'id'=>'manifiesto-ordenes-bulto-loading-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_manifiesto',
		'id_orden',
		'id_tipo',
		'id_bulto',
		'id_con',
		'id_loading',
		/*
		'datos_extra',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
