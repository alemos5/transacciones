<?php
$this->breadcrumbs=array(
	'Inscripcions'=>array('index'),
	$model->id_inscripcion=>array('view','id'=>$model->id_inscripcion),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Listar mis inscripciones','url'=>array('index')),
//	array('label'=>'Crear Inscripción','url'=>array('create')),
	array('label'=>'Detallar Inscripción','url'=>array('view','id'=>$model->id_inscripcion)),
//	array('label'=>'Administrar Inscripciones','url'=>array('admin')),
	);
        $competenciaIns = Competencia::model()->find('id_copetencia ='.$id_competencia);
	?>

	<span class="ez">Actualizar Inscripción: <b><?php echo $competenciaIns->competencia; ?></b></span>

<div class="pd-inner">
<?php echo $this->renderPartial('_form',array('model'=>$model, 'id_competencia'=>$id_competencia)); ?>
</div>