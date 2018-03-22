<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('datos_extra')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->datos_extra),array('view','id'=>$data->datos_extra)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_manifiesto')); ?>:</b>
	<?php echo CHtml::encode($data->id_manifiesto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_orden')); ?>:</b>
	<?php echo CHtml::encode($data->id_orden); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo')); ?>:</b>
	<?php echo CHtml::encode($data->id_tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_bulto')); ?>:</b>
	<?php echo CHtml::encode($data->id_bulto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_con')); ?>:</b>
	<?php echo CHtml::encode($data->id_con); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_loading')); ?>:</b>
	<?php echo CHtml::encode($data->id_loading); ?>
	<br />


</div>