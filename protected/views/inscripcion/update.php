<?php
$this->breadcrumbs=array(
	'Subscription'=>array('index'),
	$model->id_inscripcion=>array('view','id'=>$model->id_inscripcion),
	'Update',
);

	$this->menu=array(
	array('label'=>__('See my subscriptions'),'url'=>array('index')),
	array('label'=>__('Detail Subscription'),'url'=>array('view','id'=>$model->id_inscripcion)),
	);
        $competenciaIns = Competencia::model()->find('id_copetencia ='.$id_competencia);
	?>

	<span class="ez">
            <?php echo __('Update subscription'); ?>: <b><?php echo $competenciaIns->competencia; ?></b>
        
        </span>

<div class="pd-inner">
<?php echo $this->renderPartial('_form',array('model'=>$model, 'id_competencia'=>$id_competencia)); ?>
</div>