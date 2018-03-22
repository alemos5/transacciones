<?php
/* @var $this PerfilController */
/* @var $model Perfil */

$this->breadcrumbs=array(
	'Perfils'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>__('List Perfil'), 'url'=>array('index')),
	array('label'=>__('Create Perfil'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#perfil-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>


<span class="ez"><?php echo __('Manage Perfils'); ?></span>

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
	'id'=>'perfil-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_perfil_sistema',
		'nombre',
		'estatus',
		array(
			'class'=>'booster.widgets.TbButtonColumn',
		),
	),
)); ?>
</div>