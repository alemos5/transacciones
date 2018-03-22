<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_traking')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_traking),array('view','id'=>$data->id_traking)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('traking')); ?>:</b>
	<?php echo CHtml::encode($data->traking); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario); ?>
	<br />


</div>