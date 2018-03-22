<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_pase_competidor')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_pase_competidor),array('view','id'=>$data->id_pase_competidor)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_pase')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_pase); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('valor')); ?>:</b>
	<?php echo CHtml::encode($data->valor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_competencia')); ?>:</b>
	<?php echo CHtml::encode($data->id_competencia); ?>
	<br />


</div>