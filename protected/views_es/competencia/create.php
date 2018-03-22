<?php
$this->breadcrumbs=array(
	'Competencias'=>array('index'),
	'Crear',
);

$this->menu=array(
array('label'=>'Listar Competencias','url'=>array('index')),
array('label'=>'Administrar Competencias','url'=>array('admin')),
);
?>

<span class="ez">Crear una nueva competencia</span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form', array('model'=>$model,
                                                    'competenciaCategoria'=>$competenciaCategoria,
                                                    'paseCompetidor'=>$paseCompetidor, 
                                                    'competenciaTipo'=>$competenciaTipo)); ?>
</div>