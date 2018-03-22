<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_con')); ?>:</b>
	<?php echo CHtml::encode($data->id_con); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_orden')); ?>:</b>
	<?php echo CHtml::encode($data->id_orden); ?>
	<br />


</div>