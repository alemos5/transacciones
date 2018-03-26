<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->estatus),array('view','id'=>$data->estatus)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus_titulo')); ?>:</b>
	<?php echo CHtml::encode($data->estatus_titulo); ?>
	<br />


</div>