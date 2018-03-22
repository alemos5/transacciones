<?php
$this->breadcrumbs=array(
	'Estados'=>array('index'),
	'Administrar',
);

$this->menu=array(
array('label'=>'Listar Estado','url'=>array('index')),
array('label'=>'Crear Estado','url'=>array('create')),
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

<span class="ez">Administrar Estados</span>
<div class="pd-inner">
<p>
También puede escribir un operador de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b> &lt;&gt;</b>
  o <b>=</b>) al principio de cada uno de los valores de búsqueda para especificar cómo se debe hacer la comparación.
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