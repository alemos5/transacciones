<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_cotizacion_estatus')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_cotizacion_estatus),array('view','id'=>$data->id_cotizacion_estatus)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cotizacion_estatus')); ?>:</b>
	<?php echo CHtml::encode($data->cotizacion_estatus); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />


</div>