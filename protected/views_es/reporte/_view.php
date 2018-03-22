<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_reporte')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_reporte),array('view','id'=>$data->id_reporte)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('reporte')); ?>:</b>
	<?php echo CHtml::encode($data->reporte); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />


</div>