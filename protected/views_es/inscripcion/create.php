<?php
$this->breadcrumbs=array(
	'Inscripcions'=>array('index'),
	'Crear',
);

$this->menu=array(
array('label'=>'Listar mis inscripciones','url'=>array('index')),
//array('label'=>'Administrar Inscripciones','url'=>array('admin')),
);
$competenciaIns = Competencia::model()->find('id_copetencia ='.$id_competencia);
?>

<span class="ez">Crear una nueva inscripción par el evento: <b><?php echo $competenciaIns->competencia; ?></b></span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form', array('model'=>$model, 'id_competencia'=>$id_competencia)); ?>
</div>