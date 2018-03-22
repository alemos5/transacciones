<?php

$this->breadcrumbs=array(
	'Payments'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>__('Report Payments List'),'url'=>array('index')),
//array('label'=>'Administrar Pagos','url'=>array('admin')),
);
$competenciaIns = Competencia::model()->find('id_copetencia ='.$id);
?>


<span class="ez"><?php echo __('Report payment') ?>: <?php echo __('Competitor pass'); ?> -><?php echo $competenciaIns->competencia; ?></span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form', array('model'=>$model, 'id'=>$id, 'tipo'=>$tipo)); ?>
</div>
