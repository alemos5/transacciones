<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_franquiciado_aprobacion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_franquiciado_aprobacion),array('view','id'=>$data->id_franquiciado_aprobacion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_franquiciado_desembolso')); ?>:</b>
	<?php echo CHtml::encode($data->id_franquiciado_desembolso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_franquiciado')); ?>:</b>
	<?php echo CHtml::encode($data->id_franquiciado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_aprobacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_aprobacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />


</div>