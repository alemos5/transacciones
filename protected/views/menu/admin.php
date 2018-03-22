<?php
/* @var $this MenuController */
/* @var $model Menu */

$this->breadcrumbs=array(
	'Menus'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>__('List Menu'), 'url'=>array('index')),
	array('label'=>__('Create Menu'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#menu-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<span class="ez"><?php echo __('Manage Menus'); ?></span>

<div class="pd-inner">
<p>
    <?php echo __('You may optionally enter a comparison operator'); ?> (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    <?php echo __('or'); ?> <b>=</b>) <?php echo __('at the beginning of each of your search values to specify how the comparison should be done'); ?>.
</p>

<?php echo CHtml::link(__('Advanced Search'),'#',array('class'=>'search-button btn btn-primary')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView', array(
	'id'=>'menu-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_menu_sistema',
		'nombre',
		'ruta',
		'padre',
		'nivel',
		'style',
		/*
		'estatus',
		*/
		array(
			'class'=>'booster.widgets.TbButtonColumn',
		),
	),
)); ?>
</div>