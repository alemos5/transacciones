<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_soporte')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_soporte),array('view','id'=>$data->id_soporte)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('enlace')); ?>:</b>
	<?php echo CHtml::encode($data->enlace); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('soporte')); ?>:</b>
	<?php echo CHtml::encode($data->soporte); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />


</div>