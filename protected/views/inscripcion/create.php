<?php
$this->breadcrumbs=array(
	'Subscription'=>array('index'),
	'Crete',
);

$this->menu=array(
array('label'=>__('List my subscriptions'),'url'=>array('index')),
//array('label'=>'Administrar Inscripciones','url'=>array('admin')),
);
$competenciaIns = Competencia::model()->find('id_copetencia ='.$id_competencia);
?>

<span class="ez"><?php echo __('Create a new subscription for the event'); ?>: <b><?php echo $competenciaIns->competencia; ?></b></span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form', array('model'=>$model, 'id_competencia'=>$id_competencia)); ?>
</div>