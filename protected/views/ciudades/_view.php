<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_ciudad')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_ciudad),array('view','id'=>$data->id_ciudad)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_estado')); ?>:</b>
	<?php echo CHtml::encode($data->id_estado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ciudad')); ?>:</b>
	<?php echo CHtml::encode($data->ciudad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('capital')); ?>:</b>
	<?php echo CHtml::encode($data->capital); ?>
	<br />


</div>