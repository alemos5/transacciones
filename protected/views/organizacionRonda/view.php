<?php
$this->breadcrumbs=array(
	'Organizacion Rondas'=>array('index'),
	$model->id_organizacion_ronda,
);

$this->menu=array(
array('label'=>'List OrganizacionRonda','url'=>array('index')),
array('label'=>'Create OrganizacionRonda','url'=>array('create')),
array('label'=>'Update OrganizacionRonda','url'=>array('update','id'=>$model->id_organizacion_ronda)),
array('label'=>'Delete OrganizacionRonda','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id_organizacion_ronda),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage OrganizacionRonda','url'=>array('admin')),array('label'=>'Final','url'=>array('organizacionRonda/final')),
        array('label'=>'Semifinal','url'=>array('organizacionRonda/semifinal')),
        array('label'=>'Play off','url'=>array('organizacionRonda/eliminatoria')),
);
?>

<span class="ez"><?php echo __('View Event organization'); ?></span>

<div class="pd-inner">
<?php $this->widget('booster.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id_organizacion_ronda',
		'id_competencia',
		'ronda',
		'capacidad_max_categoria',
		'fecha_inicio',
		'hora_inicio',
		'fecha_final',
		'hora_final',
		'estatus',
),
)); ?>
</div>