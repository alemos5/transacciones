<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_configuracion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_configuracion),array('view','id'=>$data->id_configuracion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('itemes')); ?>:</b>
	<?php echo CHtml::encode($data->itemes); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('configuracion')); ?>:</b>
	<?php echo CHtml::encode($data->configuracion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />


</div>