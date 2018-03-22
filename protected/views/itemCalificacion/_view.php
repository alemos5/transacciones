<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_item_calificacion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_item_calificacion),array('view','id'=>$data->id_item_calificacion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('item_calificacion')); ?>:</b>
	<?php echo CHtml::encode($data->item_calificacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estatus')); ?>:</b>
	<?php echo CHtml::encode($data->estatus); ?>
	<br />


</div>