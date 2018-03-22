<?php
$this->breadcrumbs=array(
	'Payments'=>array('index'),
	$model->id_pago=>array('view','id'=>$model->id_pago),
	'Update',
);

$this->menu=array(
array('label'=>'Report Payments List','url'=>array('index')),
//array('label'=>'Administrar Pagos','url'=>array('admin')),
);
$competenciaIns = Competencia::model()->find('id_copetencia ='.$id_competencia);
	?>

	<span class="ez">Update Payments. Competitor pass-><?php echo $competenciaIns->competencia; ?></span>

        <div class="pd-inner">
            <?php echo $this->renderPartial('_form',array('model'=>$model, 'id_competencia'=>$id_competencia)); ?>
        </div>