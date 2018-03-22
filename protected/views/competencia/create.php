<?php
$this->breadcrumbs=array(
	'Competences'=>array('index'),
	'Crear',
);

$this->menu=array(
array('label'=>__('Competence List'),'url'=>array('index')),
array('label'=>__('Manage Competences'),'url'=>array('admin')),
);
?>

<span class="ez"><?php echo __('Create a new competence'); ?></span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form', array('model'=>$model,
                                                    'competenciaCategoria'=>$competenciaCategoria,
                                                    'paseCompetidor'=>$paseCompetidor, 
                                                    'competenciaTipo'=>$competenciaTipo)); ?>
</div>