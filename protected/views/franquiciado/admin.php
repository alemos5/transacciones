<?php
$this->breadcrumbs=array(
	'Franchisees'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>__('List Franchisees'),'url'=>array('index')),
array('label'=>__('Create Franchisees'),'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('franquiciado-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<span class="ez"><?php echo __('Manage Franchisees'); ?></span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'franquiciado-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_franquiciado',
		'id_usuario_sistema',
		'id_competencia',
		'estatus',
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
</div>