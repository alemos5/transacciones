<?php
$this->breadcrumbs=array(
	'Juezs'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List Judge','url'=>array('index')),
array('label'=>'Create Judge','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('juez-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<span class="ez"><?php echo __('Manage Judge'); ?></span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'juez-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_juez',
		'id_usuario_sistema',
		'id_competencia',
		'fecha_registro',
		'estatus',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
</div>