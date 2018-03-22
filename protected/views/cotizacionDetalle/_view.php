<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_cotizacion_detalle')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_cotizacion_detalle),array('view','id'=>$data->id_cotizacion_detalle)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_cotizacion')); ?>:</b>
	<?php echo CHtml::encode($data->id_cotizacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_servicio')); ?>:</b>
	<?php echo CHtml::encode($data->id_servicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cant_servicio')); ?>:</b>
	<?php echo CHtml::encode($data->cant_servicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precio_unitario')); ?>:</b>
	<?php echo CHtml::encode($data->precio_unitario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precio_total')); ?>:</b>
	<?php echo CHtml::encode($data->precio_total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />


</div>