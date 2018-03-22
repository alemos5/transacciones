<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_juez_item_calificacion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_juez_item_calificacion),array('view','id'=>$data->id_juez_item_calificacion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_juez')); ?>:</b>
	<?php echo CHtml::encode($data->id_juez); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_item_calificacion')); ?>:</b>
	<?php echo CHtml::encode($data->id_item_calificacion); ?>
	<br />


</div>