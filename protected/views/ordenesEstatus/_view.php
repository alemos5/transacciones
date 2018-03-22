<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_orden_estatus')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_orden_estatus),array('view','id'=>$data->id_orden_estatus)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ware_reciept')); ?>:</b>
	<?php echo CHtml::encode($data->ware_reciept); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_orden')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_orden); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />


</div>