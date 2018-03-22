<?php
$this->breadcrumbs=array(
	'Pagos'=>array('index'),
	'Crear',
);

$this->menu=array(
array('label'=>'Listar Pagos Reportados','url'=>array('index')),
//array('label'=>'Administrar Pagos','url'=>array('admin')),
);
$competenciaIns = Competencia::model()->find('id_copetencia ='.$id);
?>


<span class="ez">Reportar Pago: Pase Competidor-><?php echo $competenciaIns->competencia; ?></span>

<div class="pd-inner">
    <?php echo $this->renderPartial('_form', array('model'=>$model, 'id'=>$id, 'tipo'=>$tipo)); ?>
</div>