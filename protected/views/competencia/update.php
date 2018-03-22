<?php
$this->breadcrumbs=array(
	'Competences'=>array('index'),
	$model->id_copetencia=>array('view','id'=>$model->id_copetencia),
	'Update',
);

	$this->menu=array(
	array('label'=>__('Competence List'),'url'=>array('index')),
	array('label'=>__('Create Competence'),'url'=>array('create')),
	array('label'=>__('Competence Details'),'url'=>array('view','id'=>$model->id_copetencia)),
	array('label'=>__('Manage Competence'),'url'=>array('admin')),
	);
	?>

	<span class="ez"><?php echo __('Update Competences'); ?></span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form',array( 'model'=>$model, 
                                                    'paseCompetidor'=>$paseCompetidor, 
                                                    'paseCompetidorCount'=>$paseCompetidorCount,
                                                    'competenciaTipo'=>$competenciaTipo,
                                                    'competenciaTipoCount'=>$competenciaTipoCount,
                                                    'competenciaCategoria'=>$competenciaCategoria,)); ?>
</div>