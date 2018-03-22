<?php
$this->breadcrumbs=array(
	'Organizacion Rondas'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List OrganizacionRonda','url'=>array('index')),
array('label'=>'Create OrganizacionRonda','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('organizacion-ronda-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<span class="ez"><?php echo __('Manage Event organization'); ?></span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'organizacion-ronda-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_organizacion_ronda',
		'id_competencia',
		'ronda',
		'capacidad_max_categoria',
		'fecha_inicio',
		'hora_inicio',
                'fecha_final',
		'hora_final',
		/*
		'fecha_final',
		'hora_final',
		'estatus',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
</div>