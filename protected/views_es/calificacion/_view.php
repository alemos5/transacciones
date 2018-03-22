<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id_calificacion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_calificacion),array('view','id'=>$data->id_calificacion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_categoria_item_calificacion')); ?>:</b>
	<?php echo CHtml::encode($data->id_categoria_item_calificacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rango_max')); ?>:</b>
	<?php echo CHtml::encode($data->rango_max); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rango_min')); ?>:</b>
	<?php echo CHtml::encode($data->rango_min); ?>
	<br />


</div>