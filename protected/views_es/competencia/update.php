<?php
$this->breadcrumbs=array(
	'Competencias'=>array('index'),
	$model->id_copetencia=>array('view','id'=>$model->id_copetencia),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Listar Competencias','url'=>array('index')),
	array('label'=>'Crear Competencia','url'=>array('create')),
	array('label'=>'Detallar Competencia','url'=>array('view','id'=>$model->id_copetencia)),
	array('label'=>'Administrar Competencias','url'=>array('admin')),
	);
	?>

	<span class="ez">Actualizar Competencias</span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form',array( 'model'=>$model, 
                                                    'paseCompetidor'=>$paseCompetidor, 
                                                    'paseCompetidorCount'=>$paseCompetidorCount,
                                                    'competenciaTipo'=>$competenciaTipo,
                                                    'competenciaTipoCount'=>$competenciaTipoCount,
                                                    'competenciaCategoria'=>$competenciaCategoria,)); ?>
</div>