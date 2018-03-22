<?php
$this->breadcrumbs=array(
	'Franquiciado Desembolsos'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List FranquiciadoDesembolso','url'=>array('index')),
array('label'=>'Create FranquiciadoDesembolso','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('franquiciado-desembolso-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Franquiciado Desembolsos</h1>

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
'id'=>'franquiciado-desembolso-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_franquiciado_desembolso',
		'id_competencia',
		'id_franquiciado',
		'descripcion',
		'fecha_registro',
		'id_usuario',
		/*
		'monto',
		'estatus',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
