<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_impuesto')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_impuesto),array('view','id'=>$data->id_impuesto)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('impuesto')); ?>:</b>
	<?php echo CHtml::encode($data->impuesto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('porcentaje')); ?>:</b>
	<?php echo CHtml::encode($data->porcentaje); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />


</div>