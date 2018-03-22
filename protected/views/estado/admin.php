<?php
$this->breadcrumbs=array(
	'State'=>array('index'),
	'Administrar',
);

$this->menu=array(
array('label'=>'Listar Status','url'=>array('index')),
array('label'=>'Crear Status','url'=>array('create')),
);
/*
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('estado-grid', {
data: $(this).serialize()
});
return false;
});
");
 * 
 */
?>

<span class="ez">Manage State</span>
<div class="pd-inner">
<p>
You can also write a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b> &lt;&gt;</b>
  o <b>=</b>) at the beginning of each search values to specify how the comparison should be done.
</p>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'estado-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_estado',
		'nombre',
		'estatus',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
</div>